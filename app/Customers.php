<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
   // Table Name
   protected $table = 'customers';
   // Primary Key
   public $primaryKey = 'cid';
   //Timestamp
   public $timestamp = true;

   public $fillable = [ 
       'user_firstname','user_lastname','user_email','user_phone',
       'user_address','user_id', 
   ];
}