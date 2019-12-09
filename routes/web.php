<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'as' => 'admin.'], function() {
    Route::get('login', ['as' => 'login', 'uses' => 'HomeController@getLogin']);
    Route::group(['before' => 'csrf'], function() {
        Route::post('login', ['as' => 'login', 'uses' => "HomeController@postLogin"]);
    });
    Route::group(['middleware' => 'admin'], function() {
        Route::get('', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::post('get-district-by-province', ['as' => 'get-district-by-province', 'uses' => 'HomeController@getDistrictByProvince']);
        Route::get('404', ['as' => '404', 'uses' => 'HomeController@get404']);
        Route::get('logout', ['as' => 'logout', 'uses' => "HomeController@getLogout"]);
        Route::get('change-password', ['as' => 'change-password', 'uses' => 'HomeController@changePassword']);
        Route::post('change-password', ['as' => 'change-password', 'uses' => 'HomeController@postChangePassword']);
        Route::get('account', ['as' => 'account', 'uses' => 'HomeController@account']);
        Route::post('account', ['as' => 'account', 'uses' => 'HomeController@postAccount']);
        Route::get('users/delete/{id}', ['as' => 'users.delete', 'uses' => 'UsersController@delete']);
        Route::get('users/update_password/{id}', ['as' => 'users.update_password', 'role' => 'admin.users.update', 'uses' => 'UsersController@changePassword']);
        Route::put('users/post_update_password/{id}', ['as' => 'users.update_password_put', 'role' => 'admin.users.update', 'uses' => 'UsersController@postChangePassword']);
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController');
        Route::get('sliders/update-position/{id}/{value}', ['role' => 'backend', 'as' => 'sliders.update-position', 'uses' => 'SlidersController@updatePosition']);
        Route::get('sliders/delete/{id}', array('as' => 'sliders.delete', 'uses' => 'SlidersController@delete'));
        Route::resource('sliders', 'SlidersController');

        Route::get('setting-caches/redis', ['role' => 'backend', 'as' => 'caches.redis',  'uses' => function() {
                    \Cache::flush();
                    \Session::flash('message', "Đã xoá hết cache.");
                    \Session::flash('alert-class', 'success');
                    return back();
                }]);

        Route::get('service-categories/delete/{id}', array('as' => 'service-categories.delete', 'uses' => 'ServiceCategoryController@delete'));
        Route::resource('service-categories', 'ServiceCategoryController');

        Route::get('services/delete/{id}', array('as' => 'services.delete', 'uses' => 'ServiceController@delete'));
        Route::get('services/update-position/{id}/{value}', ['role' => 'backend', 'as' => 'services.update-position', 'uses' => 'ServiceController@updatePosition']);
        Route::get('services/approve/{id}', array('as' => 'services.approve', 'uses' => 'ServiceController@approve'));
        Route::post('services/ajaxUpdateBulk', array('as' => 'services.updateBulk', 'role' => 'admin.services.update', 'uses' => 'ServiceController@updateBulk'));
        Route::resource('services', 'ServiceController');

        Route::get('steps/delete/{id}', array('as' => 'steps.delete', 'uses' => 'StepController@delete'));
        Route::get('steps/update-position/{id}/{value}', ['role' => 'backend', 'as' => 'steps.update-position', 'uses' => 'StepController@updatePosition']);
        Route::get('steps/approve/{id}', array('as' => 'steps.approve', 'uses' => 'StepController@approve'));
        Route::post('steps/ajaxUpdateBulk', array('as' => 'steps.updateBulk', 'role' => 'admin.steps.update', 'uses' => 'StepController@updateBulk'));
        Route::resource('steps', 'StepController');

        Route::get('news/approve/{id}', array('as' => 'news.approve', 'uses' => 'NewsController@approve'));
        Route::put('news/publish/{id}', array('as' => 'news.publish', 'uses' => 'NewsController@publish'));
        Route::resource('news', 'NewsController');

        Route::get('news-categories/delete/{id}', array('as' => 'news-categories.delete', 'uses' => 'NewsCategoriesController@delete'));
        Route::resource('news-categories', 'NewsCategoriesController');

        Route::get('news/delete/{id}', array('as' => 'news.delete', 'uses' => 'NewsController@delete'));
        Route::post('news/ajaxUpdateBulk', array('as' => 'news.updateBulk', 'role' => 'admin.news.update', 'uses' => 'NewsController@updateBulk'));
        Route::resource('news', 'NewsController');


        Route::get('static-pages/delete/{id}', array('as' => 'static-pages.delete', 'uses' => 'StaticPagesController@delete'));
        Route::resource('static-pages', 'StaticPagesController');
        Route::resource('static-pages', 'StaticPagesController');

        Route::get('elfinder', '\Barryvdh\Elfinder\ElfinderController@showIndex');
        Route::any('elfinder/connector', '\Barryvdh\Elfinder\ElfinderController@showConnector');
        Route::get('elfinder/ckeditor4', '\Barryvdh\Elfinder\ElfinderController@showCKeditor4');
        Route::get('elfinder/tinymce', '\Barryvdh\Elfinder\ElfinderController@showTinyMCE4');

        Route::get('locations', ['role' => 'backend', 'as' => 'locations.index', 'uses' => 'LocationsController@index']);
        Route::post('locations/update', ['role' => 'backend', 'as' => 'locations.update', 'uses' => 'LocationsController@update']);
        Route::get('locations/{id}', ['role' => 'backend', 'as' => 'locations.show', 'uses' => 'LocationsController@show']);
        Route::post('locations/store', ['role' => 'backend', 'as' => 'locations.store', 'uses' => 'LocationsController@store']) ;

        Route::resource('sliders', 'SlidersController');
        Route::post('projects/ajaxUpdateBulk', array('as' => 'projects.updateBulk', 'role' => 'admin.projects.update', 'uses' => 'ProjectsController@updateBulk'));
        Route::get('projects/delete/{id}', array('as' => 'projects.delete', 'uses' => 'ProjectsController@delete'));
        Route::resource('projects', 'ProjectsController');
        Route::get('project-categories/delete/{id}', array('as' => 'project-categories.delete', 'uses' => 'ProjectCategoriesController@delete'));
        Route::resource('project-categories', 'ProjectCategoriesController');

        Route::get('teams/update-position/{id}/{value}', ['role' => 'backend', 'as' => 'teams.update-position', 'uses' => 'TeamController@updatePosition']);
        Route::get('teams/delete/{id}', array('as' => 'teams.delete', 'uses' => 'TeamController@delete'));
        Route::resource('teams', 'TeamController');
    });
});

Route::get('/', ['as' => 'home', 'uses' => 'Frontend\HomeController@index']);
Route::get('change-language/{language}', 'Frontend\HomeController@changeLanguage')->name('change-language');
Route::get('tin-tuc', 'Frontend\HomeController@indexNews')->name('news');
Route::get('tin-tuc/{slug}-{id}.html', 'Frontend\HomeController@showNews')->name('news.show')->where([ 'slug' => '[a-zA-Z0-9\-]+', 'id' => '[0-9]+' ]);
Route::get('tuyen-dung', 'Frontend\HomeController@indexCareer')->name('career');
Route::get('tuyen-dung/{slug}-{id}.html', 'Frontend\HomeController@showCareer')->name('career.show')->where([ 'slug' => '[a-zA-Z0-9\-]+', 'id' => '[0-9]+' ]);
Route::get('doi-tac', 'Frontend\HomeController@indexPartner')->name('partner');
Route::get('danh-muc-du-an/{slug}-{id}.html', 'Frontend\HomeController@indexProject')->name('project')->where([ 'slug' => '[a-zA-Z0-9\-]+', 'id' => '[0-9]+' ]);
Route::get('du-an/{slug}-{id}.html', 'Frontend\HomeController@showproject')->name('project-detail')->where([ 'slug' => '[a-zA-Z0-9\-]+', 'id' => '[0-9]+' ]);
Route::get('tim-kiem.html', [ 'as' => 'home.search', 'uses' => 'Frontend\HomeController@search']);
Route::get('{slug}.html', [ 'as' => 'home.static-page', 'uses' => 'Frontend\HomeController@staticPage' ])->where(['slug' => '[a-zA-Z0-9\-]+']);
Route::get('danh-muc-dich-vu/{slug}-{id}.html', [ 'as' => 'home.services-category', 'uses' => 'Frontend\HomeController@getServicesCategory' ])->where([ 'slug' => '[a-zA-Z0-9\-]+', 'id' => '[0-9]+' ]);
Route::get('dich-vu/{slug}-{id}.html', [ 'as' => 'home.services-detail', 'uses' => 'Frontend\HomeController@getDetailService' ])->where(['slug' => '[a-zA-Z0-9\-]+', 'id' => '[0-9]+']);
Route::get('sidebar', [ 'as' => 'home.sidebar', 'uses' => 'Frontend\HomeController@sidebar' ]);
Route::get('page', [ 'as' => 'home.page', 'uses' => 'Frontend\HomeController@page' ]);