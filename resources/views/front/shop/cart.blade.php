<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web 2Phong</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="frontend/css/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="frontend/css/css/style1.css" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="front/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i></a></li>
            </ul>
            
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="front/img/language_VN.png" alt="">
                <div>Tiếng Việt</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Tiếng Anh</a></li>
                    <li><a href="#">Tiếng Việt</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('shop.index') }}">Trang chủ</a></li>
                <li><a href="./shop-grid.html">Mua sắm</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                    </ul>
                </li>
                <li><a href="./contact.html">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@phamhongphong101103@gmail.com</li>
                <li>Web bán đồ đỉnh cao nhất VN</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@phamhongphong101103@gmail.com</li>
                                <li>Web bán đồ đỉnh cao nhất VN</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://www.facebook.com/phamhongphong.vim/"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/phamhongphong.vim/"><i class="fa fa-instagram"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="front/img/language_VN.png" alt="">
                                <div>Tiếng Việt</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Tiếng Anh</a></li>
                                    <li><a href="#">Tiếng Việt</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('shop.index') }}"><h2 style="color: #7fad39 ;font-weight: 700;">Web 2Phong</h2></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('shop.index') }}">Trang chủ</a></li>
                            <li><a href="{{ route('shop.grid') }}">Mua sắm</a></li>
                            <li><a href="./contact.html">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>

                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                        
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

 <!-- Hero Section Begin -->
 <section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{ route('products.search') }}" method="GET">
                            <input type="text" name="query" placeholder="Tìm Kiếm sản phẩm?">
                            <button type="submit" class="site-btn">Tìm kiếm</button>
                        </form>
                    </div>                                               
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>0915780270</h5>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="hero__item set-bg" data-setbg="front/img/hero/banner1.jpg">
            <div class="hero__text">
                <span>Sản phẩm mới</span>
                <h2>Web <br />2Phong</h2>
                <a href="{{ route('shop.grid') }}" class="primary-btn">Khám phá ngay</a>
            </div>
        </div> --}}
    </div>
</section>
<!-- Hero Section End -->

{{-- <div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h4>Danh sách sản phẩm</h4>
        </div>
        <div class="card-body">
            @if($cartItems->isEmpty())
                <p>Giỏ hàng của bạn hiện đang trống!</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" style="width: 50px;">
                                    {{ $item->product->name }}
                                </td>
                                <td>
                                    <input type="number" value="{{ $item->quantity }}" min="1" class="form-control w-50">
                                </td>
                                <td>{{ number_format($item->product->price) }}đ</td>
                                <td>{{ number_format($item->product->price * $item->quantity) }}đ</td>
                                <td>
                                    <button class="btn btn-sm btn-danger">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div> --}}
{{-- <section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Giỏ hàng của bạn</h2>
                @if(session()->has('cart') && count(session('cart')) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>  <!-- Thêm cột cho hình ảnh -->
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('cart') as $product_id => $details)
                                <tr>
                                    <td><img src="{{ asset($details['image']) }}" alt="{{ $details['name'] }}" width="50" height="50"></td>  <!-- Hiển thị hình ảnh sản phẩm -->
                                    <td>{{ $details['name'] }}</td>
                                    <td>{{ number_format($details['price'], 0, ',', '.') }}đ</td>
                                    <td>{{ $details['quantity'] }}</td>
                                    <td>{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tổng tiền và nút thanh toán -->
                            <div class="cart-total">
                                <p><strong>Tổng tiền: </strong>{{ number_format(array_sum(array_column(session('cart'), 'price')), 0, ',', '.') }}đ</p>
                                <a href="" class="btn btn-primary">Thanh toán</a> <!-- Nút thanh toán -->
                            </div>
                        </div>
                    </div>
                @else
                    <p>Giỏ hàng của bạn hiện tại trống.</p>
                @endif
            </div>
        </div>
    </div>
</section> --}}
<<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Giỏ hàng của bạn</h2>
                @if(session()->has('cart') && count(session('cart')) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th>Hành động</th> <!-- Thêm cột hành động -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('cart') as $product_id => $details)
                                <tr>
                                    <td><img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" width="50" height="50"></td>
                                    <td>{{ $details['name'] }}</td>
                                    <td>{{ number_format($details['price'], 0, ',', '.') }}đ</td>
                                    <td>{{ $details['quantity'] }}</td>
                                    <td>{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}đ</td>
                                    <td>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product_id }}">
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Ô tổng tiền và nút thanh toán -->
                    <div class="cart-summary" style="margin-top: 20px; padding: 20px; background-color: #f8f8f8; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center; justify-content: space-between;">
                        <div class="cart-total">
                            <p style="margin: 0;">
                                <strong>Tổng tiền:</strong> 
                                {{ number_format(array_sum(array_map(function($details) {
                                    return $details['price'] * $details['quantity'];
                                }, session('cart'))), 0, ',', '.') }}đ
                            </p>
                        </div>
                        <div class="cart-checkout">
                            <a href="#" class="btn btn-primary" style="background-color: #7fad39">Thanh toán</a>
                        </div>
                    </div>
                @else
                    <p>Giỏ hàng của bạn hiện tại trống.</p>
                @endif
            </div>
        </div>
    </div>
</section>





    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ route('shop.index') }}"><h1 style="color: #7fad39 ;font-weight: 700;">Web 2 Phong</h1></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: 180 Cao lỗ, phường 4, quận 8, thành phố Hồ Chí Minh</li>
                            <li>SĐT: 0915780270</li>
                            <li>Email: phamhongphong101103@gmail.com</li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <!-- <h6>Useful Links</h6> -->
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="https://www.facebook.com/phamhongphong.vim/"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/phamhongphong.vim/"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="frontend/js/js/jquery-3.3.1.min.js"></script><script src="frontend/js/js/bootstrap.min.js"></script>
    <script src="frontend/js/js/jquery.nice-select.min.js"></script><script src="frontend/js/js/jquery-ui.min.js"></script>
    <script src="frontend/js/js/jquery.slicknav.js"></script><script src="frontend/js/js/mixitup.min.js"></script>
    <script src="frontend/js/js/owl.carousel.min.js"></script><script src="frontend/js/js/main.js"></script>
</body>
</html>