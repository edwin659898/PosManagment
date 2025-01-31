<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    // use HasFactory;
    protected $table = 'order_details';
    protected $fillable = ['quantity', 'product_id',
                     'unitprice', 'amount', 
                     'discount', 'order_id'];
}
