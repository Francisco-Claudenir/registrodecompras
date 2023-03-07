@if (config($layout . '.hasSideBar'))
    <div class="content-body">
        @yield('content')
    </div>
@else
    <div class="content-body " style="margin-left: 0 !important">
        @yield('content')
    </div>
@endif
{{-- <div class="content-body ">

    @yield('content')

</div> --}}
