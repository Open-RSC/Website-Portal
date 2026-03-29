<?php

namespace App\Http;

use App\Models\npcdef;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class NpcController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index(Request $request): View
    {
        /**
         * @return Factory|View
         */
        return view('npcs');
    }

    /**
     * Fetches the table row of the npc in view and paginates the results
     *
     * @return mixed
     */
    public function npcSearch(Request $request)
    {
        $searchTerm = $request->input('searchTerm', '');
        $npcs = [];

        if (! empty($searchTerm)) {
            // TODO: add multi-world NPC support so we can search non-authentic NPCs
            $npcs = npcdef::when($searchTerm, function ($query, $searchTerm) {
                if (ctype_digit($searchTerm)) {
                    return $query->where('id', '=', (int) $searchTerm);
                }

                return $query->where('name', 'like', '%'.$searchTerm.'%');
            })->where('id', '<=', '793')->orderBy('combatlvl', 'asc')->paginate(6);
        }

        return Response::json($npcs);
    }

    /**
     * @return Factory|View
     */
    public function show($id): View
    {
        /**
         * @var
         * queries the npc and returns a 404 error if not found in database
         */
        if (Config::get('app.authentic') == true) {
            $npcdef = DB::connection('preservation')
                ->table('npcdef')
                ->where('id', '<=', '793')
                ->find($id);
            if (! $npcdef) {
                abort(404);
            }
        } else {
            $npcdef = DB::connection('preservation')
                ->table('npcdef')
                ->find($id);
            if (! $npcdef) {
                abort(404);
            }
        }

        /**
         * @var
         * gathers a list of the npcs and their associated drop tables, then paginates the table
         */
        if (Config::get('app.authentic') == true) {
            $npc_drops = DB::connection('preservation')
                ->table('npcdrops AS B')
                ->join('npcdef AS A', 'A.id', '=', 'B.npcdef_id')
                ->join('itemdef AS C', 'B.id', '=', 'C.id')
                ->select('A.id', 'A.name AS npcName', 'B.npcdef_id AS npcID', 'B.amount AS dropAmount', 'B.id AS dropID', 'B.weight AS dropWeight', 'C.id AS itemID', 'C.name AS itemName')
                ->orderBy('dropWeight', 'desc')
                ->where([
                    ['B.npcdef_id', '=', $id],
                    ['B.npcdef_id', '<=', '793'],
                    ['C.id', '<=', '2091'],
                ])
                ->paginate(50);
        } else {
            $npc_drops = DB::connection('preservation')
                ->table('npcdrops AS B')
                ->join('npcdef AS A', 'A.id', '=', 'B.npcdef_id')
                ->join('itemdef AS C', 'B.id', '=', 'C.id')
                ->select('A.id', 'A.name AS npcName', 'B.npcdef_id AS npcID', 'B.amount AS dropAmount', 'B.id AS dropID', 'B.weight AS dropWeight', 'C.id AS itemID', 'C.name AS itemName')
                ->where('B.npcdef_id', '=', $id)
                ->orderBy('dropWeight', 'desc')
                ->paginate(50);
        }

        return view('npcdef', [
            'npc_drops' => $npc_drops,
        ])
            ->with(compact('npcdef'));
    }
}
