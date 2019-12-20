<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
| Define the routes for your Frontend pages here
|
*/

Route::get('/', [
    'as' => 'home', 'uses' => 'FrontendController@home'
]);
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Route group for Backend prefixed with "admin".
| To Enable Authentication just remove the comment from Admin Middleware
|
*/

Route::group([
    'prefix' => 'admin',
     'middleware' => 'admin'
], function () {
    //Sliders
   
    Route::resource('sliders','SliderController',[
        "names"=>[
            "destroy"=>"sliders.delete"
        ]
       
    ]);
    Route::resource('portfolio_categories','PortfolioCategoryController',[
        "names"=>[
            "destroy"=>"portfolio_categories.delete"
        ],
        
    ]);
    Route::resource('portfolio_images','PortfolioImageController',[
        "names"=>[
            "destroy"=>"images.delete",
        ],
        'only'=>[
            'index',
            'create',
            'destroy',
            'store'
        ]
        
    ]);
    Route::resource('portfolio_categories.portfolio_images','PortfolioImageController',[
        "names"=>[
            "edit"=>"portfolio_images.edit",
            "update"=>"portfolio_images.update",
       
        ],
        "except"=>[
            'index'
        ]
    ]);
    //Events
    Route::resource('events','EventController',[
        "names"=>[
            "destroy"=>"events.delete"
        ],
    ]);
    Route::resource('videos','VideoController',[
        "names"=>[

            "destroy"=>"videos.delete"
        ],
    ]);
    Route::resource('teams','TeamController',[
        "names"=>[
            "destroy"=>"teams.delete"
        ],
    ]);
    Route::post('/admin/teams/add_socialites/{team}','TeamController@addSocialites')->name('team.addSocialite');
    Route::resource('comments','CommentController',[
        "names"=>[
            "destroy"=>"comments.delete"
        ],
    ]);
    Route::resource('partners','PartnerController',[
        "names"=>[
            "destroy"=>"partners.delete"
        ],
    ]);
     Route::resource('messages','MessageController',[
        "names"=>[
            "destroy"=>"messages.delete"
        ],
    ]);
    //Newsletter
    Route::resource('newletters','NewsletterController');

  // Message responses
   Route::post('/responses/{message}','ResponseController@sendResponse')->name('response.send');



    // Dashboard
    //----------------------------------

    Route::get('/', [
        'as' => 'admin.dashboard', 'uses' => 'DashboardController@index'
    ]);

    Route::get('/dashboard', [
        'as' => 'admin.dashboard.basic', 'uses' => 'DashboardController@basic'
    ]);
    //GALLERY
     Route::group(['prefix' => 'gallery'], function () {

        Route::get('masonry-grid', [
            'as' => 'admin.gallery.masonry-grid', 'uses' => 'Demo\PagesController@galleryMasonryGrid'
        ]);
    });
    Route::resource('users','UsersController');
    Route::get('admin/users/give_permission/{user}','UsersController@givePermissions')->name('users.give_permissions');
    Route::get('admin/users/disable_permission/{user}','UsersController@disablePermissions')->name('users.disable_permissions');

});

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
| Guest routes cannot be accessed if the user is already logged in.
| He will be redirected to '/" if he's logged in.
|
*/

Route::group(['middleware' => ['guest']], function () {

    Route::get('login', [
        'as' => 'login', 'uses' => 'AuthController@login'
    ]);

    Route::get('register', [
        'as' => 'register', 'uses' => 'AuthController@register'
    ]);

    Route::post('login', [
        'as' => 'login.post', 'uses' => 'AuthController@postLogin'
    ]);
    Route::post('register', [
        'as' => 'register.post', 'uses' => 'AuthController@postRegister'
    ]);


    Route::get('forgot-password', [
        'as' => 'forgot-password.index', 'uses' => 'ForgotPasswordController@getEmail'
    ]);

    Route::post('/forgot-password', [
        'as' => 'send-reset-link', 'uses' => 'ForgotPasswordController@postEmail'
    ]);

    Route::get('/password/reset/{token}', [
        'as' => 'password.reset', 'uses' => 'ForgotPasswordController@GetReset'
    ]);

    Route::post('/password/reset', [
        'as' => 'reset.password.post', 'uses' => 'ForgotPasswordController@postReset'
    ]);

    Route::get('auth/{provider}', 'AuthController@redirectToProvider');

    Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');
});
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('logout', [
    'as' => 'logout', 'uses' => 'AuthController@logout'
]);

Route::get('install', [
    'as' => 'logout', 'uses' => 'AuthController@logout'
]);






