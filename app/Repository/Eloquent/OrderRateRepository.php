<?php
namespace App\Repository\Eloquent;

use App\Models\OrderRate;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderRateRepository
    extends BaseRepository
    implements
        OrderRateRepositoryInterface,
        OrderCommentRepositoryInterface
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

    public function setRate($id, $rate) { return self::setOrCreate($id, 'rate', $rate); }
    public function setComment($id, $msg) { return self::setOrCreate($id, 'comment', $msg); }

    public function getRate($id) { return $this->model->findOrFail($id)->rate; }
    public function getComment($id) { return $this->model->findOrFail($id)->comment; }
}
