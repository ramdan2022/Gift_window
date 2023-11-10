<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Order;
use App\Notifications\Send_Notification;
use Illuminate\Http\Request;
use App\Models\product;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;


class AdminHome extends Controller{


 
  

    public function category_view(){

      $Data=Category::all();

        return view('admin.Category',compact('Data'));

    }

    public function add_category(Request $request){

      $data = new Category;

      $data->category_name = $request->name;

      $data->save();

      return redirect()->back()->with('message','category add successfully');
      
      
    }


    public function category_delete($id){

      $data=category::find($id);
      
      $data->delete();

        return redirect()->back()->with('message','category deleted successfully');



    }

    public function Add_product(){

      $categories = Category::all();

      return view('admin.Add_product',compact('categories'));

    }

    public function AddProduct(Request $request){

      $product = new product;

        $product->Title = $request->title;

     $product->Description= $request->description ; 

     $product->Price =  $request->price  ;
      
      $product->Discount_price =$request->discount_price ;

       $product->Quantity =$request->quantity;

       $product->Catagory = $request->category ;

      
      
      $image=$request->image ;

      $imagename = time().'.'.$image->getclientOriginalExtension();

      $request->image->move('product',$imagename);

      $product->Image=$imagename;

      $product->save();

      return redirect()->back()->with('message','product added successfully');


    }


    public function show_product(){

      $products=Product::all();

      return view('admin.show_product',compact('products'));
    }

    public function product_delete($id){

      $product= product::find($id);

      $product->delete();

      return redirect()->back()->with('message','The product is deleted');
      

    }

    public function edit_product($id){

      $product= product::find($id);

      $categories = Category::all();

      
      return view('admin.edit_product',compact('product','categories'));
    }


    public function update_product(Request $request, $id){

      $product = product::find($id);

      $product->Title = $request->title;

     $product->Description= $request->description ; 

     $product->Price =  $request->price  ;
      
      $product->Discount_price =$request->discount_price ;

       $product->Quantity =$request->quantity;

       $product->Catagory = $request->category ;

      
      
      $image =$request->image;

      $imagename = time().'.'.$image->getClientOriginalExtension();

      $request->image->move('product',$imagename);

      $product->Image = $imagename;
   

      $product->save();

      return redirect('/show_product')->with('message','product updated successfully');




    }

    public function show_orders(){

      $orders=Order::all();

      return view('admin.show_orders',compact('orders'));

    }

    public function deliverd($id){

      $order=Order::find($id);

      $res=DB::table('orders')->
      where('id','=',$id)->
      update(['Delivery_status'=>'deliverd']);

     
      $order->Payment_status='paid';
      
      $order->save();
      
        return redirect()->back();

    }
  

    public function email_inf($id){

      $order=Order::find($id);

      return view('admin.email_send',compact('order'));

    }

    public function send_email(Request $request,$id){

           $order = order::find($id);
           
           $details =[
            'greeting' =>$request->greeting,
            'first_line' => $request->first_line,
            'body'=> $request->body,
            'button' => $request->button,
            'url'=>$request->url,
            'last_line'=>$request->last_line
           ];

           Notification::send($order ,new Send_Notification($details));
           return redirect()->back();



    }

    public function search(request $request){

      $Search_order = $request->search;

      $orders = DB::table('orders')->where('product_title','LIKE',"%$Search_order%")->
         orwhere('name','LIKE',"%$Search_order%")->orwhere('phone','LIKE',"%$Search_order%")->get();

       return view('admin.show_orders',compact('orders'));


    }
}