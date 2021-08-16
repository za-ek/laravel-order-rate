<?php
namespace App\Repository;

interface OrderRateSendMsgInterface {
    public function get();
    public function set($msg);
}
