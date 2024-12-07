<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h1>Xin chào {{ $orderDetails['name'] }}</h1>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Dưới đây là thông tin đơn hàng của bạn:</p>

    <h3>Thông tin khách hàng:</h3>
    <ul>
        <li><strong>Họ và tên:</strong> {{ $orderDetails['name'] }}</li>
        <li><strong>Email:</strong> {{ $orderDetails['email'] }}</li>
        <li><strong>Số điện thoại:</strong> {{ $orderDetails['phone'] }}</li>
        <li><strong>Địa chỉ:</strong> {{ $orderDetails['address'] }}</li>
    </ul>

    <h3>Chi tiết đơn hàng:</h3>
    <table border="1" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails['cart'] as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ number_format($product['price'], 0, ',', '.') }}đ</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>{{ number_format($product['price'] * $product['quantity'], 0, ',', '.') }}đ</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">Phí vận chuyển</td>
                <td>{{ number_format(30000, 0, ',', '.') }}đ</td>
            </tr>
            <tr>
                <td colspan="3"><strong>Tổng cộng</strong></td>
                <td><strong>{{ number_format($orderDetails['total'], 0, ',', '.') }}đ</strong></td>
            </tr>
        </tbody>
    </table>

    <p>Chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận đơn hàng.</p>
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
</body>
</html>
