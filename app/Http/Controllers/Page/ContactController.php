<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
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
}
