<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Cart;  
use DB;
use Auth;

class CartController extends Controller
{
    
  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!empty(Auth::user()->id)){
            $carts = DB::table('order_cart') 
                ->select('order_cart.*','posts.item_name','posts.title','posts.shipping_fee','posts.shipping_disc',
                'posts.temp_code','uploads.imglink')
                ->leftJoin('posts', 'posts.id', '=', 'order_cart.post_id')  
                ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')  
                ->where('order_cart.order_by_id','=',Auth::user()->id) 
                ->where('order_cart.order_status','=','Added to Cart') 
                ->groupBy('order_cart.post_id')
                ->orderBy('order_cart.id')  
                ->get();
        }
        else{
            $carts = DB::table('order_cart') 
                ->select('order_cart.*','posts.item_name','posts.title','posts.shipping_fee','posts.shipping_disc',
                'posts.temp_code','uploads.imglink')
                ->leftJoin('posts', 'posts.id', '=', 'order_cart.post_id')  
                ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')   
                ->where('order_cart.order_status','=','Added to Cart') 
                ->where('session_code','=',$_COOKIE['session_code'])
                ->groupBy('order_cart.post_id')
                ->orderBy('order_cart.id')  
                ->get();
        } 

        $params = [ 
            'carts' => $carts
        ];
        return view('pages.orders.cart')->with($params);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        if(!empty(Auth::user()->id)){
            $carts = DB::table('order_cart') 
                ->select('order_cart.*','posts.item_name','posts.title','posts.shipping_fee','posts.shipping_disc',
                'posts.temp_code','uploads.imglink')
                ->leftJoin('posts', 'posts.id', '=', 'order_cart.post_id')  
                ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')  
                ->where('order_cart.order_by_id','=',Auth::user()->id) 
                ->where('order_cart.order_status','=','Checkout') 
                ->groupBy('order_cart.post_id')
                ->orderBy('order_cart.id')  
                ->get();
        }
        else{
            $carts = DB::table('order_cart') 
                ->select('order_cart.*','posts.item_name','posts.title','posts.shipping_fee','posts.shipping_disc',
                'posts.temp_code','uploads.imglink')
                ->leftJoin('posts', 'posts.id', '=', 'order_cart.post_id')  
                ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')   
                ->where('order_cart.order_status','=','Checkout') 
                ->where('session_code','=',$_COOKIE['session_code'])
                ->groupBy('order_cart.post_id')
                ->orderBy('order_cart.id')  
                ->get();
        } 
 

        $params = [
            'carts' => $carts
        ];
        return view('pages.orders.checkout')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty(Auth::user()->id)){
            $order = Cart::updateOrCreate(['id' => $request->id, 'post_id' => $request->post_id, 'order_by_id' => Auth::user()->id], [
                'post_id' => $request->post_id,
                'order_qty' => $request->order_qty,
                'order_price' => $request->order_price,
                'order_status' => $request->order_status,
                'session_code' => $request->session_code,
                'order_by_id' => Auth::user()->id
            ]); 
        }
        else{
            $order = Cart::updateOrCreate(['id' => $request->id, 'post_id' => $request->post_id, 'session_code' => $request->session_code], [
                'post_id' => $request->post_id,
                'order_qty' => $request->order_qty,
                'order_price' => $request->order_price,
                'order_status' => $request->order_status,
                'session_code' => $request->session_code 
            ]); 
        }
        
        return response()->json(['code'=>200, 'message'=>'Added to Cart','data' => $order], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout_order(Request $request)
    {
        if(!empty(Auth::user()->id)){
            $order = Cart::updateOrCreate(['post_id' => $request->post_id, 'order_by_id' => Auth::user()->id], [
                'post_id' => $request->post_id,
                'order_qty' => $request->order_qty,
                'order_price' => $request->order_price,
                'order_status' => $request->order_status,
                'session_code' => $request->session_code,
                'order_by_id' => Auth::user()->id
            ]); 
        }
        else{
            $order = Cart::updateOrCreate(['post_id' => $request->post_id, 'session_code' => $request->session_code], [
                'post_id' => $request->post_id,
                'order_qty' => $request->order_qty,
                'order_price' => $request->order_price,
                'order_status' => $request->order_status,
                'session_code' => $request->session_code,
                'order_by_id' => ''
            ]); 
        }
        
        return response()->json(['code'=>200, 'message'=>'Added to Cart','data' => $order], 200);
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
