<?php

namespace App\Http\Requestes;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest{


/**
 * Determine if the user is authorize or not 
 * 
 * @return bool
 * */ 
    public function authorize(){
        return true;
  }
 


  /**
   * get the validation rules that apply the request
   * 
   * @return array<string,mixed>
   * */ 
  public function rules(){

    return [
        'name' => 'required|string|max:70',
        'email' => 'required|string|max:40|unique:users',
        'password'=> ['required','confirmed',Password::defaults()]
         
        
    ];
  }


}