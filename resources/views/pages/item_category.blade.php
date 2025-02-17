{{-- resources\views\pages\item_category.blade.php --}}
@extends('layouts.main_layout')

@section('title', 'Item-Category - POS')

<style>
    @media screen and (max-width: 1250px) {
        .input-container {
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
        }

        .search-container {
            width: 100% !important;
            margin-bottom: 10px;
        }

        #searchInput {
            width: 100%;
        }

        #addItemCategoryForm {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .input-group {
            flex-direction: column;
            width: 100%;
            align-items: center;
        }

        .input-group .input,
        .input-group button {
            margin-top: 0;
            width: 100%;
        }
    }
</style>

@section('content')
<div class="input-container shadow-md p-3 bg-white rounded flex items-center justify-between">
    <!-- Search Input (Left) -->
    <div class="search-container relative w-60">
        <x-bladewind.input id="searchInput" class="pl-10 h-10" placeholder="Search..." />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2">
            <path fill-rule="evenodd"
                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                clip-rule="evenodd" />
        </svg>
    </div>

    <!-- Form (Right) -->
    <form id="addItemCategoryForm" autocomplete="off">
        @csrf
        <div class="input-group flex items-center gap-2">
            <div class="input w-32">
                <x-bladewind.input size="small" placeholder="Code" id="unitcode" name="unitcode" readonly="true"
                    extra="autocomplete='off'" />
            </div>
            <div class="input w-60 me-1">
                <x-bladewind.input size="small" placeholder="Description" id="pname" name="pname"
                    extra="autocomplete='off'" />
            </div>

            <x-bladewind.button icon="plus" size="small" id="addItemCategoryBtn" can_submit="true" class="w-32">Add New
            </x-bladewind.button>
            <x-bladewind.button icon="plus" size="small" id="saveItemCategoryBtn" class="w-32">Save
            </x-bladewind.button>
            <x-bladewind.button size="small" color="gray" id="resetButton" class="w-32">Reset</x-bladewind.button>
            <x-bladewind.button size="small" color="gray" id="clearButton" class="w-32">Clear</x-bladewind.button>
        </div>
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