<?php

return [
    'Dashboard' => [
        'permission'   => 'base',
        'route'  => 'dashboard',
        'icon'   => 'home',
        'type' => 'feather',
    ],
    'Account' => [
        'permission'   => 'update profile',
        'header' => true,
    ],
    'Account Settings' => [
        'permission'   => 'update profile',
        'icon'   => 'user',
        'type' => 'feather',
        'children' => [
            [
                'name' => 'Account',
                'permission' => 'update profile',
                'route' => 'profile',
            ],
        ]
    ]
];
