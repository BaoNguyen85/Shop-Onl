<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'customers_name', 'customers_birth', 'customers_mail', 'customers_phone', 'customers_address', 'customers_password' 
    ];
    protected $primaryKey = 'customers_id';
    protected $table = 'tbl_customers';
}
