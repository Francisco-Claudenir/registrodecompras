<?php

// arquivo de configuração do tema do projeto
return [
	// config nome do projeto
	'systemNamePrefix' => 'UEMA',
	'systemName' => 'Dashboard',
	'systemNameSufix' => '',

	// config da brand do projeto
	'brandIcon' => 'images/uema/svg/icon_uema.svg',
	'brandIconWidth' => '40',
	'brandIconHeight' => '40',

	'favIcon' => 'images/uema/svg/icon_uema.svg',

	'homePage' => 'home',

	// config de layout do projeto
	'layouts' => [
		'default' => [
			'typography' => 'poppins',		//["poppins" , "roboto" , "Open Sans" , "Helventivca" ]
			'version' => 'light',			//["light" , "dark"]
			'layout' => 'vertical',			//["horizontal" , "vertical"]
			'primary' => 'color_14',			//["color_1," , "color_2," ..... "color_15"]
			'headerBg' => 'color_14',		//["color_1," , "color_2," ..... "color_15"]
			'navheaderBg' => 'color_14',	//["color_1," , "color_2," ..... "color_15"]
			'sidebarBg' => 'color_13',		//["color_1," , "color_2," ..... "color_15"]
			'sidebarStyle' => 'full',		//["full" , "mini" , "compact" , "modern" , "overlay" , "icon-hover"]
			'sidebarPosition' => 'fixed',	//["static" , "fixed"]
			'headerPosition' => 'fixed',	//["static" , "fixed"]
			'containerLayout' => 'full',	//["full" , "wide" , "wide-box"]
			'hasSideBar' => true,			//[true, false]
			'topnavSearchbar' => false,
			'hasSubHeader' => false			//[true, false]
		]
	],

	'menu' => [

		['header' => 'Main Menu'],
		[
			'title' => 'Home',
			'icon' => 'flaticon-381-user',
			'route' => 'home'
		],
		[
			'title' => 'Perfil',
			'icon' => 'flaticon-381-trash',
			'route' => 'teste',
			'submenu' => [
				[
					'title' => 'Alterar Senha',
					'icon' => 'flaticon-381-key',
					'route' => 'teste'

				]
			],
		],
		['header' => 'Segundo Menu'],
		[
			'title' => 'Item 1',
			'icon' => 'flaticon-381-user',
			'route' => 'teste'
		],
		['header' => 'Terceiro Menu'],
		[
			'title' => 'Item 1',
			'icon' => 'flaticon-381-user',
			'route' => 'teste'
		],
		[
			'title' => 'Item 2',
			'icon' => 'flaticon-381-user',
			'route' => 'teste',
			'submenu' => [
				[
					'title' => 'Sub Item 1',
					'icon' => 'flaticon-381-knob',
					'route' => 'teste'

				]
			]
		]
	],

	// importações base
	'css' => [
		'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
		'css/style.css',
	],

	'jsTop' => [
		'vendor/global/global.min.js',
		'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
	],

	'jsBottom' => [
		'js/custom.js',
		'js/deznav-init.js',
	],

	// importações opcionais
	'plugins' => [
		//Dashboard
		'carousel' => [
			'css' => [
				'vendor/chartist/css/chartist.min.css',
				'vendor/owl-carousel/owl.carousel.css',
			],
			'js' => [
				'vendor/chart.js/Chart.bundle.min.js',
				'vendor/peity/jquery.peity.min.js',
				'vendor/apexchart/apexchart.js',
				'vendor/owl-carousel/owl.carousel.js',
				'js/dashboard/dashboard-1.js',
			],
		],
		'portofolio' => [
			'css' => [
				'vendor/chartist/css/chartist.min.css',
			],
			'js' => [
				'vendor/chart.js/Chart.bundle.min.js',
				'vendor/apexchart/apexchart.js',
				'js/dashboard/portofolio.js',
			]
		],
		'market' => [
			'css' => [
				'vendor/chartist/css/chartist.min.css',
				'vendor/datatables/css/jquery.dataTables.min.css',
			],
			'js' => [
				'vendor/chart.js/Chart.bundle.min.js',
				'vendor/peity/jquery.peity.min.js',
				'vendor/apexchart/apexchart.js',
				'vendor/datatables/js/jquery.dataTables.min.js',
				'js/plugins-init/datatables.init.js',
				'js/dashboard/market-capital.js',
			],
		],
		//Plugins
		'toast' => [
			'css' => [
				'vendor/toastr/css/toastr.min.css'
			],
			'js' => [
				'vendor/toastr/js/toastr.min.js',
				'js/plugins-init/toastr-init.js',
			],
		],
		'sweetalert' => [
			'css' => [
				'vendor/sweetalert2/dist/sweetalert2.min.css'
			],
			'js' => [
				'vendor/sweetalert2/dist/sweetalert2.min.js',
				'js/plugins-init/sweetalert.init.js',
			]
		],
		'select2' => [
			'css' => [
				'vendor/select2/css/select2.min.css'
			],
			'js' => [
				'vendor/select2/js/select2.full.min.js',
				'js/plugins-init/select2-init.js',
			],
		],
		'nouislider' => [
			'css' => [
				'vendor/nouislider/nouislider.min.css'
			],
			'js' => [
				'vendor/nouislider/nouislider.min.js',
				'vendor/wnumb/wNumb.js',
				'js/plugins-init/nouislider-init.js',
			],
		],
		'map_jqvmap' => [
			'css' => [
				'vendor/jqvmap/css/jqvmap.min.css'
			],
			'js' => [
				'vendor/jqvmap/js/jquery.vmap.min.js',
				'vendor/jqvmap/js/jquery.vmap.world.js',
				'vendor/jqvmap/js/jquery.vmap.usa.js',
				'js/plugins-init/jqvmap-init.js',
			],
		],
		'lightgallery' => [
			'css' => [
				'vendor/lightgallery/css/lightgallery.min.css'
			],
			'js' => [
				'vendor/lightgallery/js/lightgallery-all.min.js',
			],
		],
		'nestable' => [
			'css' => [
				'vendor/nestable2/css/jquery.nestable.min.css'
			],
			'js' => [
				'vendor/nestable2/js/jquery.nestable.min.js',
				'js/plugins-init/nestable-init.js',
			],
		],

		//Forms
		'wizard' => [
			'css' => [
				'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css'
			],
			'js' => [
				'vendor/jquery-steps/build/jquery.steps.min.js',
				'vendor/jquery-validation/jquery.validate.min.js',
				'js/plugins-init/jquery.validate-init.js',
				'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
			],
		],
		'summernote' => [
			'css' => [
				'vendor/summernote/summernote.css'
			],
			'js' => [
				'vendor/ckeditor/ckeditor.js',
			],
		],
		'pickers' => [
			'css' => [
				'vendor/bootstrap-daterangepicker/daterangepicker.css',
				'vendor/clockpicker/css/bootstrap-clockpicker.min.css',
				'vendor/jquery-asColorPicker/css/asColorPicker.min.css',
				'vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
				'vendor/pickadate/themes/default.css',
				'vendor/pickadate/themes/default.date.css',
				'https://fonts.googleapis.com/icon?family=Material+Icons',
			],
			'js' => [
				'vendor/moment/moment.min.js',
				'vendor/bootstrap-daterangepicker/daterangepicker.js',
				'vendor/clockpicker/js/bootstrap-clockpicker.min.js',
				'vendor/jquery-asColor/jquery-asColor.min.js',
				'vendor/jquery-asGradient/jquery-asGradient.min.js',
				'vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js',
				'vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
				'vendor/pickadate/picker.js',
				'vendor/pickadate/picker.time.js',
				'vendor/pickadate/picker.date.js',
				'js/plugins-init/bs-daterange-picker-init.js',
				'js/plugins-init/clock-picker-init.js',
				'js/plugins-init/jquery-asColorPicker.init.js',
				'js/plugins-init/material-date-picker-init.js',
				'js/plugins-init/pickadate-init.js',
			],
		],
		'validation_jquery' => [
			'css' => [
				''
			],
			'js' => [
				'vendor/jquery-validation/jquery.validate.min.js',
				'js/plugins-init/jquery.validate-init.js',
			],
		],
		//Table
		'datatable' => [
			'css' => [
				'vendor/datatables/css/jquery.dataTables.min.css'
			],
			'js' => [
				'vendor/datatables/js/jquery.dataTables.min.js',
				'js/plugins-init/datatables.init.js',
			],
		],
	]
];
