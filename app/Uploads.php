<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    // Table Name
    protected $table = 'uploads';
    //Timestamp
    public $timestamp = true;
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    } 
}
