<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\productResource;
use App\Models\Category;
use App\Models\product;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;


class API_admin extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index(product $product)
    {
        $product = product::all();

        return new productResource($product);

        //  return $this->Http_json_response(200,"product for admin",$product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated(); 
        

        $Image = $request->Image;
        
        $imageName = time().".".$Image->getClientOriginalExtension();
        
        // store product in file product in the public
        $request->Image->move('product',$imageName);


        //create product in database 
        $product = product::create([

            'Title' => $validated['Title'],
            'Description' =>$validated['Description'],
            'Discount_price' =>$validated['Discount_price'],
            'Quantity' =>$validated['Quantity'],
            "Image"=> $imageName,
        ]);



        return $this->Http_json_response(200,"product is added by admin",$product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    
        
        $product = product::find($id);
      
        return new productResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, product $product)
    {
        $validated = $request->validated();

       

        $product ->update($validated);

        return $this->Http_json_response(200,"update sueccessfully",$product);
      
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();

        return $this->http_json_response(204);
    }

    public function category_view(){

        $category = Category::all();

        return $this->http_json_response(200,"show CAtegory as admin",$category);
    }

    public function add_categoey(request $request){

          $request->validate([
            "category_name" => 'required|unique:categories',
          ]);

          $category = Category::create([
            "category_name" => $request['category_name'];

            return $this->Http_json_response(200,'',$category);
          ]);
    }
}
