<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-12">
        <h2 class="text-center text-primary mb-4">{{ $config['seo']['xemdonhang']['title'] }}</h2>

        <ol class="breadcrumb" style="margin-bottom: 20px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active"><strong>{{ config('apps.user.xemdonhang.title') }}</strong></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <!-- Tiêu đề chi tiết đơn hàng -->
        <h2>Chi tiết đơn hàng #{{ $order->order_id }}</h2>

        <!-- Thông tin khách hàng -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Thông tin khách hàng</h5>
                <p><strong>Khách hàng:</strong> {{ $order->customer_name }}</p>
                <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                <p><strong>Ngày đặt hàng:</strong> {{ $order->order_date }}</p>
            </div>
        </div>

        <!-- Chi tiết sản phẩm -->
        <h3 class="text-success">Chi tiết sản phẩm</h3>
        <table class="table table-bordered table-striped">
            <thead class="bg-light">
                <tr>
                    <th class="text-center">ID sản phẩm</th>
                    <th class="text-center">Tên sản phẩm</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Đơn giá</th>
                    <th class="text-center">Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDetails as $detail)
                <tr>
                    <td class="text-center">{{ $detail->product_id }}</td>
                    <td class="text-center">
                        @if(isset($detail->product_name))
                            {{ $detail->product_name }}
                        @else
                            <span class="text-muted">Sản phẩm không tồn tại</span>
                        @endif
                    </td>
                    <td class="text-center">{{ $detail->quantity }}</td>
                    <td class="text-right">{{ number_format($detail->price, 0, ',', '.') }} VNĐ</td>
                    <td class="text-right text-danger">{{ number_format($detail->quantity * $detail->price, 0, ',', '.') }} VNĐ</td>
                </tr>
                @endforeach
                <tr class="bg-light font-weight-bold">
                    <td colspan="2" class="text-right">Tổng cộng:</td>
                    <td class="text-center">{{ $orderDetails->sum('quantity') }}</td>
                    <td></td>
                    <td class="text-right text-danger">{{ number_format($orderDetails->sum(function($detail) { 
                        return $detail->quantity * $detail->price;
                    }), 0, ',', '.') }} VNĐ</td>
                </tr>
            </tbody>
        </table>
        <!-- Thay đổi trạng thái đơn hàng -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Thay đổi trạng thái đơn hàng</h5>
                    <form action="{{ route('Order.updateStatus', ['id' => $order->order_id]) }}" method="POST">
                        @csrf
                        @method('POST') <!-- Gửi phương thức POST -->
                        <div class="form-group">
                            <label for="status">Trạng thái đơn hàng:</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Cập Nhật</button>
                    </form>
                </div>
            </div>


        <!-- Nút Trở lại (căn phải) -->
        <div class="text-right mb-4">
            <a href="{{ route('Order.index') }}" class="btn btn-lg btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay Về
            </a>
        </div>
    </div>
</div>

<style>
     /* Nút Quay lại */
     .btn-secondary {
        font-size: 16px;
        padding: 12px 30px;
        display: inline-block;
        background-color: #1ab394;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btn-secondary i {
        margin-right: 10px;
    }

    /* Căn chỉnh nút Trở lại về phía phải */
    .text-right {
        text-align: right;
    }

    /* Cải thiện bố cục và khoảng cách */
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }

    h2, h3 {
        font-weight: bold;
        margin-bottom: 20px;
    }

    table.table {
        margin-top: 20px;
    }

    table.table th, table.table td {
        padding: 12px;
        vertical-align: middle;
    }

    table.table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    table.table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Tạo khoảng cách giữa các phần tử */
    .row {
        padding: 20px;
    }

    .col-12 {
        padding-left: 15px;
        padding-right: 15px;
    }

    /* Tạo khoảng cách dưới cùng cho nút */
    .text-right.mb-4 {
        margin-bottom: 30px; /* Điều chỉnh khoảng cách dưới */
    }

    /* Mở rộng giao diện trên màn hình lớn */
    @media (min-width: 1200px) {
        .container {
            max-width: 1100px;
        }
    }

    .text-danger {
        color: #d9534f;
        font-weight: bold;
    }

    /* Tạo khoảng cách giữa các phần tử trên giao diện nhỏ */
    @media (max-width: 767px) {
        .card-body {
            padding: 10px;
        }

        .btn-secondary {
            width: 100%;
            padding: 12px;
        }
    }
</style>
