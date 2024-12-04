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
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="front/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
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
                            <li><a href="#"><i class="fa fa-heart" ></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
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
    <section class="shop-grid spad">
        <div class="container">
            <h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>
            @if($products->isEmpty())
                <p>Không tìm thấy sản phẩm nào phù hợp.</p>
            @else
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset($product->image) }}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="{{ route('shop.show', $product->id) }}"><i class="fa fa-eye"></i></a> </li>
                                        <li><a href="#" class="add-to-cart" data-id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">{{ $product->name }}</a></h6>
                                    <h5>{{ number_format($product->price, 0, ',', '.') }} VND</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
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