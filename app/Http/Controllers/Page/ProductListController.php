<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index()
    {
        return view('pages.product_list');
    }
}
