<?php

namespace App\Http;

use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Http\Request;
use DateTime;

class HiscoresController extends Component
{
    /**
     * @function totalXP()
     * @param $skills
     * @return int
     * Used to retrieve each skill's experience table
     */
    public function totalXP($skills): int
    {
        $skill_total = 0;
        foreach ($skills as $key => $value) {
            if (substr($key, 0, 4) == "") {
                $skill_total += $value;
            }
        }
        return $skill_total;
    }

    /**
     * @function experienceToLevel()
     * @param $exp
     * @return int
     * Used to calculate skill levels based on $experienceArray
     */
    public function experienceToLevel($exp): int
    {
        $experienceArray = array(0, 83, 174, 276, 388, 512, 650, 801, 969, 1154, 1358, 1584, 1833, 2107, 2411, 2746, 3115, 3523, 3973, 4470, 5018, 5624, 6291, 7028, 7842, 8740, 9730, 10824, 12031, 13363, 14833, 16456, 18247, 20224, 22406, 24815, 27473, 30408, 33648, 37224, 41171, 45529, 50339, 55649, 61512, 67983, 75127, 83014, 91721, 101333, 111945, 123660, 136594, 150872, 166636, 184040, 203254, 224466, 247886, 273742, 302288, 333804, 368599, 407015, 449428, 496254, 547953, 605032, 668051, 737627, 814445, 899257, 992895, 1096278, 1210421, 1336443, 1475581, 1629200, 1798808, 1986068, 2192818, 2421087, 2673114, 2951373, 3258594, 3597792, 3972294, 4385776, 4842295, 5346332, 5902831, 6517253, 7195629, 7944614, 8771558, 9684577, 10692629, 11805606, 13034431, 14391160, 15889109, 17542976, 19368992, 21385073, 23611006, 26068632, 28782069, 31777943, 35085654, 38737661, 42769801, 47221641, 52136869, 57563718, 63555443, 70170840, 77474828, 85539082, 94442737, 104273167);
        for ($level = 0; $level < 98; $level++) {
            if ($exp < 0 || $exp >= $experienceArray[$level + 1]) {
                continue;
            }
            return ($level + 1);
        }
        return 99;
    }

    public function coalesce($alias1, $alias2, $subpage, $relabel = false): string {
        if (!$relabel) {
            return 'ifnull(' . $this->maxCast($alias2, $subpage) . ',' . $this->cast($alias1, $subpage) . ')';
        } else {
            return 'ifnull(' . $this->maxCast($alias2, $subpage) . ',' . $this->cast($alias1, $subpage) . ') as ' . $subpage;
        }
    }

    public function cast($alias, $subpage, $relabel = false): string {
        if (!$relabel) {
            return $alias . '.' . $subpage . '&0xFFFFFFFF';
        } else {
            return '(' . $alias . '.' . $subpage . '&0xFFFFFFFF) as ' . $subpage;
        }
    }

    public function maxCast($alias, $subpage, $relabel = false): string {
        if (!$relabel) {
            return $alias . '.' . $subpage . '|0xFFFFFFFF';
        } else {
            return '(' . $alias . '.' . $subpage . '|0xFFFFFFFF) as ' . $subpage;
        }
    }

    /**
     * @function index()
     * @return Factory|View
     * Used to show the main hiscores page
     */
    public function index($db): Factory|View
    {
        /**
         * @return Factory|View
         * @var $hiscores
         * Fetches the table row of the player experience in view and paginates the results
         */
        if (value($db) == 'openpk') { // openpk
            $hiscores = DB::connection($db)
                ->table('players as b')
                ->select('b.*')
                ->groupBy('b.username')
                ->orderBy('b.kills', 'desc')
                ->orderBy('b.deaths', 'asc')
                ->where([
                    ['b.group_id', '>=', '8'],
                    ['b.kills', '>', '0']
                ])
                ->paginate(21);
        } else if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            $hiscores = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('ironman as c', 'b.id', '=', 'c.playerID')
                ->select('b.*', 'c.*', DB::raw('
			(SUM((' . $this->cast('a', 'attack') . ') +
			(' . $this->cast('a', 'strength') . ') +
			(' . $this->cast('a', 'defense') . ') +
			(' . $this->cast('a', 'hits') . ') +
			(' . $this->cast('a', 'ranged') . ') +
			(' . $this->cast('a', 'prayer') . ') +
			(' . $this->cast('a', 'magic') . ') +
			(' . $this->cast('a', 'cooking') . ') +
			(' . $this->cast('a', 'woodcut') . ') +
			(' . $this->cast('a', 'fletching') . ') +
			(' . $this->cast('a', 'fishing') . ') +
			(' . $this->cast('a', 'firemaking') . ') +
			(' . $this->cast('a', 'crafting') . ') +
			(' . $this->cast('a', 'smithing') . ') +
			(' . $this->cast('a', 'mining') . ') +
			(' . $this->cast('a', 'herblaw') . ') +
			(' . $this->cast('a', 'agility') . ') +
			(' . $this->cast('a', 'thieving') . ') +
			(' . $this->cast('a', 'runecraft') . ') +
			(' . $this->cast('a', 'harvesting') . '))
			/4.0)
			as total_xp'))
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                    ['c.iron_man', '!=', '4'],
                ])
                ->groupBy('b.username')
                ->orderBy('b.skill_total', 'desc')
                ->orderBy('total_xp', 'desc')
                ->paginate(21);
        } else if (value($db) == '2001scape') { // retro authentic
            $hiscores = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                ->select('b.*', DB::raw('
			(SUM((' . $this->coalesce('a', 'aa', 'attack') . ') +
			(' . $this->coalesce('a', 'aa', 'strength') . ') +
			(' . $this->coalesce('a', 'aa', 'defense') . ') +
			(' . $this->coalesce('a', 'aa', 'hits') . ') +
			(' . $this->coalesce('a', 'aa', 'ranged') . ') +
			(' . $this->coalesce('a', 'aa', 'prayGood') . ') +
			(' . $this->coalesce('a', 'aa', 'prayEvil') . ') +
			(' . $this->coalesce('a', 'aa', 'goodMagic') . ') +
			(' . $this->coalesce('a', 'aa', 'evilMagic') . ') +
			(' . $this->coalesce('a', 'aa', 'cooking') . ') +
			(' . $this->coalesce('a', 'aa', 'woodcutting') . ') +
			(' . $this->coalesce('a', 'aa', 'firemaking') . ') +
			(' . $this->coalesce('a', 'aa', 'crafting') . ') +
			(' . $this->coalesce('a', 'aa', 'smithing') . ') +
			(' . $this->coalesce('a', 'aa', 'mining') . ') +
			(' . $this->coalesce('a', 'aa', 'influence') . ') +
			(' . $this->coalesce('a', 'aa', 'thieving') . ') +
			(' . $this->coalesce('a', 'aa', 'tailoring') . ') +
			(' . $this->coalesce('a', 'aa', 'herblaw') . '))
			/4.0)
			as total_xp'))
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                ])
                ->groupBy('b.username')
                ->orderBy('b.skill_total', 'desc')
                ->orderBy('total_xp', 'desc')
                ->paginate(21);
        } else { // modern authentic
            $hiscores = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                ->select('b.*', DB::raw('
			(SUM((' . $this->coalesce('a', 'aa', 'attack') . ') +
			(' . $this->coalesce('a', 'aa', 'strength') . ') +
			(' . $this->coalesce('a', 'aa', 'defense') . ') +
			(' . $this->coalesce('a', 'aa', 'hits') . ') +
			(' . $this->coalesce('a', 'aa', 'ranged') . ') +
			(' . $this->coalesce('a', 'aa', 'prayer') . ') +
			(' . $this->coalesce('a', 'aa', 'magic') . ') +
			(' . $this->coalesce('a', 'aa', 'cooking') . ') +
			(' . $this->coalesce('a', 'aa', 'woodcut') . ') +
			(' . $this->coalesce('a', 'aa', 'fletching') . ') +
			(' . $this->coalesce('a', 'aa', 'fishing') . ') +
			(' . $this->coalesce('a', 'aa', 'firemaking') . ') +
			(' . $this->coalesce('a', 'aa', 'crafting') . ') +
			(' . $this->coalesce('a', 'aa', 'smithing') . ') +
			(' . $this->coalesce('a', 'aa', 'mining') . ') +
			(' . $this->coalesce('a', 'aa', 'herblaw') . ') +
			(' . $this->coalesce('a', 'aa', 'agility') . ') +
			(' . $this->coalesce('a', 'aa', 'thieving') . '))
			/4.0)
			as total_xp'))
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                ])
                ->groupBy('b.username')
                ->orderBy('b.skill_total', 'desc')
                ->orderBy('total_xp', 'desc')
                ->paginate(21);
        }

        /**
         * @var $skill_array
         * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
         */

        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            $skill_array = array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting');
        } else if (value($db) == '2001scape') { // retro authentic -- omitted unimplemented skills or that could not be leveled by its own
            $skill_array = array('skill_total', 'hits', 'ranged', 'prayGood', 'prayEvil', 'goodMagic', 'evilMagic', 'cooking', 'woodcutting', 'firemaking', 'crafting', 'smithing', 'mining');
        } else { // modern authentic
            $skill_array = array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');
        }
        return view('hiscores', [
            'skill_array' => $skill_array,
            'db' => $db,
        ])
            ->with(compact('hiscores'));
    }

    /**
     * @param $db
     * @param $subpage
     * @return Factory|View
     * Used to show all skill-specific sub pages
     */
    public function show($db, $subpage): Factory|View
    {

        //$queryString = $db->getQueryString();
        /**
         * @var $skill_array
         * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
         */
        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            $skill_array = array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting');
        } else if (value($db) == '2001scape') { // retro authentic -- omitted unimplemented skills or that could not be leveled by its own
            $skill_array = array('skill_total', 'hits', 'ranged', 'prayGood', 'prayEvil', 'goodMagic', 'evilMagic', 'cooking', 'woodcutting', 'firemaking', 'crafting', 'smithing', 'mining');
        } else { // modern authentic
            $skill_array = array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');
        }

        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);
        $db = preg_replace("/[^A-Za-z0-9 ]/", "_", $db);

        /**
         * @var $subpage
         * queries the npc and returns a 404 error if not found in database
         */
        if (!in_array($subpage, $skill_array)) {
            abort(404);
        }

        /**
         * @var $hiscores
         * Fetches the table row of the player experience in view and paginates the results
         */

        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            $hiscores = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                ->join('ironman as c', 'b.id', '=', 'c.playerID')
                ->select('b.*', 'c.*', DB::raw($this->cast('a', $subpage, true)))
                ->where([
                    ['a.' . $subpage, '>=', '53452', 'or'], // limits to display only level 30 and above
                    ['a.' . $subpage, '<', '0', 'or'], // and those that have overflow
                ])
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                    ['c.iron_man', '!=', '4'],
                ])
                ->groupBy('b.username')
                ->orderByRaw('ifnull(aa.' . $subpage . ', 0xffffffff) asc')
                ->orderBy($subpage, 'desc')
                ->paginate(21);

        } else { // authentic
            $hiscores = DB::connection($db)
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                ->select('b.*', DB::raw($this->coalesce('a', 'aa', $subpage, true)))
                ->where([
                    ['a.' . $subpage, '>=', '53452', 'or'], // limits to display only level 30 and above
                    ['a.' . $subpage, '<', '0', 'or'], // and those that have overflow
                    ['aa.' . $subpage, '>=', '0', 'or'], // and those that have looped
                ])
                ->whereNotIn('b.banned', [-1, 1])
                ->where([
                    ['b.group_id', '>=', '8'],
                ])
                ->groupBy('b.username')
                ->orderByRaw('ifnull(aa.' . $subpage . ', 0xffffffff) asc')
                ->orderBy($subpage, 'desc')
                ->paginate(21);

        }
        $skill = '' . $subpage;
        return view('hiscoreskill', [
            'skill_array' => $skill_array,
            'subpage' => $subpage,
            'db' => $db,
            '' . $subpage => $skill,
        ])
            ->with(compact('hiscores'));
    }

    /**
     * @param $db
     * @param $subpage
     * @param $iron_man
     * @return Factory|View
     */
    public function iron_man($db, $subpage, $iron_man): Factory|View
    {
        /**
         * @var $skill_array
         * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
         */
        if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
            $skill_array = array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting');
        } else if (value($db) == '2001scape') { // retro authentic -- omitted unimplemented skills or that could not be leveled by its own
            $skill_array = array('skill_total', 'hits', 'ranged', 'prayGood', 'prayEvil', 'goodMagic', 'evilMagic', 'cooking', 'woodcutting', 'firemaking', 'crafting', 'smithing', 'mining');
        } else { // modern authentic
            $skill_array = array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');
        }

        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);
        $db = preg_replace("/[^A-Za-z0-9 ]/", "_", $db);

        /**
         * @var $subpage
         * queries the npc and returns a 404 error if not found in database
         */
        if (!in_array($subpage, $skill_array)) {
            abort(404);
        }

        /**
         * @var $hiscores
         * Fetches the table row of the player experience in view and paginates the results
         */

        if ($subpage == 'skill_total') {
            if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
                $hiscores = DB::connection($db)
                    ->table('experience as a')
                    ->join('players as b', 'a.playerID', '=', 'b.id')
                    ->join('ironman as c', 'b.id', '=', 'c.playerID')
                    ->select('b.*', 'c.*', DB::raw('
			(SUM((' . $this->cast('a', 'attack') . ') +
			(' . $this->cast('a', 'strength') . ') +
			(' . $this->cast('a', 'defense') . ') +
			(' . $this->cast('a', 'hits') . ') +
			(' . $this->cast('a', 'ranged') . ') +
			(' . $this->cast('a', 'prayer') . ') +
			(' . $this->cast('a', 'magic') . ') +
			(' . $this->cast('a', 'cooking') . ') +
			(' . $this->cast('a', 'woodcut') . ') +
			(' . $this->cast('a', 'fletching') . ') +
			(' . $this->cast('a', 'fishing') . ') +
			(' . $this->cast('a', 'firemaking') . ') +
			(' . $this->cast('a', 'crafting') . ') +
			(' . $this->cast('a', 'smithing') . ') +
			(' . $this->cast('a', 'mining') . ') +
			(' . $this->cast('a', 'herblaw') . ') +
			(' . $this->cast('a', 'agility') . ') +
			(' . $this->cast('a', 'thieving') . ') +
			(' . $this->cast('a', 'runecraft') . ') +
			(' . $this->cast('a', 'harvesting') . '))
			/4.0)
			as total_xp'))
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where([
                        ['b.group_id', '>=', '8'],
                        ['c.iron_man', '!=', '4'],
                        ['c.iron_man', '=', $iron_man],
                    ])
                    ->groupBy('b.username')
                    ->orderBy('b.skill_total', 'desc')
                    ->orderBy('total_xp', 'desc')
                    ->paginate(21);
            } else if (value($db) == '2001scape') { // retro authentic
                $hiscores = DB::connection($db)
                    ->table('experience as a')
                    ->join('players as b', 'a.playerID', '=', 'b.id')
                    ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                    ->select('b.*', 'c.*', DB::raw('
			(SUM((' . $this->coalesce('a', 'aa', 'attack') . ') +
			(' . $this->coalesce('a', 'aa', 'strength') . ') +
			(' . $this->coalesce('a', 'aa', 'defense') . ') +
			(' . $this->coalesce('a', 'aa', 'hits') . ') +
			(' . $this->coalesce('a', 'aa', 'ranged') . ') +
			(' . $this->coalesce('a', 'aa', 'prayGood') . ') +
			(' . $this->coalesce('a', 'aa', 'prayEvil') . ') +
			(' . $this->coalesce('a', 'aa', 'goodMagic') . ') +
			(' . $this->coalesce('a', 'aa', 'evilMagic') . ') +
			(' . $this->coalesce('a', 'aa', 'cooking') . ') +
			(' . $this->coalesce('a', 'aa', 'woodcutting') . ') +
			(' . $this->coalesce('a', 'aa', 'firemaking') . ') +
			(' . $this->coalesce('a', 'aa', 'crafting') . ') +
			(' . $this->coalesce('a', 'aa', 'smithing') . ') +
			(' . $this->coalesce('a', 'aa', 'mining') . ') +
			(' . $this->coalesce('a', 'aa', 'influence') . ') +
			(' . $this->coalesce('a', 'aa', 'thieving') . ') +
			(' . $this->coalesce('a', 'aa', 'tailoring') . ') +
			(' . $this->coalesce('a', 'aa', 'herblaw') . '))
			/4.0)
			as total_xp'))
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where([
                        ['b.group_id', '>=', '8'],
                    ])
                    ->groupBy('b.username')
                    ->orderBy('b.skill_total', 'desc')
                    ->orderBy('total_xp', 'desc')
                    ->paginate(21);
            } else { // modern authentic
                $hiscores = DB::connection($db)
                    ->table('experience as a')
                    ->join('players as b', 'a.playerID', '=', 'b.id')
                    ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                    ->select('b.*', 'c.*', DB::raw('
			(SUM((' . $this->coalesce('a', 'aa', 'attack') . ') +
			(' . $this->coalesce('a', 'aa', 'strength') . ') +
			(' . $this->coalesce('a', 'aa', 'defense') . ') +
			(' . $this->coalesce('a', 'aa', 'hits') . ') +
			(' . $this->coalesce('a', 'aa', 'ranged') . ') +
			(' . $this->coalesce('a', 'aa', 'prayer') . ') +
			(' . $this->coalesce('a', 'aa', 'magic') . ') +
			(' . $this->coalesce('a', 'aa', 'cooking') . ') +
			(' . $this->coalesce('a', 'aa', 'woodcut') . ') +
			(' . $this->coalesce('a', 'aa', 'fletching') . ') +
			(' . $this->coalesce('a', 'aa', 'fishing') . ') +
			(' . $this->coalesce('a', 'aa', 'firemaking') . ') +
			(' . $this->coalesce('a', 'aa', 'crafting') . ') +
			(' . $this->coalesce('a', 'aa', 'smithing') . ') +
			(' . $this->coalesce('a', 'aa', 'mining') . ') +
			(' . $this->coalesce('a', 'aa', 'herblaw') . ') +
			(' . $this->coalesce('a', 'aa', 'agility') . ') +
			(' . $this->coalesce('a', 'aa', 'thieving') . '))
			/4.0)
			as total_xp'))
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where([
                        ['b.group_id', '>=', '8'],
                    ])
                    ->groupBy('b.username')
                    ->orderBy('b.skill_total', 'desc')
                    ->orderBy('total_xp', 'desc')
                    ->paginate(21);
            }

            $skill = '' . $subpage;

            return view('hiscores', [
                'skill_array' => $skill_array,
                'subpage' => $subpage,
                'db' => $db,
                'ironman_mode' => $iron_man,
                '' . $subpage => $skill,
            ])
                ->with(compact('hiscores'));
        } else {
            if (value($db) == 'openpk') { // openpk
                $hiscores = DB::connection($db)
                    ->table('players as b')
                    ->select('b.*')
                    ->groupBy('b.username')
                    ->orderBy('b.kills desc')
                    ->orderBy('b.deaths', 'asc')
                    ->where([
                        ['b.group_id', '>=', '8'],
                        ['b.kills', '>', '0']
                    ])
                    ->paginate(21);
            } else if (value($db) == 'cabbage' || value($db) == 'coleslaw') { // custom
                $hiscores = DB::connection($db)
                    ->table('experience as a')
                    ->join('players as b', 'a.playerID', '=', 'b.id')
                    ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                    ->join('ironman as c', 'b.id', '=', 'c.playerID')
                    ->select('b.*', 'c.*', DB::raw($this->cast('a', $subpage, true)))
                    ->where([
                        ['a.' . $subpage, '>=', '53452', 'or'], // limits to display only level 30 and above
                        ['a.' . $subpage, '<', '0', 'or'], // and those that have overflow
                    ])
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where([
                        ['b.group_id', '>=', '8'],
                        ['c.iron_man', '=', $iron_man],
                        ['c.iron_man', '!=', '4'],
                    ])
                    ->groupBy('b.username')
                    ->orderByRaw('ifnull(aa.' . $subpage . ', 0xffffffff) asc')
                    ->orderBy($subpage, 'desc')
                    ->paginate(21);
            } else { // authentic
                $hiscores = DB::connection($db)
                    ->table('experience as a')
                    ->join('players as b', 'a.playerID', '=', 'b.id')
                    ->join('capped_experience as aa', 'aa.playerID', '=', 'b.id')
                    ->select('b.*', 'c.*', DB::raw($this->coalesce('a', 'aa', $subpage, true)))
                    ->where([
                        ['a.' . $subpage, '>=', '53452', 'or'], // limits to display only level 30 and above
                        ['a.' . $subpage, '<', '0', 'or'], // and those that have overflow
                        ['aa.' . $subpage, '>=', '0', 'or'], // and those that have looped
                    ])
                    ->whereNotIn('b.banned', [-1, 1])
                    ->where([
                        ['b.group_id', '>=', '8'],
                    ])
                    ->groupBy('b.username')
                    ->orderByRaw('ifnull(aa.' . $subpage . ', 0xffffffff) asc')
                    ->orderBy($subpage, 'desc')
                    ->paginate(21);
            }

            $skill = '' . $subpage;

            return view('hiscoreskill', [
                'skill_array' => $skill_array,
                'subpage' => $subpage,
                'db' => $db,
                'ironman_mode' => $iron_man,
                '' . $subpage => $skill,
            ])
                ->with(compact('hiscores'));
        }
    }

    /**
     * @function searchByName()
     * @param $request
     * @return void
     * Redirects user to a player's hiscores page (to look up player by name).
     */
    public function searchByName(Request $request)
    {
        $name = $request->name;
        $db = $request->db;
        $urlToRedirectTo = "/player/$db/$name";

        return redirect()->to($urlToRedirectTo);
    }

    /**
     * Fetches the toplist view
     * @param $db
     * @return Factory|View
     */
    public function toplist($db): Factory|View
    {
        $db = preg_replace("/[^A-Za-z0-9 ]/", "_", $db);
        $toplist_array = ["2001scape"];

        /**
         * @var $db
         * return not found for servers where toplist was no longer a thing
         */
        if (!in_array($db, $toplist_array)) {
            abort(404);
        }

        try {
            $filename = self::getTopListFileName($db);
            $topListContents = Storage::disk('public')->get($filename);
        } catch (FileNotFoundException $e) {
            $topListContents = "No Runescape hiscore tables available" . "\n";
        }

        return view('toplists', [
            'db' => $db,
            'topListContents' => str_replace("\n", "<br>", $topListContents),
        ]);
    }

    static function getTopListFileName($db) : string
    {
        return 'toplist_' . $db . '.txt';
    }

    /**
     * Create top list file for the specified db and filename
     * @param $db
     * @param $filename
     * @return string
     */
    static function createTopList($db, $filename) : string
    {
        $already_present = false;
        $topListContents = "";
        try {
            $topListContents = Storage::disk('public')->get($filename);
            $lastmodified = Storage::disk('public')->lastModified($filename);
            $lastmodified = DateTime::createFromFormat("U", $lastmodified);
            if($lastmodified->format("Y-m-d") == Carbon::now()->format("Y-m-d")) {
                $already_present = true;
            }
        } catch (FileNotFoundException $e) { }

        if ($already_present) {
            return $topListContents;
        }

        $filenameDated = substr($filename, 0, strrpos($filename, ".")) . "_" . date("Y-m-d") . ".txt";

        $topListContents = "Runescape hiscore tables" . "\n";
        $topListContents .= ("Last updated " . date("d-M-Y") . "\n");

        $topListContents .= ("." . "\n");
        $hiscores = (new HiscoresController)->getTopListSelect($db);
        $topListContents .= ("Top 25 players - score is total of all skills" . "\n");
        $index = 1;
        foreach ($hiscores->orderBy('b.skill_total', 'desc')->get() as $hiscore)
        {
            $topListContents .= ($index . ": " . $hiscore->username . " " . $hiscore->skill_total . "\n");
            $index++;
        }

        $topListContents .= ("." . "\n");
        $hiscores = (new HiscoresController)->getTopListSelect($db);
        $topListContents .= ("Top 25 fighters - score is average combat skill" . "\n");
        $index = 1;
        foreach ($hiscores->orderBy('b.combat', 'desc')->get() as $hiscore)
        {
            $topListContents .= ($index . ": " . $hiscore->username . " " . $hiscore->combat . "\n");
            $index++;
        }

        $professions = array('smiths' => 'smithing', 'miners' => 'mining', 'cooks' => 'cooking', 'rangers' => 'ranged', 'crafters' => 'crafting');

        foreach ($professions as $name => $skill) {
            $topListContents .= ("." . "\n");
            $hiscores = (new HiscoresController)->getTopListSelect($db);
            $topListContents .= ("Top 25 " . $name . "\n");
            $index = 1;
            foreach ($hiscores->orderBy('a.' . $skill, 'desc')->get() as $hiscore)
            {
                $topListContents .= ($index . ": " . $hiscore->username . " " . $hiscore->$skill . "\n");
                $index++;
            }
        }

        Storage::disk('public')->put($filename, $topListContents);
        Storage::disk('public')->put($filenameDated, $topListContents);

        return $topListContents;
    }

    private function getTopListSelect($db) : Builder
    {
        return DB::connection($db)
            ->table('experience as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->join('maxstats as d', 'a.playerID', '=', 'd.playerID')
            ->select('a.*', 'b.*', 'd.*',  DB::raw('
			(SUM((' . $this->cast('a', 'attack') . ') +
			(' . $this->cast('a', 'strength') . ') +
			(' . $this->cast('a', 'defense') . ') +
			(' . $this->cast('a', 'hits') . ') +
			(' . $this->cast('a', 'ranged') . ') +
			(' . $this->cast('a', 'prayGood') . ') +
			(' . $this->cast('a', 'prayEvil') . ') +
			(' . $this->cast('a', 'goodMagic') . ') +
			(' . $this->cast('a', 'evilMagic') . ') +
			(' . $this->cast('a', 'cooking') . ') +
			(' . $this->cast('a', 'woodcutting') . ') +
			(' . $this->cast('a', 'firemaking') . ') +
			(' . $this->cast('a', 'crafting') . ') +
			(' . $this->cast('a', 'smithing') . ') +
			(' . $this->cast('a', 'mining') . ') +
			(' . $this->cast('a', 'influence') . ') +
			(' . $this->cast('a', 'thieving') . ') +
			(' . $this->cast('a', 'tailoring') . ') +
			(' . $this->cast('a', 'herblaw') . '))
			/4.0)
			as total_xp'))
            ->whereNotIn('b.banned', [-1, 1])
            ->where([
                ['b.group_id', '>=', '8'],
            ])
            ->groupBy('b.username')
            ->limit(25);
    }
}
