
var dezSettingsOptions = {};

function getUrlParams(dParam) 
	{
		var dPageURL = window.location.search.substring(1),
			dURLVariables = dPageURL.split('&'),
			dParameterName,
			i;

		for (i = 0; i < dURLVariables.length; i++) {
			dParameterName = dURLVariables[i].split('=');

			if (dParameterName[0] === dParam) {
				return dParameterName[1] === undefined ? true : decodeURIComponent(dParameterName[1]);
			}
		}
	}

(function($) {
	
	"use strict"
	
	var direction =  getUrlParams('dir');
	dezSettingsOptions = {
			typography: typography,
			version: version,
			layout: layout,
			primary: primary,
			headerBg: headerBg,
			navheaderBg: navheaderBg,
			sidebarBg: sidebarBg,
			sidebarStyle: sidebarStyle,
			sidebarPosition: sidebarPosition,
			headerPosition: headerPosition,
			containerLayout: containerLayout,
			direction: direction
		};
	
	if(direction == 'rtl')
	{
        direction = 'rtl'; 
    }else{
        direction = 'ltr'; 
    }
	
	new dezSettings(dezSettingsOptions); 

	jQuery(window).on('resize',function(){
        /*Check container layout on resize */
        dezSettingsOptions.containerLayout = $('#container_layout').val();
        /*Check container layout on resize END */
        
		new dezSettings(dezSettingsOptions); 
	});
	
})(jQuery);