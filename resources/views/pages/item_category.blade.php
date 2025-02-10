{{-- resources\views\pages\item_category.blade.php --}}
@extends('layouts.main_layout')

@section('title', 'Item-Category - POS')

@section('content')
<div class="flex flex-col items-center p-3 w-full">
    <div class="flex flex-wrap items-center gap-2 pt-4 w-full justify-center">
        <div class="w-auto">
            <x-bladewind::input type="text" placeholder="Code" class="item-categoryInput code-input" />
        </div>
        <div class="w-auto">
            <x-bladewind::input type="text" placeholder="Description" class="item-categoryInput" />
        </div>
        <div class="w-auto mb-4">
            <x-bladewind::button>Add</x-bladewind::button>
            <x-bladewind::button>Reset</x-bladewind::button>
        </div>
    </div>

    {{-- Bladewind Table --}}
    <div class="mt-6 w-full max-w-4xl overflow-x-auto">
        <x-bladewind::table>
            <x-slot name="header">
                <th style="width: 12rem;">Code</th>
                <th>Description</th>
            </x-slot>
            <tr>
                <td>C1000</td>
                <td>Sample Item</td>
            </tr>
            <tr>
                <td>C1001</td>
                <td>Sample Item</td>
            </tr>
        </x-bladewind::table>
    </div>
</div>
@endsection