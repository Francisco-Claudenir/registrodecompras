<?php

return [

    'menu' => [

        ['header' => 'Main Menu'],
        [
            'title' => 'Home',
            'icon' => 'flaticon-381-user',
            'route' => 'teste'
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
                    'icon' => 'flaticon-381-key',
                    'route' => 'teste'

                ]
            ]
        ]
    ],

    'StyleLayout' => [ 
        'typography' => 'poppins',              //More Options => ["poppins" , "roboto" , "Open Sans" , "Helventivca" ]
		'version' => 'light',                   //More Options => ["light" , "dark"]
		'layout' => 'vertical',                 //More Options => ["horizontal" , "vertical"]
		'primary' => 'color_2',                 //More Options => ["color_1," , "color_2," ..... "color_15"]
		'headerBg' => 'color_14',               //More Options => ["color_1," , "color_2," ..... "color_15"]
		'navheaderBg' => 'color_14',            //More Options => ["color_1," , "color_2," ..... "color_15"]
		'sidebarBg' => 'color_13',              //More Options => ["color_1," , "color_2," ..... "color_15"]
		'sidebarStyle' => 'full',               //More Options => ["color_1," , "color_2," ..... "color_15"]
		'sidebarPosition' => 'fixed',           //More Options => ["full" , "mini" , "compact" , "modern" , "overlay" , "icon-hover"]
		'headerPosition' => 'fixed',            //More Options => ["static" , "fixed"]
		'containerLayout' => 'full',            //More Options => ["full" , "wide" , "wide-box"]
    ]
];
