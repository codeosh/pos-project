{{-- resources\views\pages\new_item.blade.php --}}
@extends('layouts.main_layout')

@section('title', 'Item-Category - POS')

@section('content')
<div class="shadow-md p-3 bg-white rounded flex items-center justify-between">
    <!-- Search Input (Left) -->
    <div class="relative w-60">
        <x-bladewind.input class="pl-10 h-10" placeholder="Search..." />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2">
            <path fill-rule="evenodd"
                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                clip-rule="evenodd" />
        </svg>
    </div>

    <!-- Form (Right) -->
    <form id="addItemCategoryForm" class="flex items-center gap-2" autocomplete="off">
        @csrf

        <x-bladewind.input placeholder="Code" class="w-32" />
        <x-bladewind.input placeholder="Description" class="w-64" />

        <x-bladewind.button icon="plus" size="small" class="w-32">Add New</x-bladewind.button>
        <x-bladewind.button icon="printer" size="small" color="gray" class="w-32">Print</x-bladewind.button>
    </form>
</div>

<div class="table-container shadow">
    <div class="table-wrapper shadow-md">
        <table class="table-responsive">
            <thead class="shadow">
                <th style="width: 12rem;">Unit Code</th>
                <th>Description</th>
                <th style="width: 15rem;">Action</th>
            </thead>
            <tbody id="itemCategoryTable">

            </tbody>
        </table>
    </div>
</div>

{{-- Scripts Compiled --}}
<script src="{{asset('js/page/item-category.js')}}"></script>
@endsection