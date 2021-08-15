<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderOwner
{
    public function handle(Request $request, Closure $next) {
        if(
            // @todo
            true ||
        Auth::check()) {
            $order_id = $request->route('id');
            $user_id = Auth::user()->id ?? 0;

            /**
             * @todo
             * Проверка, что заказ существует и принадлежит пользователю
             *
             */
            error_log('order_id: ' . $order_id . ', user_id: ' . $user_id);

            return $next($request);
        }

        abort(403, 'Access denied');
    }
}
