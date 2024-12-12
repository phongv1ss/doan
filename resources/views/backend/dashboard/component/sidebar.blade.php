<base href="{{ config('app.url') }}">
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Phongv1</strong>
                         </span> <span class="text-muted text-xs block">Admin<b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{route('auth.logout')}}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li class="active">
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Quản Lý User</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('user.index') }}">QL USER</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="#"><i class="fa-solid fa-shirt"></i> <span class="nav-label ">Quản Lý Sản Phẩm</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('Product.index') }}">Quản Lý Sản Phẩm</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="#"><i class="fa fa-cart-plus"></i> <span class="nav-label ">Quản Lý Đơn Hàng</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('Order.index') }}">Quản Lý đơn hàng</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="#"><i class="fa fa-cart-plus"></i> <span class="nav-label ">Quản Lý Danh Mục</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('Category.index') }}">Quản Lý Danh Mục</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="{{ route('shop.index') }}"><i class="fa fa-cart-plus"></i> <span class="nav-label ">Trang Bán Hàng</span></a>
            </li>
        </ul>

    </div>
</nav>




<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
