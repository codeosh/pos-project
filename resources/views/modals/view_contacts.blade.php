<x-bladewind.modal name="view_contact_modal" size="xl" title="Add Contact" show_action_buttons="false">

    <form id="ViewContactForm" autocomplete="off">
        @csrf
        <div class="grid grid-cols-2 gap-2 mb-3">
            <div class="flex gap-1">
                <x-bladewind.input label="SeQ-Code" name="seqcode" id="viewseqcode" readonly="true" />
                <x-bladewind.input label="ID number" name="idnum" id="viewidnum" readonly="true" />
                <x-bladewind.input label="ID" name="idcode" id="viewidcode" readonly="true" />
            </div>
            <div class="block">
                <x-bladewind.input label="Customer/Consignee Name" name="consignee" id="viewconsignee" />
            </div>
        </div>

        <div class="grid grid-cols-1 mb-3">
            <x-bladewind.input label="Contact Person" name="contactperson" id="viewcontactperson" />
        </div>

        <div class="grid grid-cols-2 gap-2 mb-3">
            <div class="flex gap-1">
                <select name="dropGroup" id="viewdropGroup" class="dropdown">
                    <option value="">Group</option>
                    <option value="CUSTOMER">CUSTOMER</option>
                    <option value="VIP">VIP</option>
                    <option value="FRIENDS">FRIENDS</option>
                    <option value="UNSPECIFIED">UNSPECIFIED</option>
                </select>
                <x-bladewind.input label="VAT TIN (NOS.)" name="tin" id="viewtin" />
            </div>

            <!-- Terms of Payment Dropdown -->
            <div class="relative">
                <button id="viewtermsDropdownBtn" type="button"
                    class="dropdown bg-white border px-3 py-3 w-full text-left">
                    Terms of Payment
                </button>
                <div id="viewtermsDropdownMenu" class="absolute hidden bg-white border w-full mt-1 rounded shadow p-2"
                    style="z-index: 1000;">
                    <label class="block text-sm font-medium">Type</label>
                    <select name="dropTypePayment" id="viewdropTypePayment" class="dropdown w-full">
                        <option value="">Select Type</option>
                        <option value="Cash">Cash</option>
                        <option value="Gcash">Gcash</option>
                        <option value="Bank2Bank">Bank2Bank</option>
                        <option value="Check">Check</option>
                        <option value="OnSpot">OnSpot</option>
                    </select>

                    <label class="block text-sm font-medium mt-2">Days</label>
                    <select name="dropDayPayment" id="viewdropDayPayment" class="dropdown w-full">
                        <option value="">Select Days</option>
                        <option value="OnSpot">OnSpot</option>
                        <option value="BDO">BDO</option>
                        <option value="LBC">LBC</option>
                        <option value="30 Days">30 Days</option>
                        <option value="Cash">Cash</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2 mb-3">
            <x-bladewind.input label="Address" name="contactaddress" id="viewcontactaddress" />
            <x-bladewind.input label="Contact No." name="contactnum" id="viewcontactnum" numeric="true"
                show_error_inline="true" />
        </div>

        <div class="grid grid-cols-1">
            <x-bladewind::textarea placeholder="Comment" name="contactcomment" id="viewcontactcomment" />
        </div>
        <div class="flex justify-end gap-2">
            <x-bladewind.button can_submit="true" size="tiny" class="w-44">Save</x-bladewind.button>
            <x-bladewind.button size="tiny" color="gray" onclick="closeContactModal()" class="w-44">Close
            </x-bladewind.button>
        </div>
    </form>


</x-bladewind.modal>