<x-bladewind::modal backdrop_can_close="false" name="add_contact_modal" ok_button_label="" close_after_action="true"
    size="omg" title="Add Contact" show_close_icon="true">

    <form id="addContactForm" autocomplete="off">
        @csrf
        <div class="grid grid-cols-2 gap-2 mb-3">
            <div class="flex gap-1">
                <x-bladewind.input label="SeQ-Code" readonly="true" />
                <x-bladewind.input label="ID Number" readonly="true" />
                <x-bladewind.input label="ID" readonly="true" />
            </div>
            <div class="block">
                <x-bladewind.input label="Customer/Consignee Name" />
            </div>
        </div>

        <div class="grid grid-cols-1 mb-3">
            <x-bladewind.input label="Contact Person" />
        </div>

        <div class="grid grid-cols-2 gap-2 mb-3">
            <div class="flex gap-1">
                <select name="dropGroup" id="dropGroup" class="dropdown">
                    <option value="">Group</option>
                    <option value="CUSTOMER">CUSTOMER</option>
                    <option value="VIP">VIP</option>
                    <option value="FRIENDS">FRIENDS</option>
                    <option value="UNSPECIFIED">UNSPECIFIED</option>
                </select>
                <x-bladewind.input label="VAT TIN (NOS.)" />
            </div>
            <x-bladewind.input label="Terms of Payment" />
        </div>

        <div class="grid grid-cols-2 gap-2 mb-3">
            <x-bladewind.input label="Address" />
            <x-bladewind.input label="Contact No." numeric="true" max="11" error_message="Maximum value must be 12"
                show_error_inline="true" />
        </div>

        <div class="grid grid-cols-1">
            <x-bladewind::textarea placeholder="Comment" />
        </div>
        <div class="flex justify-end">
            <x-bladewind.button can_submit="true" class="w-44">Add</x-bladewind.button>
        </div>
    </form>


</x-bladewind::modal>