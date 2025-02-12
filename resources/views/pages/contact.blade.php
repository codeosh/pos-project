{{-- resources\views\pages\contact.blade.php --}}
@extends('layouts.main_layout')

@section('title', 'Contacts - POS')

<link rel="stylesheet" href="{{asset('css/contact_page.css')}}">

@section('content')
<!-- Search Bar with Two Dropdowns -->
<div class="container-fluid mt-4">
    <!-- Changed to container-fluid for full-width -->
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Full-width column -->
            <form action="#" method="GET">
                <div class="d-flex shadow-lg p-4 rounded-4 w-100" style="background-color: #f4f7f6; gap: 15px;">
                    <!-- Full-width form container -->
                    <!-- First Dropdown Input (With Border) -->
                    <select class="form-select border-0 p-3 me-2" aria-label="Filter options"
                        style="background-color: #ffffff; color: #333; border: 1px solid #948E8E; border-radius: 8px;">
                        <option selected>All Entry</option>
                        <option value="1">Customer</option>
                        <option value="2">Supplier</option>
                        <option value="3">VIP</option>
                        <option value="4">Friends</option>
                        <option value="5">Unspecified</option>
                        <option value="6">Address</option>
                        <option value="7">Contact No</option>
                    </select>
                    <!-- Second Dropdown Input (Rounded) -->
                    <select class="form-select border-0 p-3 me-2" aria-label="Sort options"
                        style="background-color: #ffffff; color: #333; border: 1px solid #948E8E; border-radius: 5px;">
                        <option selected>Sort By</option>
                        <option value="1">Default</option>
                        <option value="2">Alphabetical</option>
                        <option value="3">Ascending</option>
                        <option value="4">Descending</option>
                    </select>

                    <!-- Search Input (With Space) -->
                    <input type="text" class="form-control border-0 p-3" placeholder="Search contacts..."
                        aria-label="Search contacts" aria-describedby="search-button"
                        style="background-color: #ffffff; border: 1px solid #948E8E; border-radius: 5px 0 0 5px;">

                    <!-- Search Button (Aligned) -->
                    <button class="btn btn-primary p-3" type="submit" id="search-button"
                        style="background-color: #007bff; border-color: #007bff; border-radius: 0 10px 10px 0;">
                        <i class="fa-solid fa-magnifying-glass text-white"></i>
                    </button>
                    <x-bladewind::button onclick="showModal('add_contact_modal')">
                        Add New
                    </x-bladewind::button>

                    <!-- Print Button -->
                    <button class="btn btn-info p-2 text-white" type="button"
                        style="background-color:rgb(131, 137, 138); border-color: rgb(131, 137, 138); border-radius: 5px;">
                        <i class="fa fa-print"></i>Print
                    </button>
                </div>
            </form>
        </div>
        <!-- Styled Contacts Table -->
        <div class="responsive-table w-full p-3 rounded-md shadow border border-gray-200"
            style="height:85vh; overflow-y: auto;">
            <div style="max-height: 75vh; overflow-y: auto;">
                <table class="w-full border-collapse bg-white">
                    <thead>
                        <tr class="bg-white text-gray-700 shadow-md uppercase text-sm">
                            <th class="px-4 py-3 text-left" style="width: 33.33%;">ID</th>
                            <th class="px-4 py-3 text-left" style="width: 33.33%;">Name</th>
                            <th class="px-4 py-3 text-center" style="width: 33.33%;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="contactsTable" class="overflow-y-auto" style="height: 32rem;">
                        <!-- Example Contact Row -->
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">001</td>
                            <td class="px-4 py-2">John Doe</td>
                            <td class="px-4 py-2 text-center">
                                <button
                                    class="bg-blue-500 text-white px-3 py-1 rounded-md shadow hover:bg-blue-600">View
                                    Details</button>
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded-md shadow hover:bg-red-600 ml-2">Delete</button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">002</td>
                            <td class="px-4 py-2">Jane Smith</td>
                            <td class="px-4 py-2 text-center">
                                <button
                                    class="bg-blue-500 text-white px-3 py-1 rounded-md shadow hover:bg-blue-600">View
                                    Details</button>
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded-md shadow hover:bg-red-600 ml-2">Delete</button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">003</td>
                            <td class="px-4 py-2">Michael Johnson</td>
                            <td class="px-4 py-2 text-center">
                                <button
                                    class="bg-blue-500 text-white px-3 py-1 rounded-md shadow hover:bg-blue-600">View
                                    Details</button>
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded-md shadow hover:bg-red-600 ml-2">Delete</button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">004</td>
                            <td class="px-4 py-2">Emily Davis</td>
                            <td class="px-4 py-2 text-center">
                                <button
                                    class="bg-blue-500 text-white px-3 py-1 rounded-md shadow hover:bg-blue-600">View
                                    Details</button>
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded-md shadow hover:bg-red-600 ml-2">Delete</button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">005</td>
                            <td class="px-4 py-2">William Brown</td>
                            <td class="px-4 py-2 text-center">
                                <button
                                    class="bg-blue-500 text-white px-3 py-1 rounded-md shadow hover:bg-blue-600">View
                                    Details</button>
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded-md shadow hover:bg-red-600 ml-2">Delete</button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">006</td>
                            <td class="px-4 py-2">Joshua Catigan</td>
                            <td class="px-4 py-2 text-center">
                                <button
                                    class="bg-blue-500 text-white px-3 py-1 rounded-md shadow hover:bg-blue-600">View
                                    Details</button>
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded-md shadow hover:bg-red-600 ml-2">Delete</button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">007</td>
                            <td class="px-4 py-2">Rhey Tigtig</td>
                            <td class="px-4 py-2 text-center">
                                <button
                                    class="bg-blue-500 text-white px-3 py-1 rounded-md shadow hover:bg-blue-600">View
                                    Details</button>
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded-md shadow hover:bg-red-600 ml-2">Delete</button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">008</td>
                            <td class="px-4 py-2">Jhoedhen Salera</td>
                            <td class="px-4 py-2 text-center">
                                <button
                                    class="bg-blue-500 text-white px-3 py-1 rounded-md shadow hover:bg-blue-600">View
                                    Details</button>
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded-md shadow hover:bg-red-600 ml-2">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Section --}}
@include('modals.add_contacts')
@endsection