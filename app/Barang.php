<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model 
{
    protected $fillable = [
        'name' ,
        'description',
        'price',
        'weight',
        'stok',
        'categories_id'
    ];

    
}