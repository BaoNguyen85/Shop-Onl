<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'product_name', 'product_oldprice', 'product_price', 'product_image', 'product_quantity', 'product_size' 
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_products';
}
