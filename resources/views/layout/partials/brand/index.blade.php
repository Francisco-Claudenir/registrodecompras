<div class="nav-header">
    <a href="{{ route(config('temauema.homePage')) }}" class="brand-logo">
        <img src="{{ asset(config('temauema.brandIcon')) }}" class="img-fluid"
            width="{{ config('temauema.brandIconWidth') }}" height="{{ config('temauema.brandIconHeight') }}"
            alt="">


        <svg class="brand-title" viewBox="0 0 105 22" width="90" height="22" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <text class="svg-logo-path" x="0" y="15"
                fill="black">{{ config('temauema.systemName') }}</text>
            Sorry, your browser does not support inline SVG.
        </svg>
    </a>

    @if (config('temauema.StyleLayout.AdminSidebarUserWithoutSidebar') == false)
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    @endif
</div>
