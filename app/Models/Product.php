<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;
    // use HasFactory;
    protected $table = 'products';
    protected $fillable = ['product_name', 'description',
                     'brand', 'price', 
                     'quantity', 'alert_stock'];
}
