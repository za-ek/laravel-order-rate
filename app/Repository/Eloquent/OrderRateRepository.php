<?php
namespace App\Repository\Eloquent;

use App\Models\OrderRate;

class OrderRateRepository extends BaseRepository implements OrderRateRepositoryInterface {
    public function __construct(OrderRate $model) {
        parent::__construct($model);
    }

    public function setRate($id, $rate) {
        if($obj = OrderRate::find($id)) {
            return $obj->update(['rate' => $rate]);
        } else {
            return parent::create([
                'order_id' => $id,
                'rate' => $rate
            ]);
        }
    }
}
