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
    <link rel="stylesheet" href="{{asset('frontend/css/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/style1.css')}}" type="text/css">
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
            </div>
        </div>
    </header>
</body>
<div class="container py-5">
    <h2 class="text-center mb-4">Đánh giá sản phẩm</h2>

    @auth
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <select name="product_id" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            
                            <textarea name="comment" required minlength="10"></textarea>
                            
                            <button type="submit">Gửi đánh giá</button>
                        </form>

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if(session('demo'))
                            <div class="alert alert-success">
                                {{ session('demo') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center">
            <p>Vui lòng <a href="{{ route('auth.login') }}">đăng nhập</a> để gửi đánh giá</p>
        </div>
    @endauth
</div>
<script src="{{ asset('frontend/js/js/jquery-3.3.1.min.js')}}"></script><script src="{{ asset('frontend/js/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/js/js/jquery.nice-select.min.js')}}"></script><script src="{{ asset('frontend/js/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('frontend/js/js/jquery.slicknav.js')}}"></script><script src="{{ asset('frontend/js/js/mixitup.min.js')}}"></script>
    <script src="{{ asset('frontend/js/js/owl.carousel.min.js')}}"></script><script src="{{ asset('frontend/js/js/main.js')}}"></script>
    
    
</body></html>