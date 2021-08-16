<?php
namespace App\Repository;

use Illuminate\Support\Facades\Storage;

class OrderRateSendMsgRepository implements OrderRateSendMsgInterface {

    public function get() {
        return Storage::get('orders_rate_config.txt');
    }

    public function set($msg) {
        Storage::put('orders_rate_config.txt', $msg, 'private');
    }
}
