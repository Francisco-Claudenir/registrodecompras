<ul class="metismenu" id="menu">
    @foreach (config('temauema.menu') as $menu)
        @isset($menu['header'])
            @if (
                !isset($menu['can']) ||
                    auth()->user()->can('check-role', $menu['can']))
                <li class="nav-label @if ($loop->first) first @endif">{{ $menu['header'] }}</li>
            @endif
        @endisset
        @isset($menu['title'])
            @if (
                !isset($menu['can']) ||
                    auth()->user()->can('check-role', $menu['can']))
                <li>
                    <a href="@isset($menu['route']) {{ route($menu['route']) }} @else # @endisset"
                        class="@isset($menu['submenu']) has-arrow @endisset ai-icon" aria-expanded="false"><i
                            class="{{ $menu['icon'] }}"></i>
                        <span class="nav-text">{{ $menu['title'] }}</span>
                    </a>
                    @isset($menu['submenu'])
                        <ul aria-expanded="false">
                            @foreach ($menu['submenu'] as $submenu)
                                <li>
                                    <a href="@isset($submenu['route']) {{ route($submenu['route']) }} @else # @endisset"
                                        class="@isset($submenu['submenu']) has-arrow @endisset ai-icon"
                                        aria-expanded="false">
                                        <i class="{{ $submenu['icon'] }}"></i>
                                        <span class="nav-text">{{ $submenu['title'] }}</span></a>

                                    @isset($submenu['submenu'])
                                        <ul aria-expanded="false">

                                            @foreach ($submenu['submenu'] as $sub)
                                                <li>
                                                    <a
                                                        href="@isset($sub['route']) {{ route($sub['route']) }} @else # @endisset"><i
                                                            class="{{ $sub['icon'] }}"></i>{{ $sub['title'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endisset
                                </li>
                            @endforeach
                        </ul>
                    @endisset
                </li>
            @endif
        @endisset
    @endforeach
</ul>
