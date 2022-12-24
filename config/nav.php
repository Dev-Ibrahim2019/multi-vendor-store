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
        'icon' => 'fa fa-user-circle',
        'main-title' => 'Admins',
        'list' => ['Index', 'Create'],
        'route' => ['dashboard.admins.index', 'dashboard.admins.create']
    ],
    [
        'icon' => 'fa fa-user',
        'main-title' => 'Users',
        'list' => ['Index', 'Create'],
        'route' => ['dashboard.users.index', 'dashboard.users.create']
    ],
    [
        'icon' => 'ti-shield',
        'main-title' => 'Roles',
        'list' => ['Index', 'Create'],
        'route' => ['dashboard.roles.index', 'dashboard.roles.create']
    ],
    [
        'title' => 'Content Management',
        'icon' => 'fa fa-th-list',
        'main-title' => 'Categories',
        'list' => ['Index', 'Create'],
        'route' => ['dashboard.categories.index', 'dashboard.categories.create'],
        'ability' => 'category.view',
        // 'sub-ability' => ['category.view', 'category.create']
    ],
    [
        'icon' => 'ti-dropbox-alt   ',
        'main-title' => 'Products',
        'list' => ['Index', 'Create'],
        'route' => ['dashboard.products.index', 'dashboard.products.create'],
        'ability' => 'product.view',
        // 'sub-ability' => ['product.view', 'product.create']
    ],
    [
        'icon' => 'fa fa-cart-arrow-down',
        'main-title' => 'Orders',
        'list' => ['Index', 'Create'],
        'route' => ['dashboard.products.index', 'dashboard.products.create'],
        'ability' => 'order.view',
        // 'sub-ability' => ['order.view', 'order.create']
    ],
];


