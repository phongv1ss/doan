
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div class="container">
    <div class="text-center mt-5">
        <h2>Đặt hàng thành công!</h2>
        <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.</p>
        <a href="{{ route('shop.index') }}" class="btn btn-primary">Quay lại trang chủ</a>
    </div>
</div>
