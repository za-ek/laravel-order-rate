<?php
namespace App\Repository\Eloquent;

/**
 * Interface OrderRateRepositoryInterface
 * @package App\Repository\Eloquent
 */
interface OrderRateRepositoryInterface
{
    public function setRate($id, $rate);
    public function getRate($id);
}
