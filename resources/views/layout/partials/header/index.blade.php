<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    @if (config($layout . '.topnavSearchbar'))
                        <div class="input-group search-area right d-lg-inline-flex d-none">
                            <input type="text" class="form-control" placeholder="Find something here...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a href="javascript:void(0)">
                                        <i class="flaticon-381-search-2"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
                <ul class="navbar-nav header-right main-notification">
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell dz-theme-mode" href="#">
                            <i id="icon-light" class="fas fa-sun"></i>
                            <i id="icon-dark" class="fas fa-moon"></i>
                        </a>
                    </li>

                    @auth
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="flaticon-028-user-1 text-white " style="font-size: 20px"></i>
                                <div class="header-info">
                                    <span>{{ explode(' ', Auth::user()->nome)[0] }}</span>
                                    @isset(Auth::user()->perfil)
                                        <small>{{ Auth::user()->perfil->nome }}</small>
                                    @endisset

                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- <a href="{!! url('/app-profile') !!}" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                        width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ms-2">Profile </span>
                                </a> --}}
                                @if (isset(Auth::user()->perfil) ||
                                        auth()->user()->can('check-role', 'Administrador|Coordenação de Pesquisa|Coordenação de Pós Graduação|Gabinete'))
                                

                                <a href="{{route('admin.home')}}" class="dropdown-item ai-icon">
                                    <i class="flaticon-073-settings text-dark" aria-hidden="true"></i>
                                    <span class="ms-2">Admin </span>
                                </a>
                                @endif
                                <a href="{{ route('logout') }}" class="dropdown-item ai-icon"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                        width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ms-2">Logout </span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" role="button">
                                <span class="text-white">Login</span>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
        @if (config($layout . '.hasSubHeader'))
            <div class="sub-header">
                <div class="d-flex align-items-center flex-wrap me-auto">
                    <h5 class="dashboard_bar">
                        {{ config('temauema.system.name.name') }}
                        @yield('title', $page_title ?? '')
                    </h5>
                </div>
            </div>
        @endif
    </div>
</div>
