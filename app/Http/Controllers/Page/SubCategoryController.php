<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::select('unitcode', 'pname')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.item_sub-category', compact('subcategories'));
    }

    public function refreshTable()
    {
        $subcategories = SubCategory::select('unitcode', 'pname')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.item_sub-category', compact('subcategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'unitcode' => 'required|string|max:255',
            'pname' => 'required|string|max:255'
        ]);

        try {
            DB::beginTransaction();

            SubCategory::create([
                'unitcode' => $validatedData['unitcode'],
                'pname' => $validatedData['pname']
            ]);

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Added successfully!']);
        } catch (Exception $error) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while Adding.',
                'error_details' => $error->getMessage(),
            ], 500);
        }
    }

    public function getNextUnitCode()
    {
        $existingCodes = SubCategory::pluck('unitcode')->toArray();

        $prefix = 'A';
        for ($i = 1000; $i <= 9999; $i++) {
            $code = $prefix . $i;
            if (!in_array($code, $existingCodes)) {
                return response()->json(['unitcode' => $code]);
            }
        }

        $lastItem = SubCategory::latest('id')->first();

        if ($lastItem) {
            $lastPrefix = substr($lastItem->unitcode, 0, 1);
            $lastNumber = intval(substr($lastItem->unitcode, 1));

            if ($lastNumber >= 9999) {
                $nextPrefix = chr(ord($lastPrefix) + 1);
                $nextCode = $nextPrefix . '1000';
            } else {
                $nextCode = $lastPrefix . ($lastNumber + 1);
            }
        } else {
            $nextCode = 'A1000';
        }

        return response()->json(['unitcode' => $nextCode]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'unitcode' => 'required|exists:tbl_item_units,unitcode',
            'pname' => 'required|string|max:255',
        ]);

        $itemunit = SubCategory::where('unitcode', $request->unitcode)->firstOrFail();

        if (!$itemunit) {
            return response()->json(['success' => false, 'message' => 'Sub-Category not found.'], 404);
        }

        $itemunit->update([
            'pname' => $request->pname,
        ]);

        return response()->json(['success' => true, 'message' => 'Updated successfully!']);
    }

    public function destroy($unitcode)
    {
        $category = SubCategory::where('unitcode', $unitcode)->first();

        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Sub-Category not found.'], 404);
        }

        $category->delete();

        return response()->json(['success' => true, 'message' => 'deleted successfully.']);
    }

    public function resetSubCategory()
    {
        try {
            SubCategory::truncate();

            return response()->json(['success' => true, 'message' => 'All Sub-Categories have been deleted.']);
        } catch (Exception $error) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while resetting.',
                'error_details' => $error->getMessage(),
            ], 500);
        }
    }
}
