<?php

namespace App\Http;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

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
            if ($exp >= $experienceArray[$level + 1]) {
                continue;
            }
            return ($level + 1);
        }
        return 99;
    }

    /**
     * @function index()
     * @return Factory|View
     * Used to show the main hiscores page
     */
    public function index(): Factory|View
    {
        /**
         * @return Factory|View
         * @var $hiscores
         * Fetches the table row of the player experience in view and paginates the results
         */
        $hiscores = DB::connection('cabbage')
            ->table('experience as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->join('ironman as c', 'b.id', '=', 'c.playerID')
            ->select('b.*', 'c.*', DB::raw('
			(SUM(a.attack +
			a.strength +
			a.defense +
			a.hits +
			a.ranged +
			a.prayer +
			a.magic +
			a.cooking +
			a.woodcut +
			a.fletching +
			a.fishing +
			a.firemaking +
			a.crafting +
			a.smithing +
			a.mining +
			a.herblaw +
			a.agility +
			a.thieving)
			/4.0)
			as total_xp'))
            ->where([
                ['b.banned', '=', '0'],
                ['b.group_id', '=', '10'],
                ['c.iron_man', '!=', '4'],
            ])
            ->groupBy('b.username')
            ->orderBy('b.skill_total', 'desc')
            ->orderBy('total_xp', 'desc')
            ->paginate(21);

        /**
         * @var $skill_array
         * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
         */

        $skill_array = Config::get('app.authentic') == true ? array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving') : array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft');
        return view('hiscores', [
            'skill_array' => $skill_array,
        ])
            ->with(compact('hiscores'));
    }

    /**
     * @param $subpage
     * @return Factory|View
     * Used to show all skill-specific sub pages
     */
    public function show($subpage): Factory|View
    {
        /**
         * @var $skill_array
         * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
         */
        $skill_array = Config::get('app.authentic') == true ? array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving') : array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft');

        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

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

        $hiscores = DB::connection('cabbage')
            ->table('experience as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->join('ironman as c', 'b.id', '=', 'c.playerID')
            ->select('b.*', 'c.*', DB::raw('a.' . $subpage))
            ->where([
                ['b.banned', '=', '0'],
                ['b.group_id', '=', '10'],
                ['a.' . $subpage, '>=', '53452'], // limits to display only level 30 and above
                ['c.iron_man', '!=', '4'],
            ])
            ->groupBy('b.username')
            ->orderBy('a.' . $subpage, 'desc')
            ->paginate(21);

        $skill = '' . $subpage;

        return view('hiscoreskill', [
            'skill_array' => $skill_array,
            'subpage' => $subpage,
            '' . $subpage => $skill,
        ])
            ->with(compact('hiscores'));
    }

    /**
     * @param $subpage
     * @param $iron_man
     * @return Factory|View
     */
    public function iron_man($subpage, $iron_man): Factory|View
    {
        /**
         * @var $skill_array
         * prevents non-authentic skills from showing if .env DB_DATABASE is named 'openrsc'
         */
        $skill_array = Config::get('app.authentic') == true ? array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving') : array('skill_total', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft');

        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

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
            $hiscores = DB::connection('cabbage')
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('ironman as c', 'b.id', '=', 'c.playerID')
                ->select('b.*', 'c.*', DB::raw('
			(SUM(a.attack +
			a.strength +
			a.defense +
			a.hits +
			a.ranged +
			a.prayer +
			a.magic +
			a.cooking +
			a.woodcut +
			a.fletching +
			a.fishing +
			a.firemaking +
			a.crafting +
			a.smithing +
			a.mining +
			a.herblaw +
			a.agility +
			a.thieving)
			/4.0)
			as total_xp'))
                ->where([
                    ['b.banned', '=', '0'],
                    ['b.group_id', '=', '10'],
                    ['c.iron_man', '=', $iron_man],
                ])
                ->groupBy('b.username')
                ->orderBy('b.skill_total', 'desc')
                ->orderBy('total_xp', 'desc')
                ->paginate(21);

            $skill = '' . $subpage;

            return view('hiscores', [
                'skill_array' => $skill_array,
                'subpage' => $subpage,
                'ironman_mode' => $iron_man,
                '' . $subpage => $skill,
            ])
                ->with(compact('hiscores'));
        } else {
            $hiscores = DB::connection('cabbage')
                ->table('experience as a')
                ->join('players as b', 'a.playerID', '=', 'b.id')
                ->join('ironman as c', 'b.id', '=', 'c.playerID')
                ->select('b.*', 'c.*', DB::raw('a.' . $subpage))
                ->where([
                    ['b.banned', '=', '0'],
                    ['b.group_id', '=', '10'],
                    ['a.' . $subpage, '>=', '53452'], // limits to display only level 30 and above
                    ['c.iron_man', '=', $iron_man],
                ])
                ->groupBy('b.username')
                ->orderBy('a.' . $subpage, 'desc')
                ->paginate(21);

            $skill = '' . $subpage;

            return view('hiscoreskill', [
                'skill_array' => $skill_array,
                'subpage' => $subpage,
                'ironman_mode' => $iron_man,
                '' . $subpage => $skill,
            ])
                ->with(compact('hiscores'));
        }
    }
}
