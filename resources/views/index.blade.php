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
   <div id="preloder"><div class="loader"></div> </div>
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
                               <a href="{{route('auth.login')}}"><i class="fa fa-user"></i> Đăng nhập</a>
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
           <div class="hero__item set-bg" data-setbg="front/img/hero/banner1.jpg">
               <div class="hero__text">
                   <span>Sản phẩm mới</span>
                   <h2>Web <br />2Phong</h2>
                   <a href="{{ route('shop.grid') }}" class="primary-btn">Khám phá ngay</a>
               </div>
           </div>
       </div>
   </section>
   <!-- Hero Section End -->
  <!-- Featured Section start -->
   <section>
       <div class="container">
           <div class="row"><div class="col-lg-12"><div class="section-title"> <h2>Sản phẩm mới nhất</h2></div></div></div>
           <div class="row featured__filter">
               @foreach ($products as $product)
               <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                   <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('storage/' . $product->image) }}">
                           <ul class="featured__item__pic__hover">
                               <li><a href="{{ route('shop.show', $product->id) }}"><i class="fa fa-eye"></i></a> </li>
                               <li>
                                   <form action="{{ route('cart.add') }}" method="POST">
                                       @csrf
                                       <input type="hidden" name="product_id" value="{{ $product->id }}">
                                       <button type="submit" style="display: inline-block; border-radius: 50%; background-color: white; padding: 10px; color: black; border: none; cursor: pointer;">
                                           <i class="fa fa-shopping-cart" style="color: black; font-size: 20px;"></i>
                                       </button>
                                   </form>
                               </li>
                               
                               
                           </ul>
                       </div>
                       <div class="featured__item__text">
                           <h6><a href="#">{{ $product->name }}</a></h6>
                           <h5>{{ number_format($product->price, 0, ',', '.') }}đ</h5>
                       </div>
                   </div>
               </div>
               @endforeach     
           </div>
           <div class="col-lg-12"><div class="section-title"><h5><a href="{{ route('shop.grid') }}">Xem thêm</a></h5></div></div>
       </div>
   </section>
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
    <script src="frontend/js/js/jquery-3.3.1.min.js"></script><script src="frontend/js/js/bootstrap.min.js"></script>
    <script src="frontend/js/js/jquery.nice-select.min.js"></script><script src="frontend/js/js/jquery-ui.min.js"></script>
    <script src="frontend/js/js/jquery.slicknav.js"></script><script src="frontend/js/js/mixitup.min.js"></script>
    <script src="frontend/js/js/owl.carousel.min.js"></script><script src="frontend/js/js/main.js"></script>
    
    
</body></html>