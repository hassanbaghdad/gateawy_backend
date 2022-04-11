<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products_model extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey="product_id";

    protected $fillable =[
      'product_title',
      'product_size',
      'product_price',
      'product_desc',

    ];

    protected $casts =[
      'product_price'=>'double'
    ];
}
