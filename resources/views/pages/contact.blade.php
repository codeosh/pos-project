{{-- resources\views\pages\contact.blade.php --}}
@extends('layouts.main_layout')

@section('title', 'Contacts - POS')

<link rel="stylesheet" href="{{asset('css/contact_page.css')}}">

@section('content')
<div class="input-container shadow-md p-3 flex items-center">
    <div class="input-container w-full flex items-center">
        <div class="relative w-60">
            <x-bladewind.input class="pl-10 h-10" placeholder="Search..." />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2">
                <path fill-rule="evenodd"
                    d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                    clip-rule="evenodd" />
            </svg>
        </div>

        <div class="filter-container flex items-center ms-2 w-full">
            <div class="w-36">
                <select class="dropdown h-10">
                    <option selected>All Entry</option>
                    <option value="Customer">Customer</option>
                    <option value="Supplier">Supplier</option>
                    <option value="VIP">VIP</option>
                    <option value="Friends">Friends</option>
                    <option value="Unspecified">Unspecified</option>
                    <option value="Address">Address</option>
                    <option value="Contact No">Contact No</option>
                </select>
            </div>
            <div class="w-36 ms-1">
                <select class="dropdown h-10">
                    <option selected>Sort By</option>
                    <option value="1">Default</option>
                    <option value="2">Alphabetical</option>
                    <option value="3">Ascending</option>
                    <option value="4">Descending</option>
                </select>
            </div>
        </div>

        <div class="button-container flex justify-end gap-1">
            <x-bladewind.button icon="plus" size="tiny" class="w-32">Add New</x-bladewind.button>
            <x-bladewind.button icon="printer" size="tiny" class="w-32">Print</x-bladewind.button>
        </div>
    </div>
</div>

<div class="table-container shadow">
    <div class="table-wrapper">
        <table class="table-responsive">
            <thead class="shadow">
                <th style="width: 12rem;">ID</th>
                <th>Name</th>
                <th style="width: 25rem;">Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>A1000</td>
                    <td>Sample Name</td>
                    <td>
                        <x-bladewind.button icon="eye" size="tiny" class="w-32">View</x-bladewind.button>
                        <x-bladewind.button icon="trash" size="tiny" class="w-32" color="red">Delete
                        </x-bladewind.button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Section --}}
@include('modals.add_contacts')
@endsection