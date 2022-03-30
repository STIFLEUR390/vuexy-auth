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
    ],
    "Role & Permission" => [
        'permission' => 'create permission|edit permission|show permssion|delete permission',
        'header' => true,
        'online' => false
    ],
    'Permissions' => [
        'permission' => 'create permission|edit permission|show permssion|delete permission',
        'icon' => 'shield',
        'type' => 'feather',
        'children' => [
            [
                'name'=> 'All permissions',
                'permission' => 'show permssion|delete permission',
                'route' => 'permissions.index'
            ],
            [
                'name'=> 'Create permission',
                'permission' => 'create permission',
                'route' => 'permissions.create'
            ],
        ]
    ],
    'Roles' => [
        'permission' => 'create role|edit role|show role|delete role',
        'icon' => 'shield',
        'type' => 'feather',
        'children' => [
            [
                'name'=> 'All roles',
                'permission' => 'show role|delete role',
                'route' => 'roles.index'
            ],
            [
                'name'=> 'Create role',
                'permission' => 'create role',
                'route' => 'roles.create'
            ],
        ]
    ],
];
