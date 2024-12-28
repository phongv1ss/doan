<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Web 2Phong</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('frontend/css/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/style1.css')}}" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .checkout-section {
            margin: 50px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-title h2 {
            font-size: 28px;
            font-weight: bold;
            color: #7fad39;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #7fad39;
            border: none;
        }

        .btn-primary:hover {
            background-color: #6e9230;
        }

        .order-summary {
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .order-summary h4 {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .order-total {
            font-size: 18px;
            font-weight: bold;
            color: #7fad39;
        }
    </style>
</head>

<body>
   <!-- Page Preloder -->
   <div id="preloder"><div class="loader"></div> </div>
   @if(session('success'))
<div class="alert alert-success">
   {{ session('success') }}
</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <!-- Humberger Begin -->
   <div class="humberger__menu__overlay"></div>
   <div class="humberger__menu__wrapper">
       <div class="humberger__menu__logo">
           <a href="#"><img src="front/img/logo.png" alt=""></a>
       </div>
       <div class="humberger__menu__cart">
        <ul><li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i></a></li> </ul>
           <div class="header__cart__price">giá: <span>150.000đ</span></div>
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
               <a href="{{route('auth.login')}}"><i class="fa fa-user"></i> Đăng nhập</a>
           </div>
           
       </div>
       <nav class="humberger__menu__nav mobile-menu">
           <ul>
               <li class="active"><a href="{{ route('shop.index') }}">Trang chủ</a></li>
               <li><a href="./shop-grid.html">Mua sắm</a></li>
               <li><a href="./contact.html">Liên hệ</a></li>
           </ul>
       </nav>
       <div id="mobile-menu-wrap"></div>
       <div class="header__top__right__social">
           <a href="https://www.facebook.com/phamhongphong.vim/" target="_blank" ><i class="fa fa-facebook"></i></a>
           <a href="https://www.instagram.com/phamhongphong.vim/" target="_blank" ><i class="fa fa-instagram"></i></a>
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
                   <div class="col-lg-6 col-md-6">
                       <div class="header__top__left">
                           <ul>
                               <li><i class="fa fa-envelope"></i> hello@phamhongphong101103@gmail.com</li>
                               <li>Web bán đồ đỉnh cao nhất VN</li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-6 col-md-6">
                       <div class="header__top__right">
                           <div class="header__top__right__social">
                               <a href="https://www.facebook.com/phamhongphong.vim/" target="_blank" ><i class="fa fa-facebook"></i></a>
                               <a href="https://www.instagram.com/phamhongphong.vim/" target="_blank" ><i class="fa fa-instagram"></i></a>
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
                            @if(Auth::check())
                                <a href="{{route('shop.profile')}}"><i class="fa fa-user"></i></a> 
                                <a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out"></i> Đăng xuất</a>  
                            @else
                                <a href="{{ route('auth.login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                            @endif
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
                           <li class="nav-item">
                            <a class="nav-link" href="{{ route('comment.danhgia') }}">Đánh giá</a>
                        </li>
                       </ul>
                   </nav>
               </div>
               <div class="col-lg-3">
                <div class="header__cart">
                    <style>
                        .cart-count {
                            background-color: #ff0000;
                            color: #ffffff;
                            font-size: 12px;
                            font-weight: bold;
                            border-radius: 50%;
                            padding: 2px 7px; /* Điều chỉnh padding */
                            position: absolute;
                            top: -5px; /* Điều chỉnh vị trí top */
                            right: -10px; /* Điều chỉnh vị trí right */
                            display: flex; /* Thêm flexbox để căn giữa */
                            justify-content: center; /* Căn giữa ngang */
                            align-items: center; /* Căn giữa dọc */
                            min-width: 20px; /* Đảm bảo hình tròn không bị méo */
                            height: 20px;
                        }
                    </style>
                    <ul>
                        <li>
                            <a href="{{ route('cart.index') }}" style="position: relative;">
                                <i class="fa fa-shopping-bag"></i>
                                @php
                                    $cart = session()->get('cart', []);
                                    $cartCount = array_sum(array_column($cart, 'quantity'));
                                @endphp
                                @if($cartCount > 0)
                                    <span class="cart-count">{{ $cartCount }}</span>
                                @endif
                            </a>
                        </li>
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
       </div>
   </section>
   <!-- Hero Section End -->
  <!-- Featured Section start -->
  <div class="container checkout-section">
    <div class="section-title"><h2>Thông Tin Thanh Toán</h2> </div>
    <form action="{{ route('checkout.process') }}" method="POST"><!-- Thông tin khách hàng -->
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-4">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nhập họ và tên" required>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email" required>
                </div>
                <div class="mb-4">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <textarea id="address" name="address" class="form-control" rows="3" placeholder="Nhập địa chỉ giao hàng" required></textarea>
                </div>
            </div>
<div class="col-lg-4"><!-- Tóm tắt đơn hàng -->
    <div class="order-summary">
        <h4>Tóm Tắt Đơn Hàng</h4>
        <ul class="list-group">
            @if(!empty($cart) && count($cart) > 0)
                @foreach($cart as $product_id => $details)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $details['name'] }}
                        <span>{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}đ</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Phí vận chuyển<span>{{ number_format(30000, 0, ',', '.') }}đ</span></li>
                <li class="list-group-item d-flex justify-content-between align-items-center order-total">
                    Tổng cộng
                    <span>
                        {{ number_format(
                            array_sum(array_map(function($details) {return $details['price'] * $details['quantity'];
                            }, $cart)) + 30000, 0, ',', '.' ) }}đ
                    </span>
                </li>
            @else
                <li class="list-group-item d-flex justify-content-between align-items-center">Giỏ hàng trống.</li>
            @endif
        </ul>
    </div>
</div>
 </div>
        <div class="row mt-5"><!-- Phương thức thanh toán -->
            <div class="col-lg-8">
                <h4 class="mb-3">Phương Thức Thanh Toán</h4>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                    <label class="form-check-label" for="cod">Thanh toán khi nhận hàng (COD) </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="payment_method" id="bank" value="bank">
                    <label class="form-check-label" for="bank"> Chuyển khoản ngân hàng </label>
                </div>
            </div>
        </div>

        <!-- Nút thanh toán -->
        <div class="row mt-4">
            <div class="col-lg-12 text-center">
                <button type="submit" class="btn btn-primary btn-lg">Hoàn tất thanh toán</button>
            </div>
        </div>
    </form>
</div>
   <!-- Featured Section End -->

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
              
               <div class="col-lg-4 col-md-12">
                   <div class="footer__widget">
                       <h6>Join Our Newsletter Now</h6>
                       <p>Get E-mail updates about our latest shop and special offers.</p>
                       <form action="#">
                           <input type="text" placeholder="Enter your mail">
                           <button type="submit" class="site-btn">Subscribe</button>
                       </form>
                       <div class="footer__widget__social">
                           <a href="https://www.facebook.com/phamhongphong.vim/" target="_blank"><i class="fa fa-facebook"></i></a>
                           <a href="https://www.instagram.com/phamhongphong.vim/" target="_blank"><i class="fa fa-instagram"></i></a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </footer>
    <!-- Footer Section End -->
    <!-- Js Plugins -->
    <script src="{{ asset('frontend/js/js/jquery-3.3.1.min.js')}}"></script><script src="{{ asset('frontend/js/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/js/js/jquery.nice-select.min.js')}}"></script><script src="{{ asset('frontend/js/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('frontend/js/js/jquery.slicknav.js')}}"></script><script src="{{ asset('frontend/js/js/mixitup.min.js')}}"></script>
    <script src="{{ asset('frontend/js/js/owl.carousel.min.js')}}"></script><script src="{{ asset('frontend/js/js/main.js')}}"></script>
    
    
    
</body></html>