<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uploads;
use App\Categories;
use App\Orders; 
use App\Post; 
use app\User;
use DB;
use Auth;

class SuperAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = DB::table('order_cart') 
            ->select('order_cart.*','posts.item_name','posts.temp_code')
            ->leftJoin('posts', 'posts.id', '=', 'order_cart.post_id')  
            ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')  
            ->where('posts.user_id','=',Auth::user()->id)  
            ->orderBy('posts.temp_code') 
            ->get();
 

        $params = [
            'orders' => $orders 
        ];
 
        return view('superadmin.index')->with($params);
    }

}
