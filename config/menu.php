<?php

return [
    [
        'name' => 'home',
        'route'=> 'admin.home',
        'glyphicon' => 'fa fa-home fa-fw',
        'hide' => false
    ],
    // [
    //     'label' => 'news'
    // ],
    // [
    //     'name' => 'category',
    //     'route'=> 'admin.news-categories.index',
    //     'glyphicon' => 'fa fa-shopping-cart fa-fw',
    //     'hide' => false
    // ],
    // [
    //     'name' => 'list',
    //     'route'=> 'admin.news.index',
    //     'glyphicon' => 'fa fa-bank fa-fw',
    //     'hide' => false
    // ],
    [
        'label' => 'service'
    ],
    [
        'name' => 'service',
        'route'=> 'admin.services.index',
        'glyphicon' => 'fa fa-list',
        'hide' => false
    ],
    [
        'label' => 'step'
    ],
    [
        'name' => 'step',
        'route'=> 'admin.steps.index',
        'glyphicon' => 'fa fa-server',
        'hide' => false
    ],
    [
        'label' => 'page'
    ],
    [
        'name' => 'utility.slider',
        'route'=> 'admin.sliders.index',
        'glyphicon' => 'fa fa-sliders fa-fw',
        'role'   => 'system',
        'hide' => false
    ],
    [
        'label' => 'team'
    ],
    [
        'name' => 'team',
        'route'=> 'admin.teams.index',
        'glyphicon' => 'fa fa-users',
        'hide' => false
    ],
    // [
    //     'label' => 'project'
    // ],
    // [
    //     'name' => 'category',
    //     'route'=> 'admin.project-categories.index',
    //     'glyphicon' => 'fa fa-shopping-cart fa-fw',
    //     'hide' => false
    // ],
    // [
    //     'name' => 'list',
    //     'route'=> 'admin.projects.index',
    //     'glyphicon' => 'fa fa-bank fa-fw',
    //     'hide' => false
    // ],
    // [
    //     'label' => 'partner'
    // ],
    // [
    //     'name' => 'partner',
    //     'route'=> 'admin.partners.index',
    //     'glyphicon' => 'fa fa-home fa-fw',
    //     'hide' => false
    // ],
    [
        'label' => 'system'
    ],
    [
        'name' => 'users.label',
        'glyphicon' => 'fa fa-shield',
        'hide' => false,
        'child'=> [
            [
                'name' => 'list',
                'route'=> 'admin.users.index',
                'glyphicon' => 'fa fa-users fa-fw',
                'hide' => false
            ],
            // [
            //     'name' => 'users.role',
            //     'route'=> 'admin.roles.index',
            //     'glyphicon' => 'fa fa-university fa-fw',
            //     'hide' => false
            // ],
            [
                'name' => 'static_page',
                'route'=> 'admin.static-pages.index',
                'glyphicon' => 'fa fa-leanpub fa-fw',
                'permissions'   => ['static_pages.read'],
                'hide' => false
            ],
        ]
    ],

    [
        'name' => 'settings.label',
        'glyphicon' => 'fa fa-cog fa-fw',
        'hide' => false,
        'child'=> [
            [
                'name' => 'settings.redis',
                'route'=> 'admin.caches.redis',
                'glyphicon' => 'fa fa-refresh fa-fw',
                'hide' => false
            ],
        ]
    ],
];
