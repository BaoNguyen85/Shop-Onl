<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'order_code', 'product_id', 'product_name', 'product_price', 'product_quantity'
    ];
    protected $primaryKey = 'order_detail_id';
    protected $table = 'tbl_order_details';
    public function product(){
        return $this->belongsTo('App\Models\Products','product_id');
    }
}
