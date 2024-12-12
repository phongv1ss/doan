 <!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi Tiết Sản Phẩm</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
<link rel="stylesheet" href="{{ asset('frontend/css/css/bootstrap.min.css') }}" type="text/css"><link rel="stylesheet" href="{{ asset('frontend/css/css/font-awesome.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('frontend/css/css/elegant-icons.css') }}" type="text/css"><link rel="stylesheet" href="{{ asset('frontend/css/css/nice-select.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('frontend/css/css/jquery-ui.min.css') }}" type="text/css"><link rel="stylesheet" href="{{ asset('frontend/css/css/owl.carousel.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('frontend/css/css/slicknav.min.css') }}" type="text/css"><link rel="stylesheet" href="{{ asset('frontend/css/css/style1.css') }}" type="text/css">
</head>

<body>
    <div id="preloder"><div class="loader"></div> </div>    <!-- Page Preloder -->
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="front/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul><li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i></a></li> </ul>
            
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src=" {{ asset('front/img/language_VN.png')}}" alt="">
                <div>Tiếng Việt</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Tiếng Anh</a></li>
                    <li><a href="#">Tiếng Việt</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="login.html"><i class="fa fa-user"></i> Đăng nhập</a>
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
            <a href="https://www.facebook.com/phamhongphong.vim/"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/phamhongphong.vim/"><i class="fa fa-instagram"></i></a>
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
                                <a href="https://www.facebook.com/phamhongphong.vim/"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/phamhongphong.vim/"><i class="fa fa-instagram"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src=" {{ asset('front/img/language_VN.png')}}" alt="">
                                <div>Tiếng Việt</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Tiếng Anh</a></li>
                                    <li><a href="#">Tiếng Việt</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth"> <a href="login.html"><i class="fa fa-user"></i> Đăng nhập</a> </div>
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
                            <li><a href="./shop-grid.html">Mua sắm</a></li>
                            <li><a href="./contact.html">Liên hệ</a></li>
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
            <div class="humberger__open"> <i class="fa fa-bars"></i> </div>
        </div>
    </header>
    <!-- Header Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{ $product->name }}</h3>                    
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <!-- Hiển thị giá sản phẩm -->
                    <div class="product__details__price">{{ number_format($product->price, 0, ',', '.') }}đ</div>
                    <p>{{ $product->description }}</p> <!-- Hiển thị mô tả sản phẩm -->
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">ADD TO CART</a>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                               aria-selected="true">Description</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Information</h6><p>{{ $product->description }}</p>
                            </div>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

    <!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo"><a href="{{ route('shop.index') }}"><img src="{{ asset('front/img/logo.png') }}" alt=""></a></div>
                    <ul>
                        <li>Address: 60-49 Road 11378 New York</li>
                        <li>Phone: +65 11.188.888</li>
                        <li>Email: hello@colorlib.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery Information</a></li>
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
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#"> <input type="text" placeholder="Enter your mail"><button type="submit" class="site-btn">Subscribe</button></form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
                            All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> 
                            by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                    </div>
                    <div class="footer__copyright__payment"><img src="{{ asset('front/img/payment-item.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
    <!-- Js Plugins -->
<script src="{{ asset('frontend/js/js/jquery-3.3.1.min.js') }}"></script><script src="{{ asset('frontend/js/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/js/jquery.nice-select.min.js') }}"></script><script src="{{ asset('frontend/js/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/js/js/jquery.slicknav.js') }}"></script><script src="{{ asset('frontend/js/js/mixitup.min.js') }}"></script>
<script src="{{ asset('frontend/js/js/owl.carousel.min.js') }}"></script><script src="{{ asset('frontend/js/js/main.js') }}"></script>
</body></html>

