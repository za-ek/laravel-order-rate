<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRate extends Model
{
    use HasFactory;

    protected $table = 'order_rates';
    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $fillable = ['order_id', 'rate'];

    private $orderId;
    private $rate;
}
