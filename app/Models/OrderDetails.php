<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [

     
        'product_title',
        'product_image_url',
        'product_price',
        'order_id',
        'product_quantity',
      ]; 
}
