<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('pages.contact', compact('contacts'));
    }

    public function refreshTable()
    {
        $contacts = Contact::all();
        return view('partials.contact_table', compact('contacts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'seqcode' => 'required|string|max:255',
            'consignee' => 'required|string|max:255',
            'contactperson' => 'required|string|max:255',
            'dropGroup' => 'required|string|max:255',
            'tin' => 'required|string|max:255',
            'dropTypePayment' => 'required|string|max:255',
            'dropDayPayment' => 'required|string|max:255',
            'contactaddress' => 'required|string|max:255',
            'contactnum' => 'required|numeric|digits_between:7,15',
            'contactcomment' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            $contact = Contact::create([
                'unitcode' => $validatedData['seqcode'],
                'customername' => $validatedData['consignee'],
                'contactperson' => $validatedData['contactperson'],
                'group' => $validatedData['dropGroup'],
                'tin' => $validatedData['tin'],
                'address' => $validatedData['contactaddress'],
                'contact' => (int) $validatedData['contactnum'],
                'comment' => $validatedData['contactcomment'],
            ]);

            $contact->payment()->create([
                'type' => $validatedData['dropTypePayment'],
                'day' => $validatedData['dropDayPayment'],
            ]);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Added successfully!'], 201);
        } catch (Exception $error) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occured while adding.',
                'error_details' => $error->getMessage(),
            ], 500);
        }
    }

    public function getNextUnitCode()
    {
        $existingCodes = Contact::pluck('unitcode')->toArray();

        $prefix = 'A';
        for ($i = 1000; $i <= 9999; $i++) {
            $code = $prefix . $i;
            if (!in_array($code, $existingCodes)) {
                return response()->json(['unitcode' => $code]);
            }
        }

        $lastItem = Contact::latest('id')->first();

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
