{{-- resources\views\pages\product_list.blade.php --}}
@extends('layouts.main_layout')

@section('title', "Product List - Page")

@section('content')
<div class="shadow-md p-3 bg-white rounded">
  <div class="w-full flex justify-between items-center">

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
      <x-bladewind.button icon="plus" size="small" class="w-32" onclick="showModal('')">Add New
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
              <a href="#" class="flex items-center gap-1 px-4 py-1 text-gray-700 text-sm hover:bg-gray-100">
                <!-- Mass Price Update Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                  stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11M9 21V3m0 18l-6-6m6 6l6-6"></path>
                </svg>
                Mass Price Update
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center gap-2 px-4 py-2 text-gray-700 text-sm hover:bg-gray-100">
                <!-- Package Item Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                  stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25h18M3 12h18M3 15.75h18"></path>
                </svg>
                Package Item
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center gap-2 px-4 py-2 text-gray-700 text-sm hover:bg-gray-100">
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
              <a href="#" class="flex items-center gap-2 px-4 py-2 text-gray-700 text-sm hover:bg-gray-100">
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

{{-- Filter Container --}}
<div class="w-full flex items-center gap-2 mt-3">

  <div class="w-36">
    <label for="dropProdUnit" class="text-sm">Unit:</label>
    <select name="dropProdUnit" id="dropProdUnit" class="dropdown h-10 cursor-pointer">
      <option selected>Select Unit</option>
        @foreach ($itemunits as $itemunit)
          <option value="{{ $itemunit->unitcode }}">{{ $itemunit->pname }}</option>
        @endforeach
    </select>
  </div>

  <div class="w-44">
    <label for="dropProdCategory" class="text-sm">Category:</label>
    <select name="dropProdCategory" id="dropProdCategory" class="dropdown h-10 cursor-pointer">
      <option selected>Select Category</option>
      @foreach ($categories as $category)
        <option value="{{ $category->unitcode }}">{{ $category->pname }}</option>
      @endforeach
    </select>
  </div>

  <div class="w-52">
    <label for="dropProdSubCategory" class="text-sm">Sub-Category:</label>
    <select name="dropProdSubCategory" id="dropProdSubCategory" class="dropdown h-10 cursor-pointer">
      <option selected>Select Sub-Category</option>
      @foreach ($subcategories as $subcategory)
        <option value="{{ $subcategory->unitcode }}">{{ $subcategory->pname }}</option>
      @endforeach
    </select>
  </div>

</div>

<div class="table-container shadow">
  <div class="table-wrapper shadow-md">
    <table class="table-responsive">
      <thead class="shadow">
        <tr>
          <th style="width: 8rem;">####</th>
          <th style="width: 10rem;">Barcode</th>
          <th style="width: 22rem;">Products & Services</th>
          <th style="width: 10rem;">Unit</th>
          <th style="width: 10rem;">Costing</th>
          <th style="width: 10rem;">Reg Price</th>
          <th style="width: 10rem;">Wholesale</th>
          <th style="width: 10rem;">Promo</th>
          <th style="width: 13rem;">Categories</th>
          <th style="width: 15rem;">Sub-Categories</th>
          <th style="width: 10rem;">Seller</th>
          <th style="width: 10rem;">Supplier</th>
          <th style="width: 10rem;">Warranty</th>
          <th style="width: 10rem;">C-Level</th>
          <th style="width: 10rem;">P-Type</th>
          <th style="width: 10rem;">R Markup</th>
          <th style="width: 10rem;">RMT</th>
          <th style="width: 10rem;">RMT+ Amt</th>
          <th style="width: 10rem;">W-Markup</th>
          <th style="width: 10rem;">Wmt</th>
          <th style="width: 10rem;">WM+ Amt</th>
          <th style="width: 10rem;">P-Markup</th>
          <th style="width: 10rem;">Pmt</th>
          <th style="width: 10rem;">PM+ Amt</th>
          <th style="width: 12rem;">Date Registered</th>
          <th style="width: 10rem;">VTseq</th>
          <th style="width: 10rem;">SPCode</th>
        </tr>
      </thead>
      <tbody id="productListTable">

      </tbody>
    </table>
  </div>
</div>

{{-- Scripts Compiled --}}
<script src="{{asset('js/page/product-list.js')}}"></script>
@endsection