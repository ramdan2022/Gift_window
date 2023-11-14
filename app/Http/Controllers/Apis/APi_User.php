<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class APi_User extends Controller
{
    use HttpResponse ;


    public function index(){
        $product = product ::paginate(3);

        return $this->Http_json_response(200,"This are products for user to choose",$product);
    }

    public function product_detail($id){

        $product = product::find($id);

        return $this->Http_json_response(200,"This is product detail for user",$product);
    }
}
