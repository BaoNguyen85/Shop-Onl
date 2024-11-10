<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collections extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'collection_name', 'collection_title', 'collection_description', 'collection_content', 'collection_img' 
    ];
    protected $primaryKey = 'collection_id';
    protected $table = 'tbl_collections';
}
