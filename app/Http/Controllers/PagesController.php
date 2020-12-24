<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use App\Post;
use App\Uploads;
use App\Categories;
use DB;
use Auth;

class PagesController extends Controller
{ 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!empty(auth()->user()->id)){
            if ((Auth::user()->user_type == 'SuperAdmin')){
                return redirect('/super-admin');
            }
            
            elseif ((Auth::user()->user_type == 'Admin')){
                return redirect('/admin-center');
            }
            
            elseif ((Auth::user()->user_type == 'Seller')){
                return redirect('/sellers-center');
            }
        } 
            $flashsale = DB::table('posts') 
                ->select('posts.*','uploads.imglink') 
                ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')   
                ->groupBy('posts.temp_code')
                ->orderByRaw("RAND()")
                ->paginate(6);

            $mostpopular = DB::table('posts') 
                ->select('posts.*','uploads.imglink') 
                ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')   
                ->groupBy('posts.temp_code')
                ->orderByRaw("RAND()")
                ->paginate(6);

            $categories = Categories::all();

            $params = [
                'flashsale' => $flashsale,
                'mostpopular' => $mostpopular,
                'categories' => $categories,
            ];
            
            return view('pages.home')->with($params);
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
         
            $flashsale = DB::table('posts') 
                ->select('posts.*','uploads.imglink') 
                ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')   
                ->groupBy('posts.temp_code')
                ->orderByRaw("RAND()")
                ->paginate(6);

            $mostpopular = DB::table('posts') 
                ->select('posts.*','uploads.imglink') 
                ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')   
                ->groupBy('posts.temp_code')
                ->orderByRaw("RAND()")
                ->paginate(6);

            $categories = Categories::all();

            $params = [
                'flashsale' => $flashsale,
                'mostpopular' => $mostpopular,
                'categories' => $categories,
            ];
            
            return view('pages.home')->with($params);
        
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function categories($cat)
    { 

        $items = DB::table('posts') 
            ->select('posts.*','uploads.imglink','item_categories.category') 
            ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')   
            ->leftJoin('item_categories', 'item_categories.id', '=', 'posts.category_id')   
            ->where('item_categories.category','=',$cat)
            ->groupBy('posts.temp_code')
            ->orderByRaw("RAND()")
            ->paginate(15); 
        $categories = Categories::all();

        $params = [ 
            'items' => $items,
            'categories' => $categories,
        ];

        return view('pages.categories')->with($params);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function item($temp_code)
    {
        $post = DB::table('posts') 
            ->select('posts.*','uploads.imglink','item_categories.category','item_categories.sub_category')
            ->leftJoin('item_categories', 'posts.category_id', '=', 'item_categories.id')  
            ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')  
            ->where('posts.temp_code','=',$temp_code)   
            ->groupBy('posts.temp_code')
            ->first();

        $cart = DB::table('order_cart') 
            ->select('order_qty') 
            // ->where('order_by_id','=',Auth::user()->id) 
            ->where('order_status','=','Added to Cart')
            ->where('post_id','=',$post->id)   
            ->first();

        $uploads = DB::table('uploads')->where('temp_code', $temp_code)->get();

        $flashsale = DB::table('posts') 
            ->select('posts.*','uploads.imglink') 
            ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code') 
            ->groupBy('posts.temp_code')  
            ->orderByRaw("RAND()")
            ->paginate(6);

        $relatedItems = DB::table('posts') 
            ->select('posts.*','uploads.imglink') 
            ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')   
            ->where('posts.category_id', '=', $post->category_id)
            ->groupBy('posts.temp_code')
            ->paginate(6);

        $feedbacks=DB::table('feedbacks')     
            ->select('feedbacks.*','users.screenname') 
            ->leftJoin('users', 'users.id', '=', 'feedbacks.feedback_by')  
            ->where('temp_code', '=', $post->temp_code)
            ->paginate(3);
        
        $params = [
            'post' => $post,
            'uploads' => $uploads,
            'flashsale' => $flashsale,
            'relatedItems' => $relatedItems,
            'feedbacks' => $feedbacks,
            'cart' => $cart
        ];
        return view('pages.item-view')->with($params);
    }
 
    
    
    
}
