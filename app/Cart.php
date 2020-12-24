<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // Table Name
    protected $table = 'order_cart';
    //Timestamp
    public $timestamp = true;

    public $fillable = [
        'post_id','order_qty','order_price',
        'order_by_id','order_status','session_code'
    ];
}
