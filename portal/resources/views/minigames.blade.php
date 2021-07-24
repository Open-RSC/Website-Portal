@extends('template')

@section('content')
    <div class="col">
        <div class="text-primary">
            <div class="pl-3 pr-3 container">

                <div class="table-transparent pl-5 pr-5 mb-5">
                    <div id="row1" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest/bar_crawl"
                             title="It is considered a 'rite of passage'. To complete it, you must tour all the finest bars and taste the strongest drinks in RuneScape Classic.">
									<span class="d-block">
										<img class="d-block" alt="minigame image"
                                             src="{{ asset('img/minigames/Bar_Crawl_Complete.png') }}"
                                             style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Bar Crawl
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

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest/barbarian_agility_course"
                             title="Theoretical maximum experience rate for running the full lap is 16k agility experience per hour. However, this is rarely possible at lower levels so many choose to only repeat Low wall jump for a constant 13.5k agility experience per hour. ">
									<span class="d-block">
										<img class="d-block" alt="minigame image"
                                             src="{{ asset('img/minigames/Barb_handholds.png') }}"
                                             style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Barbarian Agility Course
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

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest/kitten_to_cat"
                             title="It takes roughly 2 hours for a kitten to mature into a cat. During that time your kitten will demand attention and food.">
									<span class="d-block">
										<img class="d-block" alt="minigame image"
                                             src="{{ asset('img/minigames/Kitten_growth.png') }}"
                                             style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Kitten to Cat
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

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest/blurberrys_bar"
                             title="Prepare gnomish drinks for Blurberry and be awarded some money and cooking experience per order completed.">
									<span class="d-block">
										<img class="d-block" alt="minigames image"
                                             src="{{ asset('img/minigames/Blurberry_bar_tutorial_done.png') }}"
                                             style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Blurberry's Bar
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

                    <div id="row2" class="d-flex flex-wrap justify-content-between pt-3">
                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest/fishing_trawler"
                             title="You can only get fish that correspond to your fishing level. You will get full XP for any fish you catch on the trawler.">
									<span class="d-block">
										<img class="d-block" alt="minigame image"
                                             src="{{ asset('img/minigames/Fishing_trawler_full_net.png') }}"
                                             style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Fishing Trawler
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

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest/gnome_ball"
                             title="There are various methods a player may utilize to smuggle a gnomeball for use outside of the minigame.">
									<span class="d-block">
										<img class="d-block" alt="minigame image"
                                             src="{{ asset('img/minigames/Gnome_Ball_Agility_Bonus.png') }}"
                                             style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Gnome Ball
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

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest/mage_arena"
                             title="This is a dangerous Minigame, Death is very possible.">
									<span class="d-block">
										<img class="d-block" alt="minigames image"
                                             src="{{ asset('img/minigames/Completeing_MageArena.png') }}"
                                             style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Mage Arena
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

                        <div class="clickable-row" data-toggle="tooltip" data-href="/quest/gnome_restaurant"
                             title="Produce gnome cuisine for Aluft Gianne and be awarded some money and cooking experience per order completed.">
									<span class="d-block">
										<img class="d-block" alt="minigames image"
                                             src="{{ asset('img/minigames/Gnome_restaurant_tutorial_done.png') }}"
                                             style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Gnome Restaurant
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
                </div>
            </div>
        </div>
    </div>
@endsection
