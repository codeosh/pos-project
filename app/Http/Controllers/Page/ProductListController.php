<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index()
    {
        $categories = ItemCategory::all();

        return view('pages.product_list', compact('categories'));
    }
}
