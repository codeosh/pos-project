<x-bladewind::modal backdrop_can_close="false" name="add_contact_modal" ok_button_label="" close_after_action="false"
    size="xl">

    <form method="post" action="" class="profile-form">
        @csrf
        <b class="mt-0">Add Contact</b>
        <div class="grid grid-cols-2 gap-4 mt-6">
            <x-bladewind::input required="true" name="code" error_message="Please enter SeQ-Code"
                label="SeQ-Code" />
            <x-bladewind::input required="true" name="id_num" error_message="Please enter ID Number"
                label="[F1] ID Number" />
        </div>
        <div class="grid grid-cols-2 gap-4 mt-6">
        <x-bladewind::input required="true" name="id" error_message="Please enter ID"
            label="[F2] ID" />
        <x-bladewind::input required="true" name="costumer" error_message="Please enter"
            label="[F3] Costumer/ Consignee Name" />
        </div>
        <x-bladewind::input required="true" name="contact_person" error_message="Please enter "
            label="Contact Person" />

            <div class="grid grid-cols-3 gap-4 mt-6">  
                 
        <select name="drpGroup" id="drpGroup" class="dropdown">
            <option value="">Group</option>
            <option value="">Customer</option>
            <option value="">Supplier</option>
            <option value="">VIP</option>
            <option value="">Friends</option>
            <option value="">Unspecified</option>
        </select>
        <x-bladewind::input required="true" name="vat" error_message="Please enter ID"
            label="VAT TIN (NOS.)" />
        <x-bladewind::input required="true" name="payment" error_message="Please enter Terms of Payment"
            label="Terms of Payment" />
        </div>
        <x-bladewind::input required="true" name="address" error_message="Please enter your Address "
            label="Address" />
            <x-bladewind::input required="true" name="contact_num" error_message="Please enter your Contact No."
            label="Contact No." />
        <x-bladewind::input required="false" name="comment" error_message=""
            label="Note/Comment" />
        <x-bladewind::button onclick="showModal('save_contact')">
            Save changes
        </x-bladewind::button>
    </form>

</x-bladewind::modal>