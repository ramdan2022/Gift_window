<?php

namespace App\Http\Controllers;

use App\Models\carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function redirect(){
    
        $usertype=Auth::user()->usertype;

        if($usertype == 1){

     // count orders to show in dashboard
         $orders = DB::select("SELECT id From orders") ;

         $orders_num = count($orders);

    // count users to show in dashboard

         $users = user::where('usertype','=','0')->get();

         $count_users= count($users);

         
     // count products to show in dashboard
         
         $product = new product;
         
         $count_product = $product->count();
         
        //   dd($count_product);  

    // count ordered delivered  and count not

        $Delivered_order = order::where('Delivery_status','=','deliverd')->get();

        $proccesing_order = order::where('Delivery_status','=','proccesing')->get();

        $count_Delivered_order = count($Delivered_order);

        $count_proccesing_order = count($proccesing_order);

    // sum total order price

    $orders = order::all();

    $total_order=0;

    foreach($orders as $order)
    {
        $total_order+=$order->Price;
    }

   

         return view('admin.Home',compact('orders_num','total_order',
         'count_users','count_product','count_Delivered_order','count_proccesing_order'));

        }else{
                 $products= product::paginate(3);
            return view('Home.userpage',compact('products')); 
        }

    }

    public function index(){

        $products= product::paginate(3);
        return view('Home/userpage',compact('products'));
    }

    public function  Product_Details($id){

        $product=product::find($id);

        return view('Home.product_details',compact('product'));
    }

    public function Add_cart(Request $request,$id){

        if(Auth::id()){

        $user = Auth::user(); 
  
        $product = product::find($id);
        
        $cart= new carts;
        
        $cart->name = $user->name;
        
        $cart->phone = $user->phone;
        
        $cart->email = $user->email;
        
        $cart->address  = $user->address;
        
        $cart->user_id= $user->id;

        $cart->product_title = $product->Title;

            
            if($product->Discount_price != null){
            
                $cart->Price=$product->Discount_price * $request->Quantity;

            }else{

                $cart->Price=$product->Price * $request->Quantity;

            }    

            $cart->Quantity=$request->Quantity;

            $cart->Image=$product->Image;

            $cart->product_id=$product->id;


            $cart->save();

            return redirect()->back();
    
        }
      
    }

    public function show_cart(){

        $id=auth::user()->id;

        $carts= carts::where('user_id','=',$id)->get();

        return view('Home.show_cart',compact('carts'));
  
    }

    public function del_item($id){

        $cart = carts::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function cash_deliver(){

        $user = Auth::user();

        $carts= carts::where('user_id','=',$user->id)->get();

        $order = new order ;


        foreach ($carts as $cart){

        $order->name = $cart->name;
        
        $order->phone = $cart->phone;
        
        $order->email = $cart->email;
        
        $order->address  = $cart->address;
        
        $order->user_id= $cart->user_id;

        $order->product_title = $cart->product_title ;

        $order->Price = $cart->Price;    
           
        $order->Quantity=$cart->Quantity;

        $order->Image=$cart->Image;

        $order->product_id=$cart->product_id;

        $order->Payment_status = 'cash on deliver'; 	
            
        $order->Delivery_status	= 'proccesing';

        $order->save();

        
    }

    DB::table('carts')->where('user_id','=',$user->id)->delete();
    
   
        return redirect()->back()->with('message','successfully order');

    }

    public function stripe($finalprise){

        return view('Home.stripe',compact('finalprise'));

    }

    
     
   public function stripePost(Request $request, $finalprise)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" =>$finalprise * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
      
        Session::flash('success', 'Payment successful!');

        // add order in orders table
              
        $user = Auth::user();

        $carts= carts::where('user_id','=',$user->id)->get();

        $order = new order ;

           foreach ($carts as $cart){

        $order->name = $cart->name;
        
        $order->phone = $cart->phone;
        
        $order->email = $cart->email;
        
        $order->address  = $cart->address;
        
        $order->user_id= $cart->user_id;

        $order->product_title = $cart->product_title ;

        $order->Price = $cart->Price;    
           
        $order->Quantity=$cart->Quantity;

        $order->Image=$cart->Image;

        $order->product_id=$cart->product_id;

        $order->Payment_status = 'Paid'; 	
            
        $order->Delivery_status	= 'proccesing';

        $order->save();
    }
    DB::table('carts')->where('user_id','=',$user->id)->delete();
    
   
        return redirect()->back()->with('message','successfully order');

    }

    public function show_orders(){
        $user = Auth::user();

        $orders = Order::where('user_id','=',$user->id)->get();

        return view ('Home.show_orders',compact('orders'));
    }

    public function cancel_order($id){

        Order::where('id','=',$id)
        ->update(['Delivery_status' => 'order is canceled']);

        return redirect()->back()->with('message','No action');

        

    }

    public function Search_product(request $request){

        $search_product = $request->search;

        $products = product::where('Title','LIKE',"%$search_product%")->paginate(3);

        return view('Home.userpage',compact('products'));
    }
}
  