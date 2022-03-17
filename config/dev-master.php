<?php

return [
    /*
        Application description
    */
    'description' => env('DESCRIPTION', 'vuexy authentification avec laravel fortify'),

    /*
        Application keywords
    */
    'keywords' => env('KEYWORDS', 'admin template, web app, auth app'),

    /*
        Application author
    */
    'author' => env('AUTHOR', 'Dev Master'),

    /*
        Application apple touch icon
    */
    'apple_touch_icon' => env('APPLE_TOUCH_ICON', 'admin/app-assets/images/ico/apple-icon-120.png'),

    /*
        Application shortcut icon
    */
    'shortcut_icon' => env('SHORTCUT_ICON', 'admin/app-assets/images/ico/favicon.ico'),

    /*
        activate customizer for view
    */
    'customizer' => env('CUSTOMIZER', true),

    /*
        Application flag icon of country
    */
    'flag_icon' => env('FLAG_ICON', 'flag-icon-cm'),

    /*
        Disable role and permission crud in the application
    */
    'online' => env('ONLINE', true)
];
