{{-- resources\views\modals\add_products.blade.php --}}
<x-bladewind.modal name="add_products_modal" size="xl" title="Add Products" show_action_buttons="false">

  <form id="addProductForm">
    @csrf
    <div class="grid grid-cols-2 gap-2 mb-3">
      <div class="flex gap-1">
        <x-bladewind.input label="P-SeQ #" name="pcode" id="pcode" readonly="true" />
        <x-bladewind.input label="BarCode" name="barcode" id="barcode" readonly="true" />
        <x-bladewind.input label="P-Special Code" name="pscode" id="pscode" />
      </div>
      <div class="block">
        <x-bladewind.input label="Product Brand|Name or Description| Metrics(gram,kls,etc.)|Type" name="pbrand"
          id="pbrand" autocomplete="off" />
      </div>
    </div>
    <div class="grid grid-cols-6 gap-2 mb-3">
      <!-- Drop Unit -->
      <select name="dropUnit" id="dropUnit" class="dropdown w-full">
        <option value="">S-Unit</option>
        <option value="PCS">PCS</option>
        <option value="BOX">BOX</option>
        <option value="KLS">KLS</option>
        <option value="LTR">LTR</option>
        <option value="SET">SET</option>
        <option value="CTN">CTN</option>
        <option value="PCK">PCK</option>
      </select>

      <!-- Drop Type -->
      <select name="dropType" id="dropType" class="dropdown w-full">
        <option value="">P-Type</option>
        <option value="NO SERIAL">NO SERIAL</option>
        <option value="W/SERIAL">W/SERIAL</option>
        <option value="W/EXPIRY">W/EXPIRY</option>
        <option value="TITLE/PACK">TITLE/PACK</option>
      </select>

      <!-- Main Category -->
      <select name="dropMainCat" id="dropMainCat" class="dropdown w-full">
        <option value="">Main Category</option>
        <option value="HARDWARE">HARDWARE</option>
        <option value="FOOD">FOOD</option>
        <option value="MEDICINE">MEDICINE</option>
        <option value="NAILS">NAILS</option>
        <option value="DRINKS">DRINKS</option>
        <option value="BREAD">BREAD</option>
        <option value="ACCESSORIES">ACCESSORIES</option>
      </select>

      <!-- Sub-Category -->
      <select name="dropSubCat" id="dropSubCat" class="dropdown w-full">
        <option value="">Sub-Category</option>
        <option value="empty">-</option>
      </select>

      <!-- Sub Seller -->
      <select name="dropSubSell" id="dropSubSell" class="dropdown w-full">
        <option value="">Sub Seller/Concessionaire</option>
        <option value="MAINSTORE">MAINSTORE</option>
        <option value="SELLER2">SELLER 2</option>
      </select>

      <!-- Sources -->
      <select name="dropSources" id="dropSources" class="dropdown w-full">
        <option value="">Sources/Supplier</option>
        <option value="empty">_</option>
      </select>
    </div>

    <div class="grid grid-cols-6 gap-2 mb-3">
      <!-- Drop Reorder Level -->
      <select name="dropLevel" id="dropLevel" class="dropdown col-span-2 w-full">
        <option value="">Reorder Level</option>
        <option value="one">1</option>
        <option value="five">5</option>
        <option value="ten">10</option>
        <option value="twenty">20</option>
      </select>

      <select name="dropWarranty" id="dropWarranty" class="dropdown col-span-2 w-full">
        <option value="">Warranty Period</option>
        <option value="none">N/A</option>
        <option value="1day">1 DAY</option>
        <option value="3days">3 DAYS</option>
        <option value="5days">5 DAYS</option>
        <option value="1week">1 WEEK</option>
        <option value="1month">1 MONTH</option>
        <option value="2months">2 MONTHS</option>
        <option value="3months">3 MONTHS</option>
      </select>
      <div class="col-span-2 flex items-center">
        <x-bladewind.input label="Costing Capital Price" name="costingprice" id="constingprice" autocomplete="off" />
      </div>
    </div>

    <!-- Regular/Retail Selling Container -->
    <div class="col-span-3 p-3 border rounded-lg">
      <h3 class="font-semibold mb-2">Regular/Retail Selling</h3>

      <div class="grid grid-cols-2 gap-3">
        <!-- Markup Container -->
        <div class="p-2 border rounded-lg">
          <h4 class="font-medium mb-1">Markup</h4>
          <div class="flex gap-2">
            <x-bladewind.input name="retail_markup" id="retail_markup" />
            <select name="retail_type" id="retail_type" class="dropdown">
              <option value="percent">%</option>
              <option value="fixed">Cur</option>
              <option value="fixed">Amt</option>
            </select>
          </div>
        </div>

        <!-- Price Container -->
        <div class="p-2 border rounded-lg">
          <h4 class="font-medium mb-1">Price</h4>
          <x-bladewind.input name="selling_price" id="selling_price" placeholder="Enter price" />
        </div>
      </div>
    </div>
    <!-- Special/Wholesale Container -->
    <div class="col-span-3 p-3 border rounded-lg">
      <h3 class="font-semibold mb-2">Special/Wholesale</h3>

      <div class="grid grid-cols-2 gap-3">
        <!-- Markup Container -->
        <div class="p-2 border rounded-lg">
          <h4 class="font-medium mb-1">Markup</h4>
          <div class="flex gap-2">
            <x-bladewind.input name="special_markup" id="special_markup" placeholder=" " />
            <select name="special_type" id="special_type" class="dropdown">
              <option value="percent">%</option>
              <option value="fixed">Cur</option>
              <option value="fixed">Amt</option>
            </select>
          </div>
        </div>
        <!-- Price Container -->
        <div class="p-2 border rounded-lg">
          <h4 class="font-medium mb-1">Price</h4>
          <x-bladewind.input name="selling_price" id="selling_price" placeholder="Enter price" />
        </div>
      </div>
    </div>
    <!-- Promotion Container -->
    <div class="col-span-3 p-3 border rounded-lg mb-3">
      <h3 class="font-semibold mb-2">Promotion</h3>

      <div class="grid grid-cols-2 gap-3">
        <!-- Markup Container -->
        <div class="p-2 border rounded-lg">
          <h4 class="font-medium mb-1">Markup</h4>
          <div class="flex gap-2">
            <x-bladewind.input name="promotion_value" id="promotion_value" placeholder=" " />
            <select name="promotion_type" id="promotion_type" class="dropdown">
              <option value="percent">%</option>
              <option value="fixed">Cur</option>
              <option value="fixed">Amt</option>
            </select>
          </div>
        </div>

        <!-- Price Container -->
        <div class="p-2 border rounded-lg">
          <h4 class="font-medium mb-1">Price</h4>
          <x-bladewind.input name="selling_price" id="selling_price" placeholder="Enter price" />
        </div>
      </div>
    </div>

    <div class="flex justify-end gap-2">
      <x-bladewind.button can_submit="true" size="tiny" class="w-44">Add</x-bladewind.button>
      <x-bladewind.button size="tiny" color="gray" onclick="closeProductModal()" class="w-44">Close
      </x-bladewind.button>
    </div>
  </form>
</x-bladewind.modal>
