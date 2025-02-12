<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemCatController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'unitcode' => 'required|string|max:255',
            'pname' => 'required|string|max:255'
        ]);

        try {
            DB::beginTransaction();

            ItemCategory::create([
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
                'stack_trace' => $error->getTraceAsString(),
            ], 500);
        }
    }

    public function getNextUnitCode()
    {
        $existingCodes = ItemCategory::pluck('unitcode')->toArray();

        $prefix = 'A';
        for ($i = 1000; $i <= 9999; $i++) {
            $code = $prefix . $i;
            if (!in_array($code, $existingCodes)) {
                return response()->json(['unitcode' => $code]);
            }
        }

        $lastItem = ItemCategory::latest('id')->first();

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

    public function fetchItemCategories()
    {
        try {
            $categories = ItemCategory::select('unitcode', 'pname')
                ->orderBy('created_at', 'DESC')
                ->get();

            return response()->json(['success' => true, 'categories' => $categories]);
        } catch (Exception $error) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch data.',
                'error_details' => $error->getMessage(),
            ], 500);
        }
    }


    public function destroy(Request $request, $unitcode)
    {
        $category = ItemCategory::where('unitcode', $unitcode)->first();

        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Item category not found.'], 404);
        }

        $category->delete();

        return response()->json(['success' => true, 'message' => 'Item category deleted successfully.']);
    }
}
