<?php

use App\Http\Controllers\OrderRateController;
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

/**
 * Механизм отзывов к заказу
 */
Route::prefix('orders/{id}')
//    ->middleware(OrderOwner::class)
    ->group(function() {
        /**
         * Оценка заказа
         */
        Route::post('/rate/{rate}',[OrderRateController::class, 'saveRate']);
        Route::get('/rate', [OrderRateController::class, 'getRate']);

        /**
         * Комментарий пользователя к заказу
         */
        Route::post('/comment',[OrderRateController::class, 'saveComment']);
        Route::get('/comment', [OrderRateController::class, 'getComment']);
});

/**
 * Админка отзывы к заказу
 */
Route::prefix('admin/orders/{id}')
//    ->middleware('can:read,orderRate')
    ->group(function() {
        Route::get('/rate', [OrderRateController::class, 'getRate']);
        Route::get('/comment', [OrderRateController::class, 'getComment']);
});

/**
 * Текст сообщения "предложение оценить заказ"
 */
Route::get('admin/config/orderMsg', [OrderRateController::class, 'getSendMessage'])
//    ->middleware('can:read,orderMsg')
;
Route::post('admin/config/orderMsg', [OrderRateController::class, 'saveSendMessage'])
//    ->middleware('can:update,orderMsg')
;
