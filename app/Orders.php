<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
   // Table Name
   protected $table = 'orders';
   //Timestamp
   public $timestamp = true;

   public $fillable = [ 
       'user_firstname','user_lastname','user_email','user_phone',
       'user_address','msgtoSeller','user_id','paymentmethod',
       'tracking_id','total_shipping_fee','total_amount','total_qty','grand_total',
        
   ];
}