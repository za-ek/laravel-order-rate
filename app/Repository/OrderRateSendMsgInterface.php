<?php
namespace App\Repository;

interface OrderRateSendMsgInterface {
    public function getMessage();
    public function setMessage($msg);
}
