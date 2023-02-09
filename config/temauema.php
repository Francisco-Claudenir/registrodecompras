<?php

return [

    'menu' => [

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
    ]
];
