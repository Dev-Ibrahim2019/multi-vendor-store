<?php

return [
    [
        'title' => 'Dashboard',
        'icon' => 'fa fa-home',
        'main-title' => 'Home',
        // 'list' => ['Index'],
        'route' => ['dashboard.dashboard'],
    ],
    [
        'title' => 'Human Resources',
        'icon' => 'fa fa-user',
        'main-title' => 'Users',
        'list' => ['Index', 'Create'],
        'route' => ['dashboard.categories.index', 'dashboard.categories.create']
    ],
    [
        'title' => 'Content Management',
        'icon' => 'fa fa-th-list',
        'main-title' => 'Categories',
        'list' => ['Index', 'Create'],
        'route' => ['dashboard.categories.index', 'dashboard.categories.create']
    ],
    [
        'icon' => 'fa fa-shopping-bag',
        'main-title' => 'Products',
        'list' => ['Index', 'Create'],
        'route' => ['dashboard.products.index', 'dashboard.products.create']
    ],
];


