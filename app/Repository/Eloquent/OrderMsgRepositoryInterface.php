<?php
namespace App\Repository\Eloquent;

/**
 * Interface OrderMsgRepositoryInterface
 * @package App\Repository\Eloquent
 */
interface OrderMsgRepositoryInterface
{
    public function setMsg($id, $msg);
    public function getMsg($id);
}
