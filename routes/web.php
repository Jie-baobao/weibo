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

Route::get('/', 'StaticPagesController@home')->name('home');        //主页
Route::get('/help', 'StaticPagesController@help')->name('help');        //帮助页
Route::get('/about', 'StaticPagesController@about')->name('about');     //关于页

Route::get('signup', 'UsersController@create')->name('signup');     //用户注册
Route::resource('users', 'UsersController');

Route::get('login', 'SessionsController@create')->name('login');        //显示登录页面
Route::post('login', 'SessionsController@store')->name('login');        //创建新会话（登录）
Route::delete('logout', 'SessionsController@destroy')->name('logout');      //销毁会话（退出登录）

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');        //邮箱激活

Route::get('password/reset',  'PasswordController@showLinkRequestForm')->name('password.request');      //忘记密码
Route::post('password/email',  'PasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset/{token}',  'PasswordController@showResetForm')->name('password.reset');      //重置密码
Route::post('password/reset',  'PasswordController@reset')->name('password.update');

Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);        //创建、删除微博
