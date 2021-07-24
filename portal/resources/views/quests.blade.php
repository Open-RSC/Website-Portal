@extends('template')

@section('content')
    <div class="col">
        <div class="text-primary">
            <div class="pl-3 pr-3 container">

                <!-- Begin F2P Quests -->
                <div id="f2p" class="table-transparent pl-5 pr-5 mb-5">
                    <div class="text-white h5 pt-2 text-center">Free Quests</div>
                    <div id="row1" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest/black_knights_fortress"
                             title="Reward: 3 quest points and 2500 coins">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Black_Knight_Quest_Complete.png') }}"
                                     style="max-height:150px; max-width: 225px;" alt="quest image">
								<span class="text-gray-300">
									Black Knights' Fortress
								</span>
								<span class="float-right">
									<a href="https://youtu.be/_rI4zHpi1Bs?t=4100" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-cooks-assistant"
                             title="Reward: 1 quest point, cooking experience, and access to the cook's range in Lumbridge castle">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Cooks_Assistant_Completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Cook's Assistant
								</span>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=465" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-demon-slayer"
                             title="Reward: 3 quest points and to obtain Silverlight">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Demon_Slayer_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Demon Slayer
								</span>
								<span class="float-right">
									<a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-doric-quest"
                             title="Reward: 1 quest point, mining experience, 180 coins, and the ability to use Doric's anvils">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Dorics_Quest_Completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Doric's Quest
								</span>
								<span class="float-right">
									<a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                    <div id="row2" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-dragon-slayer"
                             title="Reward: 2 quest points, defense experience, strength experience, and the ability to wear the rune plate mail body">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Dragon_Slayer_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Dragon slayer
								</span>
								<span class="float-right">
									<a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-ernest-the-chicken"
                             title="Reward: 4 quest points and 300 coins">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Ernest_Chicken_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Ernest the Chicken
								</span>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=4394" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-goblin-diplomacy"
                             title="Reward: 5 quests, 1 gold bar, and crafting experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Goblin_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Goblin Diplomacy
								</span>
								<span class="float-right">
									<a href="https://youtu.be/_rI4zHpi1Bs?t=2464" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-imp-catcher"
                             title="Reward: 1 quest point, magic experience, and an amulet of accuracy">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Imp_Catcher_Completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Imp Catcher
								</span>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=10551" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                    <div id="row3" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-the-knights-sword"
                             title="Reward: 1 quest point, smithing experience, and optionally the Faladian Sword">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Knight\'s_Sword_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									The Knight's Sword
								</span>
								<span class="float-right">
									<a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-pirates-treasure"
                             title="Reward: 2 quest points, 450 coins, a gold ring, and an emerald">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Pirates_Treasure_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Pirate's Treasure
								</span>
								<span class="float-right">
									<a href="https://youtu.be/ualcnFURH-Q?t=151" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-prince-ali-rescue"
                             title="Reward: 3 quest points, 700 coins, and free passage through the Al-Kharid toll gate">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Prince_Ali_Rescue_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Prince Ali Rescue
								</span>
								<span class="float-right">
									<a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-the-restless-ghost"
                             title="Reward: 1 quest point, prayer experience, and an Amulet of Ghostspeak">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/The_Restless_Ghost_Completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									The Restless Ghost
								</span>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=2575" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                    <div id="row4" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-romeo-and-juliet"
                             title="Reward: 5 quest points">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Romeo_Juliet_Completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Romeo & Juliet
								</span>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=9055" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-sheep-shearer"
                             title="Reward: 1 quest point, 60 coins, and crafting experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Sheep_Shearer_Completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Sheep Shearer
								</span>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=1368" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-shield-of-arrav"
                             title="Reward: 1 quest point and 600 coins">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Shield_of_Arrav_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Shield of Arrav
								</span>
								<span class="float-right">
									<a href="https://youtu.be/ualcnFURH-Q?t=1881" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-vampire-slayer"
                             title="Reward: 3 quest points and attack experience">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Vampire_Slayer_Completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Vampire Slayer
								</span>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=7638" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Diffculty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>i
							</span>
                        </div>
                    </div>

                    <div id="row5" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-witchs-potion"
                             title="Reward: 1 quest point and magic experience">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Witch\'s_potion_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Witch's potion
								</span>
								<span class="float-right">
									<a href="https://youtu.be/_rI4zHpi1Bs?t=5984" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                </div>
                <!-- End F2P Quests -->

                <!-- Begin Members Quests -->
                <div id="members" class="table-transparent pl-5 pr-5">
                    <div class="text-white h5 pt-2 text-center">Members Quests</div>
                    <div id="row1" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-biohazard"
                             title="Reward: 3 quest points, a King Lathas Amulet, use of the Combat Training Camp, ability to travel through the Ardougne wall gateway, and thieving experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Biohazard_finish_8.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Biohazard
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-clock-tower"
                             title="Reward: 1 quest point and 500 coins">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Clock_tower_2.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Clock Tower
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-digsite"
                             title="Reward: 2 quest points, 2 gold bars, mining experience, and herblaw experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Digsite_Completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Digsite
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-druidic-ritual"
                             title="Reward: 4 quest points, herblaw experience, and the ability to use the herblaw skill">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Druidic_Ritual_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Druidic Ritual
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                    <div id="row2" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-dwarf-cannon"
                             title="Reward: 1 quest point, crafting experience, the ability to buy a dwarf cannon, and the ability to make cannonballs with steel bars">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Dwarf_cannon_finish.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Dwarf Cannon
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-family-crest"
                             title="Reward: 1 quest point, access to the hellhound dungeon east of Ardougne, and steel gauntlets that can be enhanced">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Family_Crest_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Family Crest
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-fight-arena"
                             title="Reward: 2 quest points, attack experience, thieving experience, and 1000 coins">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/FightArenaComplete.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Fight Arena
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-fishing-contest"
                             title="Reward: 1 quest point, fishing experience, and access to the Dwarf's underground tunnel beneath White Wolf Mountain">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/FishConReward.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Fishing Contest
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                    <div id="row3" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-the-grand-tree"
                             title="Reward: 5 quest points, agility experience, magic experience, attack experience, access to the mines in Grand Tree, access to the Spirit Tree located at the Grand Tree, and access to the gnome gliders">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Grand_tree_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									The Grand Tree
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-gertrudes-cat"
                             title="Reward: 1 quest point, a kitten, a chocolate cake, a stew, and cooking experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Gertude_Cat_Complete.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Gertrude's Cat
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-the-hazeel-cult"
                             title="Reward: 1 quest point, 2000 coins, thieving experience, and Carnillean armour">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Good_Hazeel_Complete.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									The Hazeel Cult
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-heros-quest"
                             title="Reward: 1 quest point, experience in multiple skills, access to the Heroes' Guild, and the ability to wield the Dragon axe">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Heroes_finish.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Hero's Quest
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                    <div id="row4" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-the-holy-grail"
                             title="Reward: 2 quest points, prayer experience, and defense experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/HolyGrailComplete.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									The Holy Grail
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-jungle-potion"
                             title="Reward: 1 quest point and herblaw experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/JunglePotionComplete.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Jungle Potion
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-legends-quest"
                             title="Reward: 4 quest points, experience in several skills, access to the Legends' Guild, the ability to wield the Dragon Square Shield and Cape of Legends, and the ability to make cooked oomlie meat parcels and blessed golden bowls">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/LegendsQuestComplete.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Legend's Quest
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-lost-city"
                             title="Reward: 3 quest points, access to Zanaris, and the ability to buy Dragon Swords">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Lost_City_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Lost City
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                    <div id="row5" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-merlins-crystal"
                             title="Reward: 6 quest points, Excalibur, and the ability to begin the Heroes' Quest">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Merlins_Crystal_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Merlin's Crystal
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-monks-friend"
                             title="Reward: 1 quest point, 8 law runes, and woodcutting experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Monk\'s_friend_end.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Monk's Friend
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-murder-mystery"
                             title="Reward: 3 quest points, crafting experience, and 2000 coins">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Murder_reward.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Murder Mystery
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-observatory-quest"
                             title="Reward: 2 quest points, crafting experience, various items, and an uncut sapphire">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Observatory_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Observatory Quest
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                    <div id="row6" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-plague-city"
                             title="Reward: 1 quest point, a magic scroll granting the ability to cast Ardougne teleport, and mining experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Plague_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Plague City
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-scorpion-catcher"
                             title="Reward: 1 quest point, strength experience, and Thormac the Sorcerer will enchant battlestaffs for 40K coins">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Scorp_catcher_end.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Scorpion Catcher
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-sea-slug"
                             title="Reward: 1 quest point, a oyster pearl, and fishing experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/SeaSlugComplete.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Sea Slug
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-sheep-herder"
                             title="Reward: 4 quest points, a protective jacket, protective trousers, and 3100 coins">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Sheep_Herder_Completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Sheep Herder
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                    <div id="row7" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-shilo-village"
                             title="Reward: 2 quest points, access to Shilo Village, and crafting experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/ShiloVillageComplete.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Shilo Village
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-temple-of-ikov"
                             title="Reward: 1 quest point, ranged experience, fletching experience, a Pendant of Lucien, a Pendant of Armadyl, and a Staff of Armadyl">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Temple_of_Ikov_Evil_-_Complete.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Temple of Ikov
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-tourist-trap"
                             title="Reward: 2 quest points, the ability to make throwing darts, slave robe top and bottom, a wrought iron key, access to the Desert Mining Camp mine, and experience in various skills">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/TouristTrapComplete.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Tourist Trap
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-tree-gnome-village"
                             title="Reward: 2 quest points, attack experience, a Gnome Amulet of Protection, and access to Spirit Trees">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Tree_Gnome_Village_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Tree Gnome Village
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                    <div id="row8" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-tribal-totem"
                             title="Reward: 1 quest point, thieving experience, and 5 swordfish">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Tribal_totem_5.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Tribal Totem
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-underground-pass"
                             title="Reward: 5 quest points, a Staff of Iban, 30 fire runes, 15 death runes, attack experience, and agility experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Underground_completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Underground Pass
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-watchtower"
                             title="Reward: 4 quest points, 5000 coins, magic experience, and the ability to use the Watchtower teleport spell">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Watchtower_other_rewards.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Watchtower
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-waterfall-quest"
                             title="Reward: 1 quest point, 40 mithril seeds, 2 diamonds, 2 gold bars, strength experience, and attack experience">
							<span class="d-block">
								<img class="d-block"
                                     src="{{ asset('img/quests/Waterfall_Quest_Completed.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Waterfall Quest
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>

                    <div id="row9" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest-witches-house"
                             title="Reward: 4 quest points and hits experience">
							<span class="d-block">
								<img class="d-block" alt="quest image"
                                     src="{{ asset('img/quests/Witches_Quest_end.png') }}"
                                     style="max-height:150px; max-width: 225px;">
								<span class="text-gray-300">
									Witch's House
								</span>
							</span>
                            <span class="d-block pb-3">
								Difficulty:
								<span class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span>
								<span class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</span>
							</span>
                        </div>
                    </div>
					<!-- End Members Quests -->

                </div>
            </div>
        </div>
    </div>
@endsection
