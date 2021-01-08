<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NpcController extends Controller
{
	/**
	 * @return Factory|View
	 */
	public function index()
	{
		/**
		 * @return Factory|View
		 * @var $npcs
		 * fetches the table row of the npc in view and paginates the results
		 */
		if (Config::get('app.authentic') == true) {
			$npcs = DB::connection()
				->table('npcdef')
				->where('id', '<=', '793')
				->orderBy('id', 'asc')
				->paginate(300);
		} else {
			$npcs = DB::connection()
				->table('npcdef')
				->orderBy('id', 'asc')
				->paginate(300);
		}

		return view('npcs')
			->with(compact('npcs'));
	}

	/**
	 * @param $id
	 * @return Factory|View
	 */
	public function show($id)
	{
		/**
		 * @var
		 * queries the npc and returns a 404 error if not found in database
		 */
		if (Config::get('app.authentic') == true) {
			$npcdef = DB::connection()
				->table('npcdef')
				->where('id', '<=', '793')
				->find($id);
			if (!$npcdef) {
				abort(404);
			}
		} else {
			$npcdef = DB::connection()
				->table('npcdef')
				->find($id);
			if (!$npcdef) {
				abort(404);
			}
		}

		/**
		 * @var
		 * gathers a list of the npcs and their associated drop tables, then paginates the table
		 */
		if (Config::get('app.authentic') == true) {
			$npc_drops = DB::connection()
				->table('npcdrops AS B')
				->join('npcdef AS A', 'A.id', '=', 'B.npcdef_id')
				->join('itemdef AS C', 'B.id', '=', 'C.id')
				->select('A.id', 'A.name AS npcName', 'B.npcdef_id AS npcID', 'B.amount AS dropAmount', 'B.id AS dropID', 'B.weight AS dropWeight', 'C.id AS itemID', 'C.name AS itemName')
				->orderBy('C.basePrice', 'asc')
				->orderBy('C.id', 'asc')
				->where([
					['B.npcdef_id', '=', $id],
					['B.npcdef_id', '<=', '793'],
					['C.id', '<=', '2091'],
				])
				->orderBy('C.basePrice', 'asc')
				->paginate(50);
		} else {
			$npc_drops = DB::connection()
				->table('npcdrops AS B')
				->join('npcdef AS A', 'A.id', '=', 'B.npcdef_id')
				->join('itemdef AS C', 'B.id', '=', 'C.id')
				->select('A.id', 'A.name AS npcName', 'B.npcdef_id AS npcID', 'B.amount AS dropAmount', 'B.id AS dropID', 'B.weight AS dropWeight', 'C.id AS itemID', 'C.name AS itemName')
				->where('B.npcdef_id', '=', $id)
				->orderBy('C.basePrice', 'asc')
				->orderBy('C.id', 'asc')
				->paginate(50);
		}

		return view('npcdef', [
			'npc_drops' => $npc_drops,
		])
			->with(compact('npcdef'));
	}
}
