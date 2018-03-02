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
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

Route::post('send_inquiry', 'HomeController@send_inquiry');
Route::get('search', 'HomeController@search');

Route::group(['middleware' => ['auth', 'activated', 'level:2', 'activity']], function () {
    Route::any('manage/languages/fetchAll', 'Manage\NpLanguagesController@fetchAll');
    Route::any('manage/languages/fetchAllActive', 'Manage\NpLanguagesController@fetchAllActive');
});

Route::group(['middleware' => ['auth', 'activated', 'level:4', 'activity']], function () {
    Route::post('manage/translations/updateAll', 'Manage\NpTranslationsController@updateAll');
    Route::any('manage/translations/fetchAll', 'Manage\NpTranslationsController@fetchAll');
    Route::any('manage/translations/deleteTrans', 'Manage\NpTranslationsController@deleteTrans');

    Route::any('manage/languages/changeDefault', 'Manage\NpLanguagesController@changeDefault');
    Route::any('manage/languages/changeStatus', 'Manage\NpLanguagesController@changeStatus');
    Route::any('manage/languages/deleteLang', 'Manage\NpLanguagesController@deleteLang');
    Route::any('manage/languages/addLang', 'Manage\NpLanguagesController@addLang');



    Route::get('api/news/{parentOrder?}', 'Manage\NpNewsController@list');
    Route::any('manage/news/store', 'Manage\NpNewsController@store');
    Route::any('manage/news/show', 'Manage\NpNewsController@show');
    Route::any('manage/news/destroy', 'Manage\NpNewsController@destroy');
    Route::any('manage/images/upload/{id}/{item}/{model}', 'ImagesController@upload');
    Route::any('manage/images/delete_image/{item}/{id}/{image_id}', 'ImagesController@delete_image');
    Route::any('manage/images/update_image', 'ImagesController@update_image');
});
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
        Route::any('/', 'NewsController@index');
        Route::any('/news/{slug}', 'NewsController@newsDetails');
        Route::any('image/{max}/{thumb_link?}', 'HomeController@image')->name('image');

        Route::any('about', 'Front\NpAboutController@index');
        Route::any('resource', 'Front\NpResourcesController@index');

        Route::get('live/images/profile/{id}/avatar/{image}', [
            'uses' => 'HomeController@userProfileAvatar',
            ]);

        Route::get('images/profile/{id}/avatar/{image}', [
            'uses' => 'ProfilesController@userProfileAvatar',
            ]);
        Auth::routes();

        Route::group(['middleware' => ['web', 'activity']], function () {

            Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

            Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
            Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
            Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

            Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
            Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);
            Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
        });

        Route::group(['middleware' => ['auth', 'activated', 'activity']], function () {

            Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
            Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');

            Route::get('profile/{username}', [
                'as'   => '{username}',
                'uses' => 'ProfilesController@show',
                ]);
        });

        Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity']], function () {
            Route::get('/manage', 'HomeController@manage')->name('manage');
            Route::get('/home', 'HomeController@manage')->name('manage');

            Route::resource(
                'profile',
                'ProfilesController', [
                'only' => [
                'show',
                'edit',
                'update',
                'create',
                ],]);
            Route::put('profile/{username}/updateUserAccount', [
                'as'   => '{username}',
                'uses' => 'ProfilesController@updateUserAccount',
                ]);
            Route::put('profile/{username}/updateUserPassword', [
                'as'   => '{username}',
                'uses' => 'ProfilesController@updateUserPassword',
                ]);
            Route::delete('profile/{username}/deleteUserAccount', [
                'as'   => '{username}',
                'uses' => 'ProfilesController@deleteUserAccount',
                ]);

            Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
        });

        Route::group(['middleware' => ['auth', 'activated', 'level:2', 'activity']], function () {
        });

        Route::group(['middleware' => ['auth', 'activated', 'level:4', 'activity']], function () {

            Route::resource('/users/deleted', 'SoftDeletesController', [
                'only' => [
                'index', 'show', 'update', 'destroy',
                ],
                ]);

            Route::resource('users', 'UsersManagementController', [
                'names' => [
                'index'   => 'users',
                'destroy' => 'user.destroy',
                ],
                'except' => [
                'deleted',
                ],
                ]);

            Route::any('manage/translations', 'Manage\NpTranslationsController@index');
            Route::any('manage/languages', 'Manage\NpLanguagesController@index');

            Route::any('manage/pages', 'Manage\NpPagesController@index')->name('pages');
           Route::any('manage/pages_categories', 'Manage\NpPagesCategoriesController@index')->name('pages_categories');
            Route::any('manage/news', 'Manage\NpNewsController@index')->name('news');

        });
        Route::group(['middleware' => ['auth', 'activated', 'level:5', 'activity']], function () {
            Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
            Route::get('php', 'AdminDetailsController@listPHPInfo');
            Route::get('routes', 'AdminDetailsController@listRoutes');

            Route::resource('themes', 'ThemesManagementController', [
                'names' => [
                'index'   => 'themes',
                'destroy' => 'themes.destroy',
                ],
                ]);
        });
});