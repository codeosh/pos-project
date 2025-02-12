<x-bladewind::modal backdrop_can_close="false" name="add_contact_modal" ok_button_label="" close_after_action="false"
    size="xl">

    <form method="post" action="" class="profile-form">
        @csrf
        <b class="mt-0">Edit Your Profile</b>
        <div class="grid grid-cols-2 gap-4 mt-6">
            <x-bladewind::input required="true" name="first_name" error_message="Please enter your first name"
                label="First name" />

            <x-bladewind::input required="true" name="last_name" error_message="Please enter your last name"
                label="Last name" />
        </div>
        <x-bladewind::input required="true" name="email" error_message="Please enter your email"
            label="Email address" />

        <x-bladewind::input numeric="true" name="mobile" label="Mobile" />

        <select name="sample" id="sample" class="dropdown">
            <option value="">option 1</option>
            <option value="">option 2</option>
            <option value="">option 3</option>
        </select>
    </form>

</x-bladewind::modal>