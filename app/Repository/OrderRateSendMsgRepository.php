<?php
namespace App\Repository;

use Illuminate\Support\Facades\Storage;

class OrderRateSendMsgRepository implements OrderRateSendMsgInterface {

    public function getMessage() {
        return Storage::get('orders_rate_config.txt');
    }

    public function setMessage($msg) {
        Storage::put('orders_rate_config.txt', $msg, 'private');
    }
}
