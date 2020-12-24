<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    // Table Name
    protected $table = 'item_categories';

    // Primary Key
    public $primaryKey = 'id';

    //Timestamp
    public $timestamp = true;

    public $fillable = [
        'category','sub_category','category_tags' 
    ];
}
