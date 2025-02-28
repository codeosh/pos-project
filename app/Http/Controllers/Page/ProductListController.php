<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use App\Models\ItemUnit;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index()
    {
        $categories = ItemCategory::all();
        $itemunits = ItemUnit::all();
        $subcategories = SubCategory::all();

        return view('pages.product_list', compact('categories', 'itemunits', 'subcategories'));
    }
}
