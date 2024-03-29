<ul class="metismenu" id="menu">

    @foreach (config('temauema.menu') as $menu)
        @isset($menu['header'])
            <li class="nav-label @if($loop->first) first @endif">{{ $menu['header'] }}</li>
        @endisset
        @isset($menu['title'])
            <li>
                <a href="{{  route($menu['route'])  }}" class="@isset($menu['submenu']) has-arrow @endisset ai-icon" aria-expanded="false"><i class="{{ $menu['icon'] }}"></i>
                    <span class="nav-text">{{ $menu['title'] }}</span>
                </a>
                @isset($menu['submenu'])
                    <ul aria-expanded="false">
                        @foreach ($menu['submenu'] as $submenu)
                            <li><a href="{{ route($submenu['route']) }}"><i class="{{ $submenu['icon'] }}"></i>{{ $submenu['title'] }}</a></li>
                        @endforeach
                    </ul>
                @endisset
            </li>
        @endisset
    @endforeach
</ul>
