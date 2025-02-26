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

        return view('pages.item_units');
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
}
