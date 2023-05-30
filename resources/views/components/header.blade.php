<div id="header-wrap">
	<header id="header">
		<div class="container">
			<div class="row">

				<div class="col-md-2">
					<div class="main-logo">
						<a href="/"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
					</div>

				</div>

				<div class="col-md-10">
					
					<nav id="navbar">
						<div class="main-menu stellarnav">
							<ul class="menu-list">
								<li class="menu-item"><a href="{{ route('book') }}" data-effect="Home">Books</a></li>
								{{-- <li class="menu-item"><a href="#popular-books" class="nav-link" data-effect="Shop">Shop</a></li>
								<li class="menu-item"><a href="#latest-blog" class="nav-link" data-effect="Articles">Articles</a></li> --}}
								@auth
									@if (Auth::user()->hasRole('admin'))
										<li class="menu-item"><a href="{{ route('admin.index') }}" class="nav-link" data-effect="Contact">Login</a></li>
									@else
										<li class="menu-item"><a href="{{ route('user.index') }}" class="nav-link" data-effect="Contact">Login</a></li>
									@endif
								@else
								<li class="menu-item"><a href="{{ route('login') }}" class="nav-link" data-effect="Contact">Login</a></li>
								@endauth
							</ul>

							<div class="hamburger">
				                <span class="bar"></span>
				                <span class="bar"></span>
				                <span class="bar"></span>
				            </div>

						</div>
					</nav>

				</div>

			</div>
		</div>
	</header>
		
</div><!--header-wrap-->
