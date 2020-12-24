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

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('order_cart') 
            ->select('order_cart.*','posts.item_name','posts.temp_code')
            ->leftJoin('posts', 'posts.id', '=', 'order_cart.post_id')  
            ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')  
            ->where('posts.user_id','=',Auth::user()->id)  
            ->where('order_cart.order_status','=','Ordered') 
            ->orderBy('posts.temp_code') 
            ->get();
 

        $params = [
            'orders' => $orders 
        ];
 
        return view('orders.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
