@extends('template')

@section('content')
	<h2 class="h2 text-center text-capitalize display-3 pb-4">Black Knight's Fortress</h2>
	<div class="text-primary">
		<div class="pl-3 pr-3 container">
			<div class="text-center">
				<img class="display-glow pb-3" src="{{ asset('img/quests/Black_Knight_Quest_Complete.png') }}"
					 alt="quest complete">
			</div>

			<div class="table-transparent mt-2 pl-5 pt-3 pb-3 pr-5">
				<div class="row">
					<div class="col-5 float-left">
						<span class="d-block"><span class="text-info">Release date:</span>
							<span class="small"> 6 April 2001</span>
						</span>
						<span class="d-block"><span class="text-info">Difficulty:</span>
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
						<span class="d-block"><span class="text-info">Length:</span>
							<span class="small"> Medium</span>
						</span>
						<span class="d-block"><span class="text-info">Requirements:</span>
							<span class="small"> 12 Quest Points</span>
						</span>
						<span class="d-block"><span class="text-info">Start:</span>
							<span class="small"> Talk to Sir Amik Varze in the White Knights Castle</span>
						</span>
					</div>

					<div class="col-7">
				<span class="d-block"><span class="text-info">Items required:</span>
					<span class="d-block small">- Medium Bronze Helmet (Can be bought from Peksa's Helmet Shop in Barbarian Village)</span>
					<span class="d-block small">- Iron Chain Mail Body (Can be bought from Horvik's shop in Varrock, or from Wayne's Chains in Falador)</span>
					<span class="d-block small">- Cabbage (One that is not from the patch near Draynor Manor)</span>
				</span>
						<span class="d-block">
							<span class="text-info">Monsters to kill:</span>
							<span class="d-block small">- 3 Black Knights (level 46) unless you can rapidly click your way through the door before they swarm you</span>
						</span>
					</div>
				</div>
			</div>

			<div class="table-transparent mt-2 pl-5 pt-3 pb-3 pr-5">
				<div class="h4 text-info">
					Starting the quest
				</div>
				<div class="row">
					<div class="col-2 text-center">
						<img src="{{ asset('img/quests/Sir_Amik_Varze.png') }}"
							 alt="Sir Amik Varze">
					</div>
					<div class="col pt-3">
						To start this quest, talk to Sir Amik Varze who is found wandering on the second floor of the
						White Knights Castle in Falador. Tell him you are seeking a quest and he'll say he needs some
						spy work done. The Black Knights at the Black Knights' Fortress are threatening to invade
						Falador with a secret weapon, and Sir Amik Varze wants you to find out what it is and sabotage
						it.
					</div>
				</div>
			</div>

			<div class="table-transparent mt-2 pl-5 pt-3 pb-3 pr-5">
				<div class="h4 text-info">Gathering the materials</div>
				<img class="pb-2 img-fluid" src="{{ asset('img/quests/Cabbage_patch.png') }}">
				<span class="d-block">Before heading to the Black Knights' Fortress, you'll need a cabbage, Medium Bronze Helmet, and an Iron Chain Mail Body.</span>

				<span class="pt-3 d-block">Cabbage may be picked from fields near Falador, Lumbridge, or near the Monastery. Do not pick up cabbage from Draynor Manor as this cabbage will not work in the quest. You can buy a Medium Bronze Helmet from Peksa in Barbarian Village and an Iron Chain Mail Body from Horvik the Armourer in Varrock or Wayne in Falador.</span>

				<span class="pt-3 d-block">Once you have these three items, head to the Black Knights' Fortress, located on the north side of Ice Mountain and west of the Monastery.</span>
			</div>

			<div class="table-transparent mt-2 pl-5 pt-3 pb-3 pr-5">
				<div class="h4 text-info">Infiltrating the fortress</div>
				<span class="d-block">Equip your Medium Bronze Helmet and Iron Chain Mail Body and walk right in through the eastern door of the fortress. The guards won't let you in the eastern door if these items are not equipped.</span>

				<span class="pt-3 d-block">Once inside, go through the odd looking wall to the north and climb up the ladder.</span>

				<img class="pt-2 pb-2 img-fluid" src="{{ asset('img/quests/Black_Knight_Odd_looking_wall.png') }}">

				<span class="pt-3 d-block">In this room, you'll notice a grill to your west. Right-click it and select "listen" to eavesdrop on a conversation between a goblin named Greldo, a Witch, and a Black Knight. You'll hear them talking about an invincibility potion that they are making, and the missing the last ingredient, a cabbage from Draynor Manor. You learn that any other cabbage will destroy the potion, which is your goal.</span>

				<img class="pt-2 pb-2 img-fluid" src="{{ asset('img/quests/Black_Knights_Fortress_1.png') }}">
			</div>

			<div class="table-transparent mt-2 pl-5 pt-3 pb-3 pr-5">
				<h4 class="text-info">Sabotage</h4>
				<span class="d-block">Climb back down the ladder, pass through the odd looking wall, and enter the room west of you with the three Black Knights. Unless you successfully go through the door by rapidly clicking the door which leads to the stairs, you will need to fight the three Black Knights to get through the room so bring a good weapon and armour. Sometimes it is only necessary to kill one knight. Potions and attacking with both Magic and Melee simultaneously is highly recommended if your character has a low Combat level. You can also get all three knights down to very little Hits and then try to open door.</span>

				<img class="pt-2 pb-2 img-fluid" src="{{ asset('img/quests/Black_Knight_hole.png') }}">

				<span class="pt-3 d-block">If you cannot rapidly click through the door you may have to kill all three of the knights in the room before the first one respawns in order to get through the door.</span>

				<span class="pt-3 d-block">After making it through the door and going up the stairs, climb the ladder to the top floor. Go through the odd looking wall to the north, right click and use your cabbage on the hole. Be very careful not to eat the cabbage. You will hear the Witch "groan in dismay", revealing that the potion has been destroyed.</span>

				<span class="pt-3 d-block">When you go to leave the fortress the Black knights will no longer be aggressive toward you.</span>

				<span class="pt-3 d-block">Return to Falador and talk to Sir Amik Varze to receive your reward, completing the quest.</span>

				<img class="pt-2 pb-2 img-fluid" src="{{ asset('img/quests/Black_Knight_Quest_Complete.png') }}">
			</div>

			<div class="table-transparent mt-2 pl-5 pt-3 pb-3 pr-5">
				<div class="h4 text-info">Rewards</div>
				<ul>
					<li style="list-style: unset;">
						<span class="text-success font-weight-bold">
						3 Quest Points
						</span>
					</li>
					<li style="list-style: unset;">
						<div class="row">
							<div class="pt-1 pb-2">
								<img src="{{ asset('img/items/10.png') }}" alt="coins"/>
							</div>
							<span class="text-success font-weight-bold" style="padding-top: 12px;">2500 coins</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
@endsection
