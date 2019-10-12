<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Navigation Menu
    |--------------------------------------------------------------------------
    |
    | This array is for Navigation menus of the backend.  Just add/edit or
    | remove the elements from this array which will automatically change the
    | navigation.
    |
    */

    // SIDEBAR LAYOUT - MENU

    'sidebar' => [
        [   
            'title' => 'Dashboard',
            'link' => 'admin/dashboard/',
            'active' => 'admin/dashboard*',
            'icon' => 'icon-fa icon-fa-dashboard',
            'roles'=>['admin',"Team's member","Commentator","Partner"],
        ],
        [
            'title' => 'Sliders',
            'link' => '#',
            'active' => '/admin/sliders*',
            'icon' =>"fa fa-sliders",
            'roles'=>['admin'],

            'children'=>[
                [
                    'title' => 'New Slider',
                    'link' => '/admin/sliders/create',
                    'active' => '/admin/sliders*',
                ],
                [
                    'title' => 'Sliders list',
                    'link' => '/admin/sliders',
                    'active' => '/admin/sliders*',
                ],
            ]
        ],
        [
            
            'title' => 'Portfolio',
            'link' => '#',
            'active' => '/admin/portfolio*',
            'icon' =>"fa fa-picture-o",
            'roles'=>['admin'],
            'children'=>[
                [
                    'title' => 'Categories',
                    'link'=>'#',
                    'active' => 'admin/portfolio_categories*',
                    'children'=>[
                        [
                            'title' => 'Create new category',
                            'link'=>'admin/portfolio_categories/create',
                            'active' => 'admin/portfolio_categories*'
                        ],
                        [
                            'title' => 'Categories list',
                            'link'=>'admin/portfolio_categories',
                            'active' => 'admin/portfolio_categories*',
                        ],
                    ]
                ],
                [
                    'title' => 'Images',
                    'link'=>'#',
                    'active' => 'admin/portfolio_images*',
                    'children'=>[
                        [
                            'title' => 'Create new image',
                            'link'=>'admin/portfolio_images/create',
                            'active' => 'admin/portfolio_images*'
                        ],
                        [
                            'title' => 'Images list',
                            'link'=>'admin/portfolio_images',
                            'active' => 'admin/portfolio_images*',
                        ],
                    ]
                ],
                
            ]
        ],
        [
            'title' => 'Videos',
            'link' => '/admin/videos',
            'active' => '/admin/videos*',
            'icon' =>"fa fa-video-camera",
            'roles'=>['admin'],

            'children'=>[
                [
                    'title' => 'New video',
                    'link' => '/admin/videos/create',
                    'active' => '/admin/videos*',
                ],
                [
                    'title' => 'Videos list',
                    'link' => '/admin/videos',
                    'active' => '/admin/videos*',
                ],
            ]
        ],
        [
            'title' => 'Events',
            'link' => '#',
            'active' => '/admin/events*',
            'icon' =>"fa fa-cc",
            'roles'=>['admin'],

            'children'=>[
                [
                    'title' => 'New event',
                    'link' => '/admin/events/create',
                    'active' => '/admin/events*',
                ],
                [
                    'title' => 'Events list',
                    'link' => '/admin/events',
                    'active' => '/admin/events*',
                ],
            ]
        ],
        [
            'title' => 'Comments',
            'link' => '/admin/comments',
            'active' => '/admin/comments*',
            'icon' =>"fa fa-comment",
            'roles'=>['admin',"Commentator"],

            'children'=>[
                [
                    'title' => 'New comment',
                    'link' => '/admin/comments/create',
                    'active' => '/admin/comments*',
                ],
                [
                    'title' => 'Comments list',
                    'link' => '/admin/comments',
                    'active' => '/admin/comments*',
                ],
            ]
        ],
        [
            'title' => 'Partners',
            'link' => '/admin/partners',
            'active' => '/admin/partners*',
            'icon' =>"fa fa-handshake-o",
            'roles'=>['admin',"Partner"],

            'children'=>[
                [
                    'title' => 'New partner',
                    'link' => '/admin/partners/create',
                    'active' => '/admin/partners*',
                ],
                [
                    'title' => 'Partners list',
                    'link' => '/admin/partners',
                    'active' => '/admin/partners*',
                ],
            ]
        ],
        [
            'title' => 'Team',
            'link' => '/admin/teams',
            'active' => '/admin/teams*',
            'icon' =>"fa fa-users",
            'roles'=>['admin',"Team's member"],

            'children'=>[
                [
                    'title' => "New team's member",
                    'link' => '/admin/teams/create',
                    'active' => '/admin/teams*',
                ],
                [
                    'title' => "Team's members list",
                    'link' => '/admin/teams',
                    'active' => '/admin/teams*',
                ],
            ]
        ],
         [
            'roles'=>['admin'],
            'title' => 'Messages',
            'link' => '/admin/messages',
            'active' => '/admin/messages*',
            'icon' =>"fa fa-envelope-o",
            
        ],
         [
            'title' => 'Gallery',
            'link' => '/admin/gallery/masonry-grid',
            'active' => 'admin/gallery*',
            'icon' => 'icon-fa icon-fa-image',
            'roles'=>['admin',"Team's member","Commentator","Partner"]
            
        ],

        [
            'roles'=>['admin',"Team's member","Commentator","Partner"],
            'title' => 'Profile',
            'link' => '/admin/users',
            'active' => '/admin/users*',
            'icon' =>"fa fa-user-circle",
            
        ],
       
       
        [   
            'title' => 'Users',
            'link' => '/admin/users',
            'active' => 'admin/users*',
            'icon' => 'icon-fa icon-fa-users',
            'roles'=>['admin'],
        ],
    ]
];
