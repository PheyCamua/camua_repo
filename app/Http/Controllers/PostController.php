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

class PostController extends Controller
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
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $posts = DB::table('posts') 
            ->select('posts.*','uploads.imglink','item_categories.category','item_categories.sub_category')
            ->leftJoin('item_categories', 'posts.category_id', '=', 'item_categories.id')  
            ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')  
            ->where('posts.user_id','=',Auth::user()->id) 
            ->groupBy('posts.temp_code')
            ->get();

        $categories = Categories::all();

        $params = [
            'posts' => $posts,
            'categories' => $categories,
        ];
 
        return view('inventory.index')->with($params);
    }

    public function loadinventory(){
        $posts = DB::table('posts') 
            ->select('posts.*','uploads.imglink','item_categories.category','item_categories.sub_category')
            ->leftJoin('item_categories', 'posts.category_id', '=', 'item_categories.id')  
            ->leftJoin('uploads', 'uploads.temp_code', '=', 'posts.temp_code')  
            ->where('posts.user_id','=',Auth::user()->id) 
            ->groupBy('posts.temp_code')
            ->get();

        $params = [
            'posts' => $posts 
        ];
 
        return view('inventory.loadinventory')->with($params);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
        ]);
  
        $post = Post::updateOrCreate(['id' => $request->id], [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'item_code' => $request->item_code,
            'item_code' => $request->item_code,
            'item_name' => $request->item_name,
            'item_qty' => $request->item_qty,
            'item_brand' => $request->item_brand,
            'item_model' => $request->item_model,
            'item_tags' => $request->item_tags,
            'price_new' => $request->price_new,
            'price_old' => $request->price_old,
            'temp_code' => $request->temp_code,

            'item_color' => $request->item_color,
            'item_size' => $request->item_size,
            'item_width' => $request->item_width,
            'item_length' => $request->item_length,
            'item_height' => $request->item_height,
            'item_weight' => $request->item_weight,
            
            'shipping_fee' => $request->shipping_fee,
            'shipping_disc' => $request->shipping_disc,

            'user_id' => Auth::user()->id
        ]); 
        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $post], 200);
  
    }

    public function upload(Request $request){
        $temp_code = $request->temp_code;  
 
        // START UPLOAD PHOTOS

        $errors = array();
        $uploadedFiles = array();
        $extension = array("jpeg","jpg","png");
        $bytes = 1024;
        $KB = 10240;
        $totalBytes = $bytes * $KB;

        $UploadFolder = "uploads/".$temp_code;
        //make file directory
        if (!file_exists($UploadFolder)) {
            mkdir($UploadFolder, 0755, true);
        }
        // else{

        //     $dirPath = $UploadFolder;
        //     if (! is_dir($dirPath)) {
        //         throw new InvalidArgumentException("$dirPath must be a directory");
        //     }

        //     if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        //         $dirPath .= '/';
        //     }

        //     $files = glob($dirPath . '*', GLOB_MARK);
        //     foreach ($files as $file) {
        //         if (is_dir($file)) {
        //             self::deleteDir($file);
        //         } else {
        //             unlink($file);
        //         }
        //     }
        //     rmdir($dirPath);
        //     mkdir($UploadFolder, 0755, true);

        // }

            $counter = 0;
        foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
            $temp = $_FILES["files"]["tmp_name"][$key];
            $name = $_FILES["files"]["name"][$key];
            if(empty($temp)) {
                break;
            }

            $counter++;
            $UploadOk = true;
            if($_FILES["files"]["size"][$key] > $totalBytes) {
                $UploadOk = false;
                array_push($errors, $name." file size is larger than the 1 MB.");
            }

           $ext = pathinfo($name, PATHINFO_EXTENSION);
            if(in_array($ext, $extension) == false){
                $UploadOk = false;
                array_push($errors, $name." is invalid file type.");
            }

            if(file_exists($UploadFolder."/".$name) == true){
                $UploadOk = false;
                array_push($errors, $name." file is already exist.");
            }

            if($UploadOk == true){
                move_uploaded_file($temp,$UploadFolder."/".$name);
                array_push($uploadedFiles, $name);

                //INSERT PHOTO TO DATABASE
                DB::table('uploads')->insert(
                    ['imglink' => $name, 'temp_code' => $temp_code]
                );
            }
        }
        return redirect('/inventory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id); 
        return response()->json($post);
    }

     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id)->delete();

        return response()->json(['success'=>'Post Deleted successfully']);
    }
}
