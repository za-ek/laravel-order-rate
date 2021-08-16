<?php
namespace App\Repository\Eloquent;

use App\Models\OrderRate;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderRateRepository
    extends BaseRepository
    implements
        OrderRateRepositoryInterface,
        OrderMsgRepositoryInterface
{
    public function __construct(OrderRate $model) {
        parent::__construct($model);
    }

    private function setOrCreate($id, $fld, $val) {
        if($obj = OrderRate::find($id)) {
            return $obj->update([$fld => $val]);
        } else {
            return parent::create([
                'order_id' => $id,
                $fld => $val
            ]);
        }
    }

    public function setRate($id, $rate) { self::setOrCreate($id, 'rate', $rate); }
    public function setMsg($id, $msg) { self::setOrCreate($id, 'msg', $msg); }

    public function getMsg($id) {
        /**
         * @var OrderRate $obj
         */
        if($obj = OrderRate::findOrFail($id)) {
            return $obj->getMessage();
        }

        $ex = new ModelNotFoundException(OrderRate::class, $id);
        throw $ex;
    }
}
