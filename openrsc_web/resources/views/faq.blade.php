@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">
				FAQ
			</h2>

			<div class="row justify-content-center">
				<div class="col-lg-6 text-primary table-transparent pr-5 pl-5 pt-3 pb-3">
					<span class="text-info font-weight-bold d-block">What is Open RSC?</span>
					The project was officially begun in June 2018, though has roots spanning as far back as 2009 with
					Open RSCD v25. The Open RSC project has been a non-profit, community driven, open source initiative
					to build as close of a replica RSC game experience as possible, to allow custom features to be
					enabled with simple configuration file edits, and to keep the memory alive of what is now considered
					to be an abandonware game, Runescape Classic (2001-2018). For over a decade, many private servers
					have come and gone and nearly all have had profit from donations, subscriptions, microtransactions,
					and bribery as their sole interest. Education, open source, and information sharing were spurned in
					the interest of "leech proofing" code, money grabs, toxic individuals, DDoS attacks, and deception.
					The Open RSC core team consists of real life professional developers, security consultants, dev ops
					managers, and more.

					<span class="text-info font-weight-bold d-block pt-4">Can I donate or subscribe for perks?</span>
					No donations or subscriptions are accepted. We don't want any money. We also don't believe that
					dumping player money into ads will make any difference for long term player growth and retention.
					The best way to help the team is to help with submitting bug reports, fixing bugs, and spreading the
					word to your friends about us so they will want to come be a part of this too!

					<span class="text-info font-weight-bold d-block pt-4">How often is Open RSC updated?</span>
					Updates are added multiple times per week. Most are installed during the midnight automatic server
					restart interval.

					<span class="text-info font-weight-bold d-block pt-4">Is this a replica? What is the experience rate?</span>
					Open RSC is an open source game engine framework that lets you configure the features you want for
					any sort of play style want. Included in the source code are several preset server configurations
					that we are using for publicly hosted game servers that are free for anyone to play on.

					<span class="d-block pt-3"><span class="text-white-50 d-block">Open RSC</span>
						1x XP with limited QoL features (quick banking, bank notes, deposit certs to bank)</span>
					<span class="d-block pt-2"><span class="text-white-50 d-block">RSC Cabbage</span> 5x XP, 30% faster game speed, and all custom features enabled (auction house, pets, clans, custom sprites, batched skilling, no fatigue, etc)</span>
					<span class="d-block pt-3"><span class="text-white-50 d-block">RSC Preservation</span> ~98% replica of RSC</span>
					<span class="d-block pt-3"><span class="text-white-50 d-block">Open PK</span> Stork PK point system, dedicated to PKing</span>
					<span class="d-block pt-3"><span class="text-white-50 d-block">Wolf Kingdom</span> A not yet started post apocalyptic game that features a mix of DayZ, WoW, and PlanetSide play styles</span>

					<span class="text-info font-weight-bold d-block pt-4">Is a single player version available?</span>
					Yes! Visit the <a href="https://orsc.dev">GitLab</a> project page for more information.

					<span
						class="text-info font-weight-bold d-block pt-4">How do I run my own Open RSC private server?</span>
					<a href="https://orsc.dev">Follow the guide on GitLab.</a>

					<span class="text-info font-weight-bold d-block pt-4">Who are the Open RSC project admins?</span>
					Luis, Marwolf, and Kenix

					<span class="text-info font-weight-bold d-block pt-4">What is Open RSC's stance on botting?</span>
					We have a zero tolerance policy on our publicly hosted servers.

					<span class="text-info font-weight-bold d-block pt-4">How can I help?</span>
					Join the Discord chat and come talk to us! Word of mouth recommendations, YouTube videos, and Twitch
					streams are welcomed for recruiting more players. There are many GitLab issue bug reports that need
					fixes too!

					<span class="text-info font-weight-bold d-block pt-4">How do I run my own copy?</span>
					Visit the <a href="https://orsc.dev">Open RSC game repository</a> and follow the instructions. Open
					RSC is Windows, Mac, and Linux compatible! There is an Android client as well, though no way to run
					a MySQL server, the game server, and game client at the same time on Android too allow an Android
					single player instance at this time. Feel free to join our Discord if you have questions.

					<span class="text-info font-weight-bold d-block pt-4">Any future plans for development?</span>
					Achieving near-exact replication of RSC is important but there are so many new things that can be be
					added. Many projects are being worked on at the same time and if you have a novel idea and the
					ability to build it, go for it! Just understand that we have no interest in hearing pitches for the
					next million billion dollar game idea. Also, Eevee is the best Pokemon and cabbage is the best
					vegetable.
				</div>
			</div>
		</div>
	</div>
@endsection
