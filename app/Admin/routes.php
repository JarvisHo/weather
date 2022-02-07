<?php

use Encore\Admin\Facades\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UserController::class);
    $router->resource('programs', ProgramController::class);
    $router->resource('sales', SaleController::class);
    $router->resource('conditions', ConditionController::class);
    $router->resource('tools', ToolController::class);
    $router->resource('images', ImageController::class);
    $router->resource('prizes', PrizeController::class);
    $router->resource('coupons', CouponController::class);
    $router->resource('records', RecordController::class);
});
