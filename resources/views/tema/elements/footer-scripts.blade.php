@if(!empty(config('dz.public.global.js.top')))
	@foreach(config('dz.public.global.js.top') as $script)
			<script src="{{ asset($script) }}" type="text/javascript"></script>
	@endforeach
@endif
@php
	// $action = $controller.'_'.$action;
    $action = isset($action) ? $action : '';
@endphp
@if(!empty(config('dz.public.pagelevel.js.'.$action)))
	@foreach(config('dz.public.pagelevel.js.'.$action) as $script)
			<script src="{{ asset($script) }}" type="text/javascript"></script>
	@endforeach
@endif
@if(!empty(config('dz.public.global.js.bottom')))
	@foreach(config('dz.public.global.js.bottom') as $script)
		<script>
			const typography = "{{ config('temauema.layouts.default.typography') }}"
			const version = "{{ config('temauema.layouts.default.version') }}"
			const layout = "{{ config('temauema.layouts.default.layout') }}"
			const primary = "{{ config('temauema.layouts.default.primary') }}"
			const headerBg = "{{ config('temauema.layouts.default.headerBg') }}"
			const navheaderBg = "{{ config('temauema.layouts.default.navheaderBg') }}"
			const sidebarBg = "{{ config('temauema.layouts.default.sidebarBg') }}"
			const sidebarStyle = "{{ config('temauema.layouts.default.sidebarStyle') }}"
			const sidebarPosition = "{{ config('temauema.layouts.default.sidebarPosition') }}"
			const headerPosition = "{{ config('temauema.layouts.default.headerPosition') }}"
			const containerLayout = "{{ config('temauema.layouts.default.containerLayout') }}"
		</script>
		<script src="{{ asset($script) }}" type="text/javascript"></script>
	@endforeach
@endif