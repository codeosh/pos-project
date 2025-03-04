<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "tbl_products";

    protected $fillable = [
        'pcode',
        'pscode',
        'pbrand',
        'unit',
        'ptype',
        'maincategory',
        'subcategory',
        'subseller',
        'supplier',
        'level',
        'warrantyp',
        'costing',
        'retailmarkup',
        'retailprice',
        'specialmarkup',
        'specialprice',
        'prommarkup',
        'promprice'
    ];
}
