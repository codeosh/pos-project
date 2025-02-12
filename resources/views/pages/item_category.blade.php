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
            width: 100%;
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

        .input-group input,
        .input-group button {
            margin-top: 0;
            width: 100%;
        }

        .responsive-table {
            max-height: 38rem;
            overflow-x: auto;
            overflow-y: auto;
        }
    }
</style>

@section('content')
<div class="m-3 p-5 rounded-md shadow bg-white overflow-hidden" style="height: 100vh;">

    <!-- Inputs & Search Bar -->
    <div class="input-container flex justify-between items-center w-full gap-4 mb-1">
        <!-- Search Input (Left) -->
        <div class="search-container flex flex-col">
            <label for="searchInput" class="text-gray-500 font-medium">Search</label>
            <input type="text" placeholder="Search..." class="w-52 h-10 border rounded px-2" id="searchInput">
        </div>

        <!-- Form -->
        <form id="addItemCategoryForm" class="flex justify-end" autocomplete="off">
            @csrf
            <div class="input-group flex items-center gap-2">
                <input type="text" class="border rounded px-2 h-10 w-40 mt-6" placeholder="Code" id="unitcode"
                    name="unitcode" readonly>
                <input type="text" class="border rounded px-2 h-10 w-72 mt-6" placeholder="Description" id="pname"
                    name="pname">
                <button id="addItemCategoryBtn" type="submit"
                    class="addBtn bg-blue-500 text-white px-4 py-2 rounded w-28 mt-6">
                    Add
                </button>
                <button type="reset" class="resetBtn bg-gray-500 text-white px-4 py-2 rounded w-28 mt-6">
                    Reset
                </button>
            </div>
        </form>
    </div>

    <!-- Styled Table -->
    <div class="responsive-table w-full p-3 rounded-md shadow border border-gray-200"
        style="height:85vh; overflow-y: auto;">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-white text-gray-700 shadow-md uppercase text-sm">
                    <th class="px-4 py-3 text-left" style="width: 12rem;">Unit Code</th>
                    <th class="px-4 py-3 text-left">Description</th>
                    <th class="px-4 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody id="itemCategoryTable" class="overflow-y-auto" style="height: 32rem;">

            </tbody>
        </table>
    </div>
</div>

{{-- Scripts Compiled --}}
<script src="{{asset('js/page/item-category.js')}}"></script>
@endsection