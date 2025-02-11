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

        .search-container {
            width: 100%;
        }

        #searchInput {
            width: 100%;
        }
    }
</style>

@section('content')
<div class="m-5 p-5 rounded-md shadow bg-white">

    <!-- Inputs & Search Bar -->
    <div class="input-container flex justify-between items-center w-full gap-4 overflow-hidden">
        <!-- Search Input (Left) -->
        <div class="search-container flex flex-col">
            <label for="searchInput" class="text-gray-700 font-medium">Search</label>
            <input type="text" placeholder="Search..." class="w-52 h-10 border rounded px-2 mt-1" id="searchInput">
        </div>

        <!-- Input Fields & Buttons (Right) -->
        <div class="input-group flex items-center gap-2">
            <input type="text" class="border rounded px-2 h-10 w-40 mt-5" placeholder="Code">
            <input type="text" class="border rounded px-2 h-10 w-72 mt-5" placeholder="Description">
            <button class="addBtn bg-blue-500 text-white px-4 py-2 rounded w-28 mt-5">Add</button>
            <button class="resetBtn bg-gray-500 text-white px-4 py-2 rounded w-28 mt-5">Reset</button>
        </div>
    </div>

    <!-- Table -->
    <div class="responsive-table w-full rounded-md shadow mt-2 overflow-hidden">
        <x-bladewind::table id="dataTable">
            <x-slot name="header">
                <th style="width: 12rem;">Code</th>
                <th>Description</th>
            </x-slot>
            <tr>
                <td>Alfred Rowe</td>
                <td>Outsourcing</td>
            </tr>
            <tr>
                <td>Michael K. Ocansey</td>
                <td>Tech</td>
            </tr>
        </x-bladewind::table>
    </div>
</div>
@endsection