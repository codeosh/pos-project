<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ="tbl_product";

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
