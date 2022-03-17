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
                'name' => 'Profile Information',
                'permission' => 'update profile',
                'route' => 'profile',
            ],
            [
                'name' => 'Update Password',
                'permission' => 'update password',
                'route' => 'profile.password',
            ],
            [
                'name' => 'Two Factor Authentication',
                'permission' => 'base',
                'route' => 'profile.f2A',
            ],
            [
                'name' => 'Delete Account',
                'permission' => 'delete account',
                'route' => 'profile.delete.account',
            ],
        ]
    ]
];
