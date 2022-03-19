<div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
<div class="br-sideleft sideleft-scrollbar">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <ul class="br-sideleft-menu">
        <li class="br-menu-item">
            <a href="{{route('admin.dashboard')}}" class="br-menu-link active">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">Dashboard</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Product Management</label>

        {{--   brand starts     --}}
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Manage Brands</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{route('brand.create')}}" class="sub-link">Create Brand</a></li>
                <li class="sub-item"><a href="{{route('brand.manage')}}" class="sub-link">Manage Brands</a></li>
            </ul>
        </li>
        {{--   brand ends     --}}

        {{--   category starts     --}}
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Manage Categories</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{route('category.create')}}" class="sub-link">Create Category</a></li>
                <li class="sub-item"><a href="{{route('category.manage')}}" class="sub-link">Manage Categories</a></li>
            </ul>
        </li>
        {{--   category ends     --}}

        {{--   product starts     --}}
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Manage Products</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{route('product.create')}}" class="sub-link">Create Product</a></li>
                <li class="sub-item"><a href="{{route('product.manage')}}" class="sub-link">Manage Product</a></li>
            </ul>
        </li>
        {{--   product ends     --}}


        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Location Settings</label>
        {{--   division starts     --}}
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Manage Divisions</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{route('division.create')}}" class="sub-link">Create Division</a></li>
                <li class="sub-item"><a href="{{route('division.manage')}}" class="sub-link">Manage Divisions</a></li>
            </ul>
        </li>
        {{--   division ends     --}}


        {{--   district starts     --}}
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Manage Districts</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{route('district.create')}}" class="sub-link">Create District</a></li>
                <li class="sub-item"><a href="{{route('district.manage')}}" class="sub-link">Manage Districts</a></li>
            </ul>
        </li>
        {{--   district ends     --}}

        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Order Management</label>
         {{--   order management starts     --}}
         <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Manage Orders</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{route('order.manage')}}" class="sub-link">Manage Orders</a></li>
            </ul>
        </li>
        {{--   district ends     --}}

    </ul><!-- br-sideleft-menu -->

    {{--    <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Information Summary</label>--}}


    <br>
</div><!-- br-sideleft -->
