<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-1g-8">
        <h2>{{ $config['seo']['quanlydonhang']['title'] }}</h2>

        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active"><strong>{{ config('apps.user.quanlydonhang.title') }}</strong></li>
        </ol>
    </div>
</div>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" value="" id="checkAll" class="input-checkbox">
        </th>
        <th class="text-center">Mã Đơn Hàng</th>
        <th class="text-center">Tên Khách Hàng</th>
        <th class="text-center">Email</th>
        <th class="text-center">Ngày Đặt Hàng</th>
        <th class="text-center">Tổng Giá Trị</th>
        <th class="text-center">Trạng Thái</th> 
        <th class="text-center">Thao Tác</th>
    </tr>
    </thead>
    <tbody>
        @if(isset($data) && is_object($data))
        @foreach ($data as $order)
        <tr>
            <td>
                <input type="checkbox" value="" class="input-checkbox checkboxItem">
            </td>
            <td>
                {{ $order->order_id }}
            </td>
            <td>
                {{ $order->customer_name }}
            </td>
            <td>
                {{ $order->customer_email }}
            </td>
            <td>
                {{ $order->order_date }}
            </td>
            <td>
                {{ number_format($order->total_price, 0, ',', '.') }} VNĐ
            </td>
            <td> 
                {{ $order->status }}
            </td>
            <td class="text-center">
                <a href="{{ route('Order.View', ['id' => $order->order_id]) }}" class="btn btn-primary">Xem</a>
                <form action="{{ route('Order.delete', ['id' => $order->order_id]) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

{{ $data->links('pagination::bootstrap-4') }}

<style>
    .active-bg {
        background-color: #7ed9a7 !important;
    }
    .pagination {
        margin-bottom: 40px;
    }
    #checkAll:checked ~ tbody tr {
        background-color: #7ed9a7 !important;
    }
</style>
