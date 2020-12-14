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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['namespace' => 'Index','middleware' => 'setLocale'],function(){

    //修改语言
    Route::get('/changeLocale/{locale}', 'HomeController@changeLocale');

    //home
    Route::get('/','HomeController@index');
    //about us
    Route::get('about','AboutController@index');
    Route::get('about-company','AboutController@company');
    //our service
    Route::get('service','ServiceController@index');
    Route::get('service-sourcing','ServiceController@sourcing');
    Route::get('service-conseil','ServiceController@conseil');
    Route::get('service-intermediation','ServiceController@intermediation');
    //our partner
    Route::get('partner','PartnerController@index');
    //contact us
    Route::get('contact','ContactController@index');
    //提交留言
    Route::post('message','MessageController@message');
});
