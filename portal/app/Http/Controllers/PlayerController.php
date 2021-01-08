<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PlayerController extends Controller
{
	/**
	 * @param $n
	 * @return string
	 */
	public function bd_nice_number($n)
	{
		if ($n > 1000000000000) return round(($n / 1000000000000), 1) . ' trillion';
		else if ($n > 1000000000) return round(($n / 1000000000), 1) . ' billion';
		else if ($n > 1000000) return round(($n / 1000000), 1) . ' million';
		else if ($n > 1000) return round(($n / 1000), 1) . ' thousand';
		return number_format($n);
	}

	public function index($subpage)
	{
		/**
		 * @var $subpage
		 * Replaces spaces with underlines
		 */
		$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

		/**
		 * @var $players
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		$players = DB::connection()
			->table('players')
			->where([
				['banned', '=', '0'],
				['id', '=', $subpage],
			])
			->orWhere([
				['banned', '=', '0'],
				['username', '=', $subpage],
			])
			->get();
		if (!$players) {
			abort(404);
		}

		return view('player', [
			'subpage' => $subpage,
			'players' => $players,
		])
			->with(compact('$banks'));
	}

	/**
	 * @return Factory|View
	 */
	public function shar()
	{
		/**
		 * @var $banks
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		$banks = DB::connection()
			->table('bank as a')
			->join('players as b', 'a.playerID', '=', 'b.id')
			->join('itemdef as c', 'a.id', '=', 'c.id')
			->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot, c.name'))
			->Where([
				['b.banned', '=', '0'],
				['b.username', '=', 'shar'],
			])
			->orderBy('a.slot', 'asc')
			->get();

		if (!$banks) {
			abort(404);
		}

		return view('bank', [
			'banks' => $banks,
		])
			->with(compact('$banks'));
	}

	/**
	 * @param $subpage
	 * @return Factory|View
	 */
	public function bank($subpage)
	{
		/**
		 * @var $subpage
		 * Replaces spaces with underlines
		 */
		$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

		/**
		 * @var $banks
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		$banks = DB::connection()
			->table('bank as a')
			->join('players as b', 'a.playerID', '=', 'b.id')
			->join('itemdef as c', 'a.id', '=', 'c.id')
			->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot, c.name'))
			->where([
				['b.banned', '=', '0'],
				['b.id', '=', $subpage],
			])
			->orWhere([
				['b.banned', '=', '0'],
				['b.username', '=', $subpage],
			])
			->orderBy('a.slot', 'asc')
			->get();

		if (!$banks) {
			abort(404);
		}

		if (!Auth::check()) {
			return redirect('home');
		}

		return view('bank', [
			'subpage' => $subpage,
			'banks' => $banks,
		])
			->with(compact('$banks'));
	}

	/**
	 * @param $subpage
	 * @return Factory|View
	 */
	public function invitem($subpage)
	{
		/**
		 * @var $subpage
		 * Replaces spaces with underlines
		 */
		$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

		/**
		 * @var $banks
		 * Fetches the table row of the player experience in view and paginates the results
		 */
		$invitems = DB::connection()
			->table('invitems as a')
			->join('players as b', 'a.playerID', '=', 'b.id')
			->join('itemdef as c', 'a.id', '=', 'c.id')
			->select('*', DB::raw('b.username, a.id, format(a.amount, 0) number, a.slot, c.name'))
			->where([
				['b.banned', '=', '0'],
				['b.id', '=', $subpage],
			])
			->orWhere([
				['b.banned', '=', '0'],
				['b.username', '=', $subpage],
			])
			->orderBy('a.slot', 'asc')
			->get();

		if (!$invitems) {
			abort(404);
		}

		if (!Auth::check()) {
			return redirect('home');
		}

		return view('invitem', [
			'subpage' => $subpage,
			'invitems' => $invitems,
		])
			->with(compact('$invitems'));
	}
}
