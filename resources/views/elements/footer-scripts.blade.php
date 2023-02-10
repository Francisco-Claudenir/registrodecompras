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
			const typography = " {{ config('temauema.StyleLayout.typography') }} "
			const version = " {{ config('temauema.StyleLayout.version') }} "
			const layout = " {{ config('temauema.StyleLayout.layout') }} "
			const primary = " {{ config('temauema.StyleLayout.primary') }} "
			const headerBg = " {{ config('temauema.StyleLayout.headerBg') }} "
			const navheaderBg = " {{ config('temauema.StyleLayout.navheaderBg') }} "
			const sidebarBg = " {{ config('temauema.StyleLayout.sidebarBg') }} "
			const sidebarStyle = " {{ config('temauema.StyleLayout.sidebarStyle') }} "
			const sidebarPosition = " {{ config('temauema.StyleLayout.sidebarPosition') }} "
			const headerPosition = " {{ config('temauema.StyleLayout.headerPosition') }} "
			const containerLayout = " {{ config('temauema.StyleLayout.containerLayout') }} "
		</script>
		<script src="{{ asset($script) }}" type="text/javascript"></script>
	@endforeach
@endif