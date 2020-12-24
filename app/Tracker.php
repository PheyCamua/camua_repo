<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    // Table Name
    protected $table = 'trackers';
    //Timestamp
    public $timestamp = true;

    public $fillable = [
         'traking_id','tracking_date','tracking_status','tracking_incharge'
    ];
}
