<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/tabler.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-flags.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-vendors.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
  </head>
  <body >
    <div class="page">
      <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('admin.index') }}">
              <img src="{{ asset('images/logo.png')  }}" width="110" height="32" alt="Tabler" class="navbar-brand-image lazyload">
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
              <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
              </a>
              <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
              </a>
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url({{ Auth::user()->avatar_url ?? asset('images/logo.png') }}); background-size: contain"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>{{ Auth::user()->full_name }}</div>
                  <div class="mt-1 small text-muted">{{ Auth::user()->hasRole('admin') ? 'Full Admin' : 'Admin' }}</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                {{-- <a href="{{ route('staf.profile.show') }}" class="dropdown-item">Account</a> --}}
                <div class="dropdown-item" aria-labelledby="navbarDropdown">
                    <a class="text-decoration-none w-100 text-left align-items-left p-0 border-0 text-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item @">
                  <a class="nav-link" href="{{ route('admin.index') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <i class="bx bx-home bx-xs"></i>
                    </span>
                    <span class="nav-link-title">
                      Dashboard
                    </span>
                  </a>
                </li>
                <li class="nav-item @">
                  <a class="nav-link" href="{{ route('admin.book-category.index') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <i class='bx bx-bookmark' ></i>
                    </span>
                    <span class="nav-link-title">
                      Book category
                    </span>
                  </a>
                </li>

                <li class="nav-item @">
                  <a class="nav-link" href="{{ route('admin.book.index') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <i class='bx bxs-book-open' ></i>
                    </span>
                    <span class="nav-link-title">
                      Book
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="page-wrapper">
        <div class="container-xl">
        </div>
        <div class="page-body">
          <div class="container-xl">
            {{ $slot }}
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/tabler.js') }}" defer></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('script')
  </body>
</html>