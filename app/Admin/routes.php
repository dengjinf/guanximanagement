<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    //home内容
    $router->resource('homes', HomeContentController::class);
    $router->resource('project-cases', CaseController::class);
    //about us内容
    $router->resource('abouts', AboutContentController::class);
    //contact us内容
    $router->resource('contacts', ContactContentController::class);
    //our partner内容
    $router->resource('partners', PartnerContentController::class);
    //our service内容
    $router->resource('services', ServiceContentController::class);
    //events内容
    $router->resource('events', EventsController::class);
    //message内容
    $router->resource('messages', MessageController::class);

});
