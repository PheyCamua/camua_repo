<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;  
use App\Cart;  
use App\Customer;   
use DB;
use Auth;

class OrdersController extends Controller
{
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('order_cart') 
                ->select('order_cart.*','posts.item_name','posts.title','posts.shipping_fee','posts.shipping_disc',
                'posts.temp_code','uploads.imglink')
                ->leftJoin('posts', 'posts.id', '=', 'order_cart.post_id')  
                ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')  
                ->where('order_cart.order_by_id','=',Auth::user()->id) 
                ->where('order_cart.order_status','=','Checked Out') 
                ->groupBy('order_cart.post_id')
                ->orderBy('order_cart.id')  
                ->get();
  
        $params = [
            'orders' => $orders 
        ];
 
        return view('orders.index')->with($params);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //UPDATE CUSTOMER
        
        $customer = new Customers;
        $customer->user_firstname = $request->user_firstname;
        $customer->user_lastname = $request->user_lastname;
        $customer->user_email = $request->user_email;
        $customer->user_phone = $request->user_phone;
        $customer->user_address = $request->user_address; 
        $customer->user_id = auth()->user()->id;
        $customer->save();
        
        if(!empty(Auth::user()->id)){
            $customer = Customers::updateOrCreate(['user_id' => auth()->user()->id], [
                'user_firstname' => $user_firstname,
                'user_lastname' => $request->user_lastname,
                'user_email' => $request->user_email,
                'user_phone' => $request->user_phone,
                'user_address' => $request->user_address, 
                'user_id' => Auth::user()->id
            ]); 
        }
        else{
            $customer = Customers::updateOrCreate(['user_email' => $request->user_email, 'user_address' => $request->user_address], [
                'user_firstname' => $user_firstname,
                'user_lastname' => $request->user_lastname,
                'user_email' => $request->user_email,
                'user_phone' => $request->user_phone,
                'user_address' => $request->user_address
            ]); 
        }

        $fname = $request->user_firstname;
        $lname = $request->user_lastname;
        $phone = $request->user_phone; 

        $customer_id = DB::table('customers') 
            ->select('cid')
            ->where('user_firstname','=',$fname) 
            ->where('user_lastname','=',$lname)   
            ->where('user_phone','=',$phone)   
            ->first();

        //UPDATE ORDER 
  
        if(!empty(Auth::user()->id)){
            $order = Orders::updateOrCreate(['cid' => $customer_id, 'tracking_id' => $request->tracking_id, 'user_id' => Auth::user()->id], [
                'cid' => $customer_id,
                'order_shipping_fee' => $request->order_shipping_fee,
                'msgtoSeller' => $request->msgtoSeller,
                'paymentmethod' => $request->paymentmethod,
                'tracking_id' => $request->tracking_id, 
                'user_id' => Auth::user()->id
            ]); 
        }
        else{
            $order = Orders::updateOrCreate(['cid' => $customer_id, 'tracking_id' => $request->tracking_id], [
                'cid' => $customer_id,
                'order_shipping_fee' => $request->order_shipping_fee,
                'msgtoSeller' => $request->msgtoSeller,
                'paymentmethod' => $request->paymentmethod,
                'tracking_id' => $request->tracking_id 
            ]); 
        }
        
        return response()->json(['code'=>200], 200);
    }
  
}
