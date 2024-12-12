<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng thành công</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 50px;
        }
        .text-center {
            text-align: center;
        }
        h2 {
            color: #28a745;
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .mt-5 {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mt-5">
            <h2>Đặt hàng thành công!</h2>
            <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-primary">Quay lại trang chủ</a>
        </div>
    </div>
</body>
</html>
