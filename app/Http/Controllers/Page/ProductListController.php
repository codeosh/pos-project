<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use App\Models\ItemUnit;
use App\Models\Product;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductListController extends Controller
{
  public function index()
  {
    $categories = ItemCategory::all();
    $itemunits = ItemUnit::all();
    $subcategories = SubCategory::all();

    $productlists = Product::latest()->get();

    return view('pages.product_list', compact('categories', 'itemunits', 'subcategories', 'productlists'));
  }

  public function refreshTable()
  {
    $productlists = Product::latest()->get();
    return view('partials.product-list_table', compact('productlists'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'pcode' => 'nullable|integer',
      'barcode' => 'nullable|integer',
      'pscode' => 'nullable|string',
      'pbrand' => 'nullable|string',
      'dropUnit' => 'nullable|string',
      'dropType' => 'nullable|string',
      'dropMainCat' => 'nullable|string',
      'dropSubCat' => 'nullable|string',
      'dropSubSell' => 'nullable|string',
      'dropSources' => 'nullable|string',
      'dropLevel' => 'nullable|string',
      'dropWarranty' => 'nullable|string',
      'costingprice' => 'nullable|numeric',
      'retail_markup' => 'nullable|numeric',
      'retail_type' => 'nullable|string',
      'selling_price' => 'nullable|numeric',
      'special_markup' => 'nullable|numeric',
      'special_type' => 'nullable|string',
      'promotion_value' => 'nullable|numeric',
      'promotion_type' => 'nullable|string',
    ]);

    try {
      DB::beginTransaction();

      Product::create([
        'pcode' => $validatedData['pcode'],
        'barcode' => $validatedData['pcode'],
        'pscode' => $validatedData['pscode'],
        'pbrand' => $validatedData['pbrand'],
        'unit' => $validatedData['dropUnit'],
        'ptype' => $validatedData['dropType'],
        'maincategory' => $validatedData['dropMainCat'],
        'subcategory' => $validatedData['dropSubCat'],
        'subseller' => $validatedData['dropSubSell'],
        'supplier' => $validatedData['dropSources'],
        'level' => $validatedData['dropLevel'],
        'warrantyp' => $validatedData['dropWarranty'],
        'costing' => $validatedData['costingprice'],
        'retailmarkup' => $validatedData['retail_markup'],
        'retailprice' => $validatedData['selling_price'],
        'specialmarkup' => $validatedData['special_markup'],
        'specialprice' => $validatedData['selling_price'],
        'prommarkup' => $validatedData['promotion_value'],
        'promprice' => $validatedData['selling_price'],
      ]);

      DB::commit();
      return response()->json(['success' => true, 'message' => 'Added successfully!']);
    } catch (Exception $error) {
      DB::rollBack();
      return response()->json([
        'success' => false,
        'message' => 'An error occurred while adding.',
        'error_details' => $error->getMessage(),
      ]);
    }
  }
}
