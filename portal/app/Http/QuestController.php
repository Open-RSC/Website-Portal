<?php

namespace App\Http;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class QuestController extends Controller
{
    /**
     * @function index()
     *
     * @return Factory|View
     * Used to show the main quests page
     */
    public function index(): Factory|View
    {
        return view('quests');
    }

    /**
     * @function minigames()
     *
     * @return Factory|View
     * Used to show the minigames page
     */
    public function minigames(): Factory|View
    {
        return view('minigames');
    }

    /**
     * @return Factory|View
     * Used to show all quest-specific sub pages
     */
    public function show($subpage): Factory|View
    {
        /**
         * @var $quest_array
         * prevents non-authentic quests from showing if .env DB_DATABASE is named 'openrsc'
         */
        $quest_array = Config::get('app.authentic') == true ?
            ['black_knights_fortress', 'cooks_assistant',
                'demon_slayer', 'dorics_quest', 'dragon_slayer', 'earnest_the_chicken', 'goblin_diplomacy', 'imp_catcher',
                'the_knights_sword', 'pirates_treasure', 'price_ali_rescue', 'the_restless_ghost', 'romeo_and_juliet',
                'sheep_sheerer', 'shield_of_arrav', '', 'vampire_slayer', 'witchs_potion', 'biohazard', 'clock_tower',
                'digsite', 'druidic_ritual', 'dwarf_cannon', 'family_crest', 'fight_arena', 'fishing_contest',
                'the_grand_tree', 'gertrudes_cat', 'the_hazeel_cult', 'heros_quest', 'the_holy_grail', 'jungle_potion',
                'legends_quest', 'lost_city', 'merlins_crystal', 'monks_friend', 'murder_mystery', 'observatory_quest',
                'plague_city', 'scorpion_catcher', 'sea_slug', 'sheep_herder', 'shilo_village', 'temple_of_ikov',
                'tourist_trap', 'tree_gnome_village', 'tribal_totem', 'underground_pass', 'watchtower', 'waterfall_quest',
                'witchs_house'] :
            ['black_knights_fortress', 'cooks_assistant',
                'demon_slayer', 'dorics_quest', 'dragon_slayer', 'earnest_the_chicken', 'goblin_diplomacy', 'imp_catcher',
                'the_knights_sword', 'pirates_treasure', 'price_ali_rescue', 'the_restless_ghost', 'romeo_and_juliet',
                'sheep_sheerer', 'shield_of_arrav', '', 'vampire_slayer', 'witchs_potion', 'biohazard', 'clock_tower',
                'digsite', 'druidic_ritual', 'dwarf_cannon', 'family_crest', 'fight_arena', 'fishing_contest',
                'the_grand_tree', 'gertrudes_cat', 'the_hazeel_cult', 'heros_quest', 'the_holy_grail', 'jungle_potion',
                'legends_quest', 'lost_city', 'merlins_crystal', 'monks_friend', 'murder_mystery', 'observatory_quest',
                'plague_city', 'scorpion_catcher', 'sea_slug', 'sheep_herder', 'shilo_village', 'temple_of_ikov',
                'tourist_trap', 'tree_gnome_village', 'tribal_totem', 'underground_pass', 'watchtower', 'waterfall_quest',
                'witchs_house'];

        $minigame_array = ['bar_crawl', 'barbarian_agility_course', 'kitten_to_cat', 'fishing_trawler', 'gnome_ball', 'mage_arena'];

        /**
         * @var $subpage
         * Replaces spaces with underlines
         */
        $subpage = preg_replace('/[^A-Za-z0-9 ]/', '_', $subpage);

        /**
         * @var $quest
         */
        /*$quest = DB::connection('cabbage')
            ->table('quests as a')
            ->join('players as b', 'a.playerID', '=', 'b.id')
            ->select('*', DB::raw($subpage))
            ->where([
                ['b.banned', '=', '0'],
                ['b.group_id', '=', '10'],
                ['b.highscoreopt', '=', '0'],
            ])
            ->get();*/

        return view('quests/'.$subpage, [
            //'quest' => $quest,
            'quest_array' => $quest_array,
            'minigame_array' => $minigame_array,
            'subpage' => $subpage,
        ])
            ->with(compact('quest'));
    }
}
