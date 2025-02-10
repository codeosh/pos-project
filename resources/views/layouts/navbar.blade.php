{{-- resources\views\layouts\navbar.blade.php --}}
<div class="navbar-header">
    <div class="logo-container">
        <button id="menu-bars">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>


    <x-bladewind::dropmenu>

        <x-slot:trigger>
            <div class="flex space-x-2 items-center rounded-md">
                <div class="profile-container">
                    <div class="avatar-container">
                        <img src="{{asset('images/pictures/Nitro-wallpaper.jpg')}}" alt="Profile Picture">
                    </div>
                    <div class="user-info">
                        <p class="user-name">Derek Catigan</p>
                        <p class="user-role">Admin</p>
                    </div>
                    <div>
                        <x-bladewind.icon name="chevron-down" class="!h-4 !w-4" />
                    </div>
                </div>
            </div>
        </x-slot:trigger>

        <x-bladewind::dropmenu-item header="true">
            <div class="grow">
                <div><strong>Derek Catigan</strong></div>
                <div class="text-sm">admin@email.com</div>
            </div>
        </x-bladewind::dropmenu-item>

        <x-bladewind::dropmenu-item divider />

        <x-bladewind::dropmenu-item icon="user">
            Your Profile
        </x-bladewind::dropmenu-item>

        <x-bladewind::dropmenu-item divider />

        <x-bladewind::dropmenu-item hover="false">
            <x-bladewind.button color="purple" radius="small" size="small" class="w-full" id="logoutBtn">
                Sign Out
            </x-bladewind.button>
        </x-bladewind::dropmenu-item>

    </x-bladewind::dropmenu>
</div>