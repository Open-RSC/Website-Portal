<nav>
	<label for="drop" class="toggle">
		<svg class="svg-inline--fa fa-bars fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="bars" role="img"
			 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
			<path fill="currentColor"
				  d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path>
		</svg>
		Navigation
	</label>

	<!-- Left side of Navbar -->
	<input type="checkbox" id="drop"/>
	<ul class="menu">
		<li><a href="{{ route('home') }}">Home</a></li>
		<li>
			<label for="drop-1" class="toggle">Download ▾</label>
			<a href="#">Download</a>
			<input type="checkbox" id="drop-1"/>
			<ul>
				<li><a href="{{ asset('downloads/OpenRSC%20Launcher.exe') }}">Windows</a></li>
				<li><a href="{{ asset('downloads/OpenRSC.jar') }}">Mac / Linux</a></li>
				<li><a href="{{ asset('downloads/openrsc.apk') }}">Android App</a></li>
				<li>
					<a href="https://gitlab.openrsc.com/open-rsc/Single-Player/-/releases">Single
						Player</a></li>
				<li><a href="https://gitlab.openrsc.com/open-rsc/Game" target="_blank">Source Code</a></li>
			</ul>

		</li>
		<li>
			<label for="drop-2" class="toggle">Community ▾</label>
			<a href="#">Community</a>
			<input type="checkbox" id="drop-2"/>
			<ul>
				<li><a href="https://discord.gg/ABdFCqn" target="_blank">
						<svg class="svg-inline--fa fa-discord fa-w-14 text-info mr-md-2" aria-hidden="true"
							 data-prefix="fab" data-icon="discord" role="img" xmlns="http://www.w3.org/2000/svg"
							 viewBox="0 0 448 512" data-fa-i2svg="">
							<path fill="currentColor"
								  d="M297.216 243.2c0 15.616-11.52 28.416-26.112 28.416-14.336 0-26.112-12.8-26.112-28.416s11.52-28.416 26.112-28.416c14.592 0 26.112 12.8 26.112 28.416zm-119.552-28.416c-14.592 0-26.112 12.8-26.112 28.416s11.776 28.416 26.112 28.416c14.592 0 26.112-12.8 26.112-28.416.256-15.616-11.52-28.416-26.112-28.416zM448 52.736V512c-64.494-56.994-43.868-38.128-118.784-107.776l13.568 47.36H52.48C23.552 451.584 0 428.032 0 398.848V52.736C0 23.552 23.552 0 52.48 0h343.04C424.448 0 448 23.552 448 52.736zm-72.96 242.688c0-82.432-36.864-149.248-36.864-149.248-36.864-27.648-71.936-26.88-71.936-26.88l-3.584 4.096c43.52 13.312 63.744 32.512 63.744 32.512-60.811-33.329-132.244-33.335-191.232-7.424-9.472 4.352-15.104 7.424-15.104 7.424s21.248-20.224 67.328-33.536l-2.56-3.072s-35.072-.768-71.936 26.88c0 0-36.864 66.816-36.864 149.248 0 0 21.504 37.12 78.08 38.912 0 0 9.472-11.52 17.152-21.248-32.512-9.728-44.8-30.208-44.8-30.208 3.766 2.636 9.976 6.053 10.496 6.4 43.21 24.198 104.588 32.126 159.744 8.96 8.96-3.328 18.944-8.192 29.44-15.104 0 0-12.8 20.992-46.336 30.464 7.68 9.728 16.896 20.736 16.896 20.736 56.576-1.792 78.336-38.912 78.336-38.912z"></path>
						</svg>
						Discord</a></li>
				<li><a href="https://gitlab.openrsc.com/open-rsc/Game" target="_blank">
						<svg class="svg-inline--fa fa-gitlab fa-w-16 text-info mr-md-2" aria-hidden="true"
							 data-prefix="fab" data-icon="gitlab" role="img" xmlns="http://www.w3.org/2000/svg"
							 viewBox="0 0 496 512" data-fa-i2svg="">
							<path fill="currentColor"
								  d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path>
						</svg>
						GitLab</a></li>
				<li><a href="https://www.reddit.com/r/openrsc" target="_blank">
						<svg class="svg-inline--fa fa-reddit fa-w-16 text-info mr-md-2" aria-hidden="true"
							 data-prefix="fab" data-icon="reddit" role="img" xmlns="http://www.w3.org/2000/svg"
							 viewBox="0 0 512 512" data-fa-i2svg="">
							<path fill="currentColor"
								  d="M201.5 305.5c-13.8 0-24.9-11.1-24.9-24.6 0-13.8 11.1-24.9 24.9-24.9 13.6 0 24.6 11.1 24.6 24.9 0 13.6-11.1 24.6-24.6 24.6zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-132.3-41.2c-9.4 0-17.7 3.9-23.8 10-22.4-15.5-52.6-25.5-86.1-26.6l17.4-78.3 55.4 12.5c0 13.6 11.1 24.6 24.6 24.6 13.8 0 24.9-11.3 24.9-24.9s-11.1-24.9-24.9-24.9c-9.7 0-18 5.8-22.1 13.8l-61.2-13.6c-3-.8-6.1 1.4-6.9 4.4l-19.1 86.4c-33.2 1.4-63.1 11.3-85.5 26.8-6.1-6.4-14.7-10.2-24.1-10.2-34.9 0-46.3 46.9-14.4 62.8-1.1 5-1.7 10.2-1.7 15.5 0 52.6 59.2 95.2 132 95.2 73.1 0 132.3-42.6 132.3-95.2 0-5.3-.6-10.8-1.9-15.8 31.3-16 19.8-62.5-14.9-62.5zM302.8 331c-18.2 18.2-76.1 17.9-93.6 0-2.2-2.2-6.1-2.2-8.3 0-2.5 2.5-2.5 6.4 0 8.6 22.8 22.8 87.3 22.8 110.2 0 2.5-2.2 2.5-6.1 0-8.6-2.2-2.2-6.1-2.2-8.3 0zm7.7-75c-13.6 0-24.6 11.1-24.6 24.9 0 13.6 11.1 24.6 24.6 24.6 13.8 0 24.9-11.1 24.9-24.6 0-13.8-11-24.9-24.9-24.9z"></path>
						</svg>
						Reddit</a></li>
			</ul>
		</li>
		<li><a href="{{ asset('highscores') }}">Highscores</a></li>
		<li>
			<label for="drop-3" class="toggle">Information ▾</label>
			<a href="#">Information</a>
			<input type="checkbox" id="drop-3"/>
			<ul>
				<li><a href="{{ asset('faq') }}">FAQ</a></li>
				<li><a href="{{ asset('rules') }}">Rules</a></li>
				<li><a href="{{ asset('/player/shar/bank') }}">Shar's Bank</a></li>
				<li><a href="{{ asset('stats') }}">Game Statistics</a></li>
			</ul>
		</li>
		<li>
			<label for="drop-4" class="toggle">Guides ▾</label>
			<a href="#">Guides</a>
			<input type="checkbox" id="drop-4"/>
			<ul>
				<li><a href="{{ asset('quest_list') }}">Quest List</a></li>
				<li><a href="{{ asset('minigame_list') }}">Minigames</a></li>
				<li><a href="{{ asset('wilderness') }}">Wilderness Map</a></li>
				<li><a href="{{ route('items') }}">Item Database</a></li>
				<li><a href="{{ asset('npcs') }}">NPC Database</a></li>
			</ul>
		</li>
		<li>
			<label for="drop-5" class="toggle">Reports ▾</label>
			<a href="#">Reports</a>
			<input type="checkbox" id="drop-5"/>
			<ul>
				<li><a href="https://gitlab.openrsc.com/open-rsc/Game/issues" target="_blank">Bug Reports</a></li>
			</ul>
		</li>
		<li><a href="{{ asset('worldmap') }}">Live Map</a></li>
		@if(Auth::user())
			<li>
				<label for="drop-5" class="toggle">Staff ▾</label>
				<a href="#">Staff</a>
				<input type="checkbox" id="drop-5"/>
				<ul>
					<li><a href="{{ asset('chat_logs') }}">Chat Logs</a></li>
					<li><a href="{{ asset('pm_logs') }}">PM Logs</a></li>
					<li><a href="{{ asset('trade_logs') }}">Trade Logs</a></li>
					<li><a href="{{ asset('generic_logs') }}">Generic Logs</a></li>
					<li><a href="{{ asset('shop_logs') }}">Shop Logs</a></li>
					@if (Config::get('app.authentic') == false)
						<li><a href="{{ asset('auction_logs') }}">Auction Logs</a></li>
					@endif
					<li><a href="{{ asset('live_feed_logs') }}">Live Feed Logs</a></li>
					<li><a href="{{ asset('player_cache_logs') }}">Player Cache Logs</a></li>
					<li><a href="{{ asset('report_logs') }}">Report Logs</a></li>
					<li><a href="{{ asset('staff_logs') }}">Staff Logs</a></li>
				</ul>
			</li>
		@endif
	</ul>

	<!-- Right side of Navbar -->
	<ul class="menu">
		<!-- Authentication Links -->
		@guest
			<li><a href="{{ route('login') }}">{{ __('Staff Login') }}</a></li>
			@if (Route::has('staff_register'))
				<li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
			@endif
		@else
			<li>
				<label for="drop-5" class="toggle">{{ Auth::user()->name }} ▾</label>
				<a href="#">{{ Auth::user()->name }}</a>
				<input type="checkbox" id="drop-5"/>
				<ul>
					<li><a href="{{ route('logout') }}"
						   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
					</li>
				</ul>
				<form id="logout-form" action="{{ route('logout') }}" method="POST"
					  style="display: none;">
					@csrf
				</form>
			</li>
		@endguest
	</ul>
</nav>
