<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'products';

    protected $hidden = [  
        'created_at',
        'updated_at',   
        
     ];

     protected $fillable =[
        'Title',
        'Description',
        'Price',
        'Discount_price',
        'Quantity',
        'Image',
     ];

    
}
