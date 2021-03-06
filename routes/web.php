<?php

use Illuminate\Support\Facades\Route;

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

//===================================================================================//

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('redirect/{provider}', 'Admin\SocialAuthController@redirect');
Route::get('callback/{provider}', 'Admin\SocialAuthController@callback');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auto_check_permission'], 'namespace' => 'Admin'], function () {
    Route::get('/admin', function () {
        return view('admin.home');
    });

    Route::resource('topics', 'TopicController');
    Route::resource('questions', 'QuestionController');
    Route::resource('options', 'QuestionOptionController');
    Route::resource('tests', 'TestController');
    Route::resource('results', 'ResultController');

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');

    //================= this route for change language ( ar - en ) ===================//
    Route::get('lang/{lang}', function ($lang) {
        session()->has('lang') ? session()->forget('lang') : '';
        $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return back();
    })->name('lang');
});
