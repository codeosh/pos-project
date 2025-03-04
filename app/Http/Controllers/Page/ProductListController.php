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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pcode' => 'required|integer',
            'pscode' => 'required|string',
            'pbrand' => 'required|string',
            'dropUnit' => 'required|string',
            'dropType' => 'required|string',
            'dropMainCat' => 'required|string',
            'dropSubCat' => 'nullable|string',
            'dropSubSell' => 'required|string',
            'dropSources' => 'nullable|string',
            'dropLevel' => 'required|string',
            'dropWarranty' => 'nullable|string',
            'costingprice' => 'required|numeric',
            'retail_markup' => 'nullable|numeric',
            'retail_type' => 'nullable|string',
            'selling_price' => 'nullable|numeric',
            'special_markup' => 'nullable|numeric',
            'special_type' => 'nullable|string',
            'promotion_value' => 'nullable|numeric',
            'promotion_type' => 'nullable|string',
        ]);

        $product = Product::create([
            'pcode' => $validatedData['pcode'],
            'pscode' => $validatedData['pscode'],
            'pbrand' => $validatedData['pbrand'],
            'unit' => $validatedData['dropUnit'],
            'ptype' => $validatedData['dropType'],
            'maincategory' => $validatedData['dropMainCat'],
            'subcategory' => $validatedData['dropSubCat'] ?? null,
            'subseller' => $validatedData['dropSubSell'],
            'supplier' => $validatedData['dropSources'] ?? null,
            'level' => $validatedData['dropLevel'],
            'warrantyp' => $validatedData['dropWarranty'] ?? null,
            'costing' => $validatedData['costingprice'],
            'retailmarkup' => $validatedData['retail_markup'] ?? null,
            'retailprice' => $validatedData['selling_price'] ?? null,
            'specialmarkup' => $validatedData['special_markup'] ?? null,
            'specialprice' => $validatedData['selling_price'] ?? null,
            'prommarkup' => $validatedData['promotion_value'] ?? null,
            'promprice' => $validatedData['selling_price'] ?? null,
        ]);

 // Return a success response
        return response()->json([
            'message' => 'Product added successfully!',
            'product' => $product,
        ], 201); // HTTP status code 201 Created
    }
}
