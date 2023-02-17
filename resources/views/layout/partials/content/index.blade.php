@if (config('temauema.layouts.default.hasSideBar'))
    <div class="content-body">
        @yield('content')
    </div>
@else
        <div class="content-body " style="margin-left: 0 !important">
                @yield('content')
        </div>
    {{-- <div class="content-body ">
    
    @yield('content')
    
</div> --}}
@endif
