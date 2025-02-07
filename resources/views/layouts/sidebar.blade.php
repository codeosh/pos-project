{{-- resources\views\layouts\sidebar.blade.php --}}
<div class="sidebar">
    <div class="titleSide-container p-3 flex justify-center flex-col items-center text-nowrap">
        <h5>BizmaTech - POS</h5>
        <small>i World Solutions</small>
    </div>

    <div class="sidebar-container h-screen text-nowrap">
        <ul class="side-items pt-10 ps-2 pe-2 pb-5 overflow-hidden">
            <li class="item-list">
                <a href="{{route('admin.dashboard')}}"
                    class="item-links {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-desktop"></i> Dashboard
                </a>
            </li>
            <hr class="mt-5 mb-3">
            <li class="item-list">
                <a href="#" class="item-links">
                    <i class="fa-solid fa-list"></i> Item Category
                </a>
            </li>
        </ul>
    </div>
</div>