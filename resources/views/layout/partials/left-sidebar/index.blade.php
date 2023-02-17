@if (config('temauema.layouts.default.hasSideBar'))
    <div class="deznav">
        <div class="deznav-scroll">
            @include('layout.partials.left-sidebar.side-header')
            @include('layout.partials.left-sidebar.side-body')
        </div>
    </div>
@endif
