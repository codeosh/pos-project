<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\ItemUnit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemUnitController extends Controller
{
    public function index()
    {
        $itemunits = ItemUnit::select('unitcode', 'pname')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.item_units', compact('itemunits'));
    }

    public function refreshTable()
    {
        $itemunits = ItemUnit::select('unitcode', 'pname')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('partials.item_unit', compact('itemunits'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'unitcode' => 'required|string|max:255',
            'pname' => 'required|string|max:255'
        ]);

        try {
            DB::beginTransaction();

            ItemUnit::create([
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
        $existingCodes = ItemUnit::pluck('unitcode')->toArray();

        $prefix = 'A';
        for ($i = 1000; $i <= 9999; $i++) {
            $code = $prefix . $i;
            if (!in_array($code, $existingCodes)) {
                return response()->json(['unitcode' => $code]);
            }
        }

        $lastItem = ItemUnit::latest('id')->first();

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

        $itemunit = ItemUnit::where('unitcode', $request->unitcode)->firstOrFail();

        if (!$itemunit) {
            return response()->json(['success' => false, 'message' => 'Item Unit not found.'], 404);
        }

        $itemunit->update([
            'pname' => $request->pname,
        ]);

        return response()->json(['success' => true, 'message' => 'Updated successfully!']);
    }

    public function destroy($unitcode)
    {
        $category = ItemUnit::where('unitcode', $unitcode)->first();

        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Item units not found.'], 404);
        }

        $category->delete();

        return response()->json(['success' => true, 'message' => 'Item units deleted successfully.']);
    }

    public function resetItemUnit()
    {
        try {
            ItemUnit::truncate();

            return response()->json(['success' => true, 'message' => 'All item units have been deleted.']);
        } catch (Exception $error) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while resetting.',
                'error_details' => $error->getMessage(),
            ], 500);
        }
    }
}
