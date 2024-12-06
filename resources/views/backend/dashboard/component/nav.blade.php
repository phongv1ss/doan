<base href="{{ config('app.url') }}">
<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Welcome to 2Phong Admin</span>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i>  
                    <!-- Hiển thị tổng số đơn hàng -->
                    <span class="label label-primary">{{ $totalOrders }}</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <!-- Lặp qua các đơn hàng (nếu cần hiển thị chi tiết) -->
                    @foreach ($orders as $order)
                        <li>
                            <a href="{{ route('Order.View', ['id' => $order->id]) }}">
                                <div>
                                    <i class="fa fa-shopping-cart fa-fw"></i> Đơn hàng #{{ $order->id }}
                                    <span class="pull-right text-muted small">{{ $order->created_at->diffForHumans() }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    @endforeach
                    <li>
                        <div class="text-center link-block">
                            <a href="{{ route('Order.index') }}">
                                <strong>Xem tất cả đơn hàng</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            
            
            <li>
                <a href="{{route('auth.logout')}}">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
            
        </ul>
    </nav>
</div>