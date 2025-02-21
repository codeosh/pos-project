{{-- resources\views\pages\product_list.blade.php --}}
@extends('layouts.main_layout')

@section('title', "Product List - Page")

@section('content')
<div class="input-container shadow-md p-3 flex items-center bg-white rounded">
    <div class="input-container w-full flex justify-between items-center">
        <div class="relative w-60">
            <x-bladewind.input id="searchInput" class="pl-10 h-10" placeholder="Search..." />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2">
                <path fill-rule="evenodd"
                    d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                    clip-rule="evenodd" />
            </svg>
        </div>

        <div class="button-container flex gap-1">
            <x-bladewind.button icon="plus" size="small" class="w-32" onclick="showModal('add_contact_modal')">Add New
            </x-bladewind.button>

            <div class="relative inline-block">
                <!-- Button -->
                <x-bladewind.button id="dropdownButton" icon="bars-3" size="small" color="gray" circular="true"
                    class="flex items-center justify-center p-0">
                </x-bladewind.button>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu"
                    class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden">
                    <ul class="py-1">
                        <li>
                            <a href="#"
                                class="flex items-center gap-1 px-4 py-1 text-gray-700 text-sm hover:bg-gray-100">
                                <!-- Mass Price Update Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 10h11M9 21V3m0 18l-6-6m6 6l6-6"></path>
                                </svg>
                                Mass Price Update
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center gap-2 px-4 py-2 text-gray-700 text-sm hover:bg-gray-100">
                                <!-- Package Item Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 8.25h18M3 12h18M3 15.75h18"></path>
                                </svg>
                                Package Item
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center gap-2 px-4 py-2 text-gray-700 text-sm hover:bg-gray-100">
                                <!-- S/N Serial Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 9.75h15m-12 0V16.5m0-6.75L3 12m3-2.25l3 2.25M15 12h3m-3-2.25l-3 2.25m3-2.25l-3 2.25">
                                    </path>
                                </svg>
                                S/N Serial
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center gap-2 px-4 py-2 text-gray-700 text-sm hover:bg-gray-100">
                                <!-- Printer Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 9V3h12v6M6 15H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2m-10 0h10v6H6v-6z">
                                    </path>
                                </svg>
                                Print & Export
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/page/product-list.js')}}"></script>
@endsection