{{-- resources\views\layouts\sidebar.blade.php --}}
<div class="sidebar">
    <div class="titleSide-container p-3 flex justify-center flex-col items-center text-nowrap">
        <h5>BizmaTech - POS</h5>
        <small style="font-size: 0.6rem;"><span style="font-style: italic;">i</span> World Solutions</small>
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
                <a href="{{route('page.contact')}}"
                    class="item-links {{ Request::routeIs('page.contact') ? 'active' : '' }}">
                    <i class="fa-solid fa-phone"></i> Contacts
                </a>
            </li>
            {{-- Products Dropdown --}}
            <li class="item-list">
                <a href="#" class="item-links dropdown-btn">
                    <i class="fa-solid fa-cart-shopping"></i> Products
                    <i class="fa-solid fa-chevron-down transition-transform duration-300 ms-10"></i>
                </a>
                <ul class="dropdown-menu hidden mt-1">
                    <li class="mb-1">
                        <a href="{{route('page.productl-list')}}"
                            class="item-links {{Request::routeIs('page.productl-list') ? 'active' : ''}}">
                            <i class="fa-solid fa-box"></i> Product List
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="{{route('page.item-category')}}"
                            class="item-links {{ Request::routeIs('page.item-category') ? 'active' : '' }}">
                            <i class="fa-solid fa-list"></i> Item Category
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="{{route('page.item-units')}}"
                            class="item-links {{ Request::routeIs('page.item-units') ? 'active' : '' }}">
                            <i class="fa-solid fa-list"></i> Item Units
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="{{route('page.sub-category')}}" class="item-links {{ Request::routeIs('page.sub-category') ? 'active' : '' }}">
                            <i class="fa-solid fa-list"></i> Item Sub-Category
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>