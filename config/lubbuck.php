<?php

return [

	'prefix_name' => 'BASE',
	'name' => 'UEMA',
	'sufix_name' => '',

	'importations' => [
		'base' => [
			'favicon' => 'images/favicon.ico',
			'fonts' => [
				'google' => [
					'families' => [
						'Poppins:300,400,500,600,700',
					]
				]
			],
			'css' => [
				'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				'css/style.css',
			],
			'js' => [
				'top' => [
					'vendor/global/global.min.js',
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
				],
				'bottom' => [
					'js/custom.js',
					'js/deznav-init.js',
				]
			]
		],
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
	],

	'public' => [
		'pagelevel' => [
			'css' => [
				'ZenixadminController_coin_details' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/bootstrap-daterangepicker/daterangepicker.css',
				],
				'ZenixadminController_tranasactions' => [
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'ZenixadminController_my_wallets' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/swiper/css/swiper-bundle.min.css',
					'vendor/owl-carousel/owl.carousel.css',
				],
				'ZenixadminController_page_chat' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
				],
				'ZenixadminController_project_list' => [
					'vendor/chartist/css/chartist.min.css',
				],
				'ZenixadminController_contact_list' => [
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/chartist/css/chartist.min.css',
				],
				'ZenixadminController_contact_card' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
				],
				'ZenixadminController_app_calender' => [
					'vendor/fullcalendar/css/main.min.css',
				],
				'ZenixadminController_chart_chartist' => [
					'vendor/chartist/css/chartist.min.css',
				],
				'ZenixadminController_ecom_product_detail' => [
					'vendor/star-rating/star-rating-svg.css',
					'vendor/owl-carousel/owl.carousel.css',
				],
				'ZenixadminController_ecom_product_list' => [
					'vendor/star-rating/star-rating-svg.css',
				],
				'ZenixadminController_email_compose' => [
					'vendor/dropzone/dist/dropzone.css',
				],

				'ZenixadminController_widget_basic' => [
					'vendor/chartist/css/chartist.min.css',
				],
			],
			'js' => [
				'ZenixadminController_coin_details' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/coin-details.js',
					'vendor/moment/moment.min.js',
					'vendor/bootstrap-daterangepicker/daterangepicker.js',
				],
				'ZenixadminController_my_wallets' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/my-wallet.js',
					'vendor/owl-carousel/owl.carousel.js',
					'vendor/swiper/js/swiper-bundle.min.js',
				],
				'ZenixadminController_tranasactions' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'ZenixadminController_app_calender' => [
					'vendor/moment/moment.min.js',
					'vendor/fullcalendar/js/main.min.js',
					'js/plugins-init/fullcalendar-init.js',
				],
				'ZenixadminController_chart_chartist' => [
					'vendor/chartist/js/chartist.min.js',
					'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
					'js/plugins-init/chartist-init.js',
				],
				'ZenixadminController_chart_chartjs' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'js/plugins-init/chartjs-init.js',
				],
				'ZenixadminController_chart_flot' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/flot/jquery.flot.js',
					'vendor/flot/jquery.flot.pie.js',
					'vendor/flot/jquery.flot.resize.js',
					'vendor/flot-spline/jquery.flot.spline.min.js',
					'js/plugins-init/flot-init.js',
				],
				'ZenixadminController_chart_morris' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/raphael/raphael.min.js',
					'vendor/morris/morris.min.js',
					'js/plugins-init/morris-init.js',
				],
				'ZenixadminController_chart_peity' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'js/plugins-init/piety-init.js',

				],
				'ZenixadminController_chart_sparkline' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/jquery-sparkline/jquery.sparkline.min.js',
					'js/plugins-init/sparkline-init.js',
					'vendor/svganimation/vivus.min.js',
					'vendor/svganimation/svg.animation.js',
				],
				'ZenixadminController_ecom_customers' => [
					'vendor/highlightjs/highlight.pack.min.js',
				],
				'ZenixadminController_ecom_product_detail' => [
					'vendor/star-rating/jquery.star-rating-svg.js',
					'vendor/owl-carousel/owl.carousel.js',
				],
				'ZenixadminController_ecom_product_list' => [
					'vendor/star-rating/jquery.star-rating-svg.js',
				],
				'ZenixadminController_email_compose' => [
					'vendor/dropzone/dist/dropzone.js',
				],
				'ZenixadminController_page_chat' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/chat.js',
					'vendor/owl-carousel/owl.carousel.js',
				],
				'ZenixadminController_page_lock_screen' => [
					'vendor/deznav/deznav.min.js',
				],
				'ZenixadminController_widget_basic' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/chartist/js/chartist.min.js',
					'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
					'vendor/flot/jquery.flot.js',
					'vendor/flot/jquery.flot.pie.js',
					'vendor/flot/jquery.flot.resize.js',
					'vendor/flot-spline/jquery.flot.spline.min.js',
					'vendor/jquery-sparkline/jquery.sparkline.min.js',
					'js/plugins-init/sparkline-init.js',
					'vendor/peity/jquery.peity.min.js',
					'js/plugins-init/piety-init.js',
					'js/plugins-init/widgets-script-init.js',
				],
				'ZenixadminController_contact_card' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/contact.js',
					'vendor/owl-carousel/owl.carousel.js',

				],
				'ZenixadminController_contact_list' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'ZenixadminController_project_list' => [
					'vendor/chart.js/Chart.bundle.min.js',
				],
				'ZenixadminController_project_card' => [
					'vendor/chart.js/Chart.bundle.min.js',
				],
			]
		],
	]
];
