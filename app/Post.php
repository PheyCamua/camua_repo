<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    //Timestamp
    public $timestamp = true;

    public $fillable = [
        'title','description','category_id',
        'item_name', 'item_tags','item_code','item_qty','item_model','item_brand','item_status',
        'price_new','price_old','discount_percentage','dicsount_start','discount_end','user_id',
        'temp_code','item_color','item_size','item_width','item_length','item_height','item_weight',
        'shipping_fee','shipping_disc'
    ];
}
