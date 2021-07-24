@extends('template')

@section('content')
    <div class="col">
        <div class="text-primary">
            <div class="pl-3 pr-3 container">

                <!-- Begin F2P Quests -->
                <div id="f2p" class="table-transparent pl-5 pr-5 mb-5">
                    <div class="text-white h5 pt-2 text-center">Free Quests</div>
                    <div id="row1" class="d-flex flex-wrap justify-content-between pt-3">
                        <div data-toggle="tooltip" title="Reward: 3 quest points and 2500 coins">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Black_Knights%27_Fortress_(quest)"
                                   target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Black_Knight_Quest_Complete.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="quest image">
									<span class="text-gray-300">
										Black Knights' Fortress
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/_rI4zHpi1Bs?t=4100" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, cooking experience, and access to the cook's range in Lumbridge castle">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Cook%27s_Assistant" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Cooks_Assistant_Completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Cook's Assistant
									</span>
								</a>
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

                        <div data-toggle="tooltip" title="Reward: 3 quest points and to obtain Silverlight">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Demon_Slayer" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Demon_Slayer_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Demon Slayer
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, mining experience, 180 coins, and the ability to use Doric's anvils">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Doric%27s_Quest" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Dorics_Quest_Completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Doric's Quest
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/_rI4zHpi1Bs?t=3975" target="_blank"><i
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
                    </div>

                    <div id="row2" class="d-flex flex-wrap justify-content-between pt-3">
                        <div data-toggle="tooltip"
                             title="Reward: 2 quest points, defense experience, strength experience, and the ability to wear the rune plate mail body">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Dragon_slayer" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Dragon_Slayer_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Dragon slayer
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/76T0pMawXMA?t=260" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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

                        <div data-toggle="tooltip" title="Reward: 4 quest points and 300 coins">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Ernest_the_Chicken" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Ernest_Chicken_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Ernest the Chicken
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=4394" target="_blank"><i
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

                        <div data-toggle="tooltip" title="Reward: 5 quests, 1 gold bar, and crafting experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Goblin_Diplomacy" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Goblin_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Goblin Diplomacy
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/_rI4zHpi1Bs?t=2464" target="_blank"><i
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, magic experience, and an amulet of accuracy">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Imp_Catcher" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Imp_Catcher_Completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Imp Catcher
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=10551" target="_blank"><i
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
                    </div>

                    <div id="row3" class="d-flex flex-wrap justify-content-between pt-3">
                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, smithing experience, and optionally the Faladian Sword">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/The_Knight%27s_Sword" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Knight\'s_Sword_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										The Knight's Sword
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 2 quest points, 450 coins, a gold ring, and an emerald">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Pirate%27s_Treasure" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Pirates_Treasure_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Pirate's Treasure
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/ualcnFURH-Q?t=151" target="_blank"><i
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

                        <div data-toggle="tooltip"
                             title="Reward: 3 quest points, 700 coins, and free passage through the Al-Kharid toll gate">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Prince_Ali_Rescue" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Prince_Ali_Rescue_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Prince Ali Rescue
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, prayer experience, and an Amulet of Ghostspeak">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/The_Restless_Ghost" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/The_Restless_Ghost_Completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										The Restless Ghost
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=2575" target="_blank"><i
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
                    </div>

                    <div id="row4" class="d-flex flex-wrap justify-content-between pt-3">
                        <div data-toggle="tooltip"
                             title="Reward: 5 quest points">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Romeo_%26_Juliet" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Romeo_Juliet_Completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Romeo & Juliet
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=9055" target="_blank"><i
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, 60 coins, and crafting experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Sheep_Shearer" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Sheep_Shearer_Completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Sheep Shearer
									</span>
								</a>
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point and 600 coins">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Shield_of_Arrav" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Shield_of_Arrav_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Shield of Arrav
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/ualcnFURH-Q?t=1881" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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

                        <div data-toggle="tooltip"
                             title="Reward: 3 quest points and attack experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Vampire_Slayer" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Vampire_Slayer_Completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Vampire Slayer
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/ga-Vda46MGw?t=7638" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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
                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point and magic experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Witch%27s_potion" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Witch\'s_potion_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Witch's potion
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/_rI4zHpi1Bs?t=5984" target="_blank"><i
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
                    </div>

                </div>
                <!-- End F2P Quests -->

                <!-- Begin Members Quests -->
                <div id="members" class="table-transparent pl-5 pr-5">
                    <div class="text-white h5 pt-2 text-center">Members Quests</div>
                    <div id="row1" class="d-flex flex-wrap justify-content-between pt-3">
                        <div data-toggle="tooltip"
                             title="Reward: 3 quest points, a King Lathas Amulet, use of the Combat Training Camp, ability to travel through the Ardougne wall gateway, and thieving experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Biohazard" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Biohazard_finish_8.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Biohazard
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/Gw8b17_wKwc?t=258" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point and 500 coins">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Clock_Tower" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Clock_tower_2.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Clock Tower
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/CpQuyphK3i4?t=171" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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

                        <div data-toggle="tooltip"
                             title="Reward: 2 quest points, 2 gold bars, mining experience, and herblaw experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Digsite_(quest)" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Digsite_Completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Digsite
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 4 quest points, herblaw experience, and the ability to use the herblaw skill">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Druidic_Ritual" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Druidic_Ritual_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Druidic Ritual
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/pa9UPyMdDE0?t=6427" target="_blank"><i
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
                    </div>

                    <div id="row2" class="d-flex flex-wrap justify-content-between pt-3">
                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, crafting experience, the ability to buy a dwarf cannon, and the ability to make cannonballs with steel bars">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Dwarf_Cannon" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Dwarf_cannon_finish.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Dwarf Cannon
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, access to the hellhound dungeon east of Ardougne, and steel gauntlets that can be enhanced">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Family_Crest" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Family_Crest_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Family Crest
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 2 quest points, attack experience, thieving experience, and 1000 coins">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Fight_Arena_(quest)" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/FightArenaComplete.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Fight Arena
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, fishing experience, and access to the Dwarf's underground tunnel beneath White Wolf Mountain">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Fishing_Contest" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/FishConReward.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Fishing Contest
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/3bJOYgCWDhA?t=2266" target="_blank"><i
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
                    </div>

                    <div id="row3" class="d-flex flex-wrap justify-content-between pt-3">
                        <div data-toggle="tooltip"
                             title="Reward: 5 quest points, agility experience, magic experience, attack experience, access to the mines in Grand Tree, access to the Spirit Tree located at the Grand Tree, and access to the gnome gliders">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/The_Grand_Tree_(quest)" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Grand_tree_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										The Grand Tree
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, a kitten, a chocolate cake, a stew, and cooking experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Gertrude%27s_Cat" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Gertude_Cat_Complete.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Gertrude's Cat
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, 2000 coins, thieving experience, and Carnillean armour">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/The_Hazeel_Cult" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Good_Hazeel_Complete.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										The Hazeel Cult
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/CpQuyphK3i4?t=4396" target="_blank"><i
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, experience in multiple skills, access to the Heroes' Guild, and the ability to wield the Dragon axe">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Hero%27s_Quest" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Heroes_finish.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Hero's Quest
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/3bJOYgCWDhA?t=3541" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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
                        <div data-toggle="tooltip"
                             title="Reward: 2 quest points, prayer experience, and defense experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/The_Holy_Grail" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/HolyGrailComplete.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										The Holy Grail
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point and herblaw experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Jungle_Potion" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/JunglePotionComplete.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Jungle Potion
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 4 quest points, experience in several skills, access to the Legends' Guild, the ability to wield the Dragon Square Shield and Cape of Legends, and the ability to make cooked oomlie meat parcels and blessed golden bowls">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Legend%27s_Quest" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/LegendsQuestComplete.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Legend's Quest
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 3 quest points, access to Zanaris, and the ability to buy Dragon Swords">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Lost_City" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Lost_City_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Lost City
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/pa9UPyMdDE0?t=8043" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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
                        <div data-toggle="tooltip"
                             title="Reward: 6 quest points, Excalibur, and the ability to begin the Heroes' Quest">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Merlin%27s_Crystal" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Merlins_Crystal_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Merlin's Crystal
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/pa9UPyMdDE0?t=1298" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, 8 law runes, and woodcutting experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Monk%27s_Friend" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Monk\'s_friend_end.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Monk's Friend
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/CpQuyphK3i4?t=3833" target="_blank"><i
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

                        <div data-toggle="tooltip"
                             title="Reward: 3 quest points, crafting experience, and 2000 coins">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Murder_Mystery" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Murder_reward.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Murder Mystery
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 2 quest points, crafting experience, various items, and an uncut sapphire">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Observatory_Quest" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Observatory_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Observatory Quest
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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
                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, a magic scroll granting the ability to cast Ardougne teleport, and mining experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Plague_City" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Plague_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Plague City
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/sQQaoxEIuvc?t=1411" target="_blank"><i
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, strength experience, and Thormac the Sorcerer will enchant battlestaffs for 40K coins">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Scorpion_Catcher" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Scorp_catcher_end.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Scorpion Catcher
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/IxRisOrdfjk?t=409" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, a oyster pearl, and fishing experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Sea_Slug" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/SeaSlugComplete.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Sea Slug
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 4 quest points, a protective jacket, protective trousers, and 3100 coins">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Sheep_Herder" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Sheep_Herder_Completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Sheep Herder
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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
                        <div data-toggle="tooltip"
                             title="Reward: 2 quest points, access to Shilo Village, and crafting experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Shilo_Village_(quest)" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/ShiloVillageComplete.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Shilo Village
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, ranged experience, fletching experience, a Pendant of Lucien, a Pendant of Armadyl, and a Staff of Armadyl">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Temple_of_Ikov" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Temple_of_Ikov_Evil_-_Complete.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Temple of Ikov
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/3bJOYgCWDhA?t=484" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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

                        <div data-toggle="tooltip"
                             title="Reward: 2 quest points, the ability to make throwing darts, slave robe top and bottom, a wrought iron key, access to the Desert Mining Camp mine, and experience in various skills">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Tourist_Trap" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/TouristTrapComplete.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Tourist Trap
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 2 quest points, attack experience, a Gnome Amulet of Protection, and access to Spirit Trees">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Tree_Gnome_Village_(quest)" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Tree_Gnome_Village_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Tree Gnome Village
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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
                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, thieving experience, and 5 swordfish">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Tribal_Totem" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Tribal_totem_5.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Tribal Totem
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 5 quest points, a Staff of Iban, 30 fire runes, 15 death runes, attack experience, and agility experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Underground_Pass" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Underground_completed.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Underground Pass
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 4 quest points, 5000 coins, magic experience, and the ability to use the Watchtower teleport spell">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Watchtower_(quest)" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Watchtower_other_rewards.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Watchtower
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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

                        <div data-toggle="tooltip"
                             title="Reward: 1 quest point, 40 mithril seeds, 2 diamonds, 2 gold bars, strength experience, and attack experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Waterfall_Quest" target="_blank">
									<img class="d-block"
                                         src="{{ asset('img/quests/Waterfall_Quest_Completed.png') }}"
                                         style="max-height:150px; max-width: 225px;" alt="">
									<span class="text-gray-300">
										Waterfall Quest
									</span>
								</a>
                                <!--<span class="float-right">
                                    <a href="" target="_blank"><i class="fab fa-youtube"></i> Watch</a>
                                </span>-->
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
                        <div data-toggle="tooltip"
                             title="Reward: 4 quest points and hits experience">
							<span class="d-block">
								<a href="https://classic.runescape.wiki/w/Witch%27s_House" target="_blank">
									<img class="d-block" alt="quest image"
                                         src="{{ asset('img/quests/Witches_Quest_end.png') }}"
                                         style="max-height:150px; max-width: 225px;">
									<span class="text-gray-300">
										Witch's House
									</span>
								</a>
								<span class="float-right">
									<a href="https://youtu.be/pa9UPyMdDE0?t=259" target="_blank"><i
                                                class="fab fa-youtube"></i> Watch</a>
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
