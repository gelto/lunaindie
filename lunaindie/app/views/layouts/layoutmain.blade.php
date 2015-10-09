<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700,400italic,700italic&amp;subset=latin,vietnamese">

        <!-- build:css css/bootstrap.css -->
        <link rel="stylesheet" href="/public/statics/template/css/bootstrap.css">
        <!-- endbuild -->

        <!-- build:css css/plugins.css -->
        <link rel="stylesheet" href="/public/statics/template/css/awe-icon.css">
        <link rel="stylesheet" href="/public/statics/template/css/font-awesome.css">
        <link rel="stylesheet" href="/public/statics/template/css/magnific-popup.css">
        <link rel="stylesheet" href="/public/statics/template/css/owl.carousel.css">
        <link rel="stylesheet" href="/public/statics/template/css/awemenu.css">
        <link rel="stylesheet" href="/public/statics/template/css/swiper.css">
        <link rel="stylesheet" href="/public/statics/template/css/easyzoom.css">
        <link rel="stylesheet" href="/public/statics/template/css/nanoscroller.css">
        <!-- endbuild -->

        <!-- build:css css/styles.css -->
        <link rel="stylesheet" href="/public/statics/template/css/awe-background.css">
        <link rel="stylesheet" href="/public/statics/template/css/main.css">
        <link rel="stylesheet" href="/public/statics/template/css/docs.css">
        <!-- endbuild -->

        <!-- build:js js/vendor.js -->
        <script src="/public/statics/template/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="/public/statics/template/js/vendor/jquery-1.11.3.min.js"></script>
        <!-- endbuild -->

        <script>window.SHOW_LOADING = false;</script>

        


    </head>
    <body>

        
        <!-- // LOADING -->
        <div class="awe-page-loading">
            <div class="awe-loading-wrapper">
                <div class="awe-loading-icon">
                    <span class="icon icon-logoxxx"></span>
                </div>
                
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <!-- // END LOADING -->


        <div id="wrapper" class="main-wrapper ">
            
                
    <header id="header" class="awe-menubar-header">
        <nav class="awemenu-nav headroom" data-responsive-width="1200">
            <div class="container">
                <div class="awemenu-container">

                    <div class="navbar-header">
                                                <ul class="navbar-icons">
                            
                                
                        <li class="menubar-account">
                            @if($estaLogeado)
                            <a href="#" title="" class="awemenu-icon">
                            @else    
                            <a href="#login-popup" title="" class="awemenu-icon">
                            @endif
                                <i class="icon icon-user-circle"></i>
                                <span class="awe-hidden-text">Mi cuenta</span>
                            </a>
                            @if($estaLogeado)
                            <ul class="submenu megamenu">
                                <li>
                                    <div class="container-fluid">
                                        <div class="header-account">
                                            <!--div class="header-account-avatar">
                                                <a href="#" title="">
                                                    <img src="/public/statics/template/img/samples/avatars/customers/1.jpg" alt="" class="img-circle">
                                                </a>
                                            </div-->
                                            
                                            <div class="header-account-username">
                                                <h4><a href="#">Jessica Alba</a></h4>
                                            </div>

                                            <ul>
                                                <li><a href="/micuenta">Mi cuenta</a></li>
                                                <li><a href="/soydisenador">Entra como diseñador</a></li>
                                                <li><a href="/cambia password">Cambiar contraseña</a></li>
                                                <li><a href="/logout">Logout</a></li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endif
                        </li>

                        <li class="menubar-wishlist">
                            <a href="#" title="" class="awemenu-icon">
                                <i class="icon icon-star"></i>
                                <span class="awe-hidden-text">Wishlist</span>
                            </a>

                            <ul class="submenu megamenu">
                                <li>
                                    <div class="container-fluid">
                                        <ul class="whishlist">
                                            
                                            <li>
                                                <div class="whishlist-item">
                                                    <div class="product-image">
                                                        <a href="#" title="">
                                                            <img src="/public/statics/template/img/samples/products/cart/1.jpg" alt="">
                                                        </a>
                                                    </div>

                                                    <div class="product-body">
                                                        <div class="whishlist-name">
                                                            <h3><a href="#" title="">Gin Lane Greenport Cotton Shirt</a></h3>
                                                        </div>

                                                        <div class="whishlist-price">
                                                            <span>Price:</span>
                                                            <strong>$120</strong>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="#" title="" class="remove">
                                                    <i class="icon icon-remove"></i>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <div class="whishlist-item">
                                                    <div class="product-image">
                                                        <a href="#" title="">
                                                            <img src="/public/statics/template/img/samples/products/cart/2.jpg" alt="">
                                                        </a>
                                                    </div>

                                                    <div class="product-body">
                                                        <div class="whishlist-name">
                                                            <h3><a href="#" title="">Gin Lane Greenport Cotton Shirt</a></h3>
                                                        </div>

                                                        <div class="whishlist-price">
                                                            <span>Price:</span>
                                                            <strong>$120</strong>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="#" title="" class="remove">
                                                    <i class="icon icon-remove"></i>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <div class="whishlist-item">
                                                    <div class="product-image">
                                                        <a href="#" title="">
                                                            <img src="/public/statics/template/img/samples/products/cart/3.jpg" alt="">
                                                        </a>
                                                    </div>

                                                    <div class="product-body">
                                                        <div class="whishlist-name">
                                                            <h3><a href="#" title="">Gin Lane Greenport Cotton Shirt</a></h3>
                                                        </div>

                                                        <div class="whishlist-price">
                                                            <span>Price:</span>
                                                            <strong>$120</strong>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="#" title="" class="remove">
                                                    <i class="icon icon-remove"></i>
                                                </a>
                                            </li>
                                            
                                        </ul>

                                        <hr>

                                        <div class="whishlist-action">
                                            <a href="#" title="" class="btn btn-dark btn-lg btn-outline btn-block">View Wishlist</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="menubar-cart">
                            <a href="#" title="" class="awemenu-icon menu-shopping-cart">
                                <i class="icon icon-shopping-bag"></i>
                                <span class="awe-hidden-text">Cart</span>

                                <span class="cart-number">2</span>
                            </a>

                            <ul class="submenu megamenu">
                                <li>
                                    <div class="container-fluid">

                                        <ul class="whishlist">
                                            
                                            <li>
                                                <div class="whishlist-item">
                                                    <div class="product-image">
                                                        <a href="#" title="">
                                                            <img src="/public/statics/template/img/samples/products/cart/1.jpg" alt="">
                                                        </a>
                                                    </div>

                                                    <div class="product-body">
                                                        <div class="whishlist-name">
                                                            <h3><a href="#" title="">Gin Lane Greenport Cotton Shirt</a></h3>
                                                        </div>

                                                        <div class="whishlist-price">
                                                            <span>Price:</span>
                                                            <strong>$120</strong>
                                                        </div>

                                                        <div class="whishlist-quantity">
                                                            <span>Quantity:</span>
                                                            <span>1</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="#" title="" class="remove">
                                                    <i class="icon icon-remove"></i>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <div class="whishlist-item">
                                                    <div class="product-image">
                                                        <a href="#" title="">
                                                            <img src="/public/statics/template/img/samples/products/cart/2.jpg" alt="">
                                                        </a>
                                                    </div>

                                                    <div class="product-body">
                                                        <div class="whishlist-name">
                                                            <h3><a href="#" title="">Gin Lane Greenport Cotton Shirt</a></h3>
                                                        </div>

                                                        <div class="whishlist-price">
                                                            <span>Price:</span>
                                                            <strong>$120</strong>
                                                        </div>

                                                        <div class="whishlist-quantity">
                                                            <span>Quantity:</span>
                                                            <span>1</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="#" title="" class="remove">
                                                    <i class="icon icon-remove"></i>
                                                </a>
                                            </li>
                                            
                                        </ul>

                                        <div class="menu-cart-total">
                                            <span>Total</span>
                                            <span class="price">$180</span>
                                        </div>

                                        <div class="cart-action">
                                            <a href="#" title="" class="btn btn-lg btn-dark btn-outline btn-block">View cart</a>
                                            <a href="#" title="" class="btn btn-lg btn-primary btn-block">Proceed To Checkout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                            
                        </ul>

                                                <ul class="navbar-search">
                            <li>
                                <a href="#" title="" class="awemenu-icon awe-menubar-search" id="open-search-form">
                                    <span class="sr-only">Search</span>
                                    <span class="icon icon-search"></span>
                                </a>

                                <div class="menubar-search-form" id="menubar-search-form">
                                    <form action="index.html" method="GET">
                                        <input type="text" name="s" class="form-control" placeholder="Search your entry here...">
                                        <div class="menubar-search-buttons">
                                            <button type="submit" class="btn btn-sm btn-white">Search</button>
                                            <button type="button" class="btn btn-sm btn-white" id="close-search-form">
                                                <span class="icon icon-remove"></span>
                                            </button>
                                        </div>
                                    </form>
                                </div><!-- /.menubar-search-form -->
                            </li>
                        </ul>

                    </div>

                                        <div class="awe-logo">
                        <a href="index.html" title=""><img src="/public/statics/template/img/logo.png" alt=""></a>
                    </div><!-- /.awe-logo -->


                    <ul class="awemenu awemenu-right">
                                                <li class="awemenu-item">
                            <a href="#" title="">
                                <span>Clothing</span>
                            </a>

                            <ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                <li class="awemenu-megamenu-item">
                                    <div class="container-fluid">
                                        <div class="awemenu-megamenu-wrapper">

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <h2 class="upper">Clothing</h2>

                                                    <ul class="super">
                                                        <li><a href="#" title="">Bestseller</a></li>
                                                        <li><a href="#" title="">New Arrivals</a></li>
                                                    </ul>
                                                </div>

                                                <div class="col-lg-3">
                                                    <ul class="sublist">
                                                        <li><a href="#" title="">Blazers &amp; Vests</a></li>
                                                        <li><a href="#" title="">Graphics Tees</a></li>
                                                        <li><a href="#" title="">Jeans</a></li>
                                                        <li><a href="#" title="">Jackets &amp; Outerwear</a></li>
                                                        <li><a href="#" title="">Pants</a></li>
                                                    </ul>
                                                </div>

                                                <div class="col-lg-3">
                                                    <ul class="sublist">
                                                        <li><a href="#" title="">Shirts</a></li>
                                                        <li><a href="#" title="">Short &amp; Swim</a></li>
                                                        <li><a href="#" title="">Tees</a></li>
                                                        <li><a href="#" title="">Underwear &amp; Socks</a></li>
                                                    </ul>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="awe-media inline margin-bottom-25">
                                                        <div class="awe-media-image">
                                                            <a href="#" title="">
                                                                <img src="/public/statics/template/img/samples/menu/trending-shop.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <h4 class="awe-media-title medium upper center">
                                                            <a href="#" title="">The trend shop</a>
                                                        </h4>
                                                    </div>

                                                    <div class="awe-media inline">
                                                        <div class="awe-media-image">
                                                            <a href="#" title="">
                                                                <img src="/public/statics/template/img/samples/menu/shirt-shop.jpg" alt="">
                                                            </a>
                                                            <div class="awe-media-overlay overlay-dark-50 fullpage">
                                                                <div class="fp-table">
                                                                    <div class="fp-table-cell center">
                                                                        <a href="#" class="btn btn-white">Show now</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="awe-media-title medium upper center">
                                                            <a href="#" title="">Shirt shop</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="bottom-link">
                                                <a href="#" class="btn btn-lg btn-dark btn-outline">
                                                    <span>Shop All Clothing</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="awemenu-item">
                            <a href="#" title="">
                               <span>Shoes</span>
                            </a>

                            <ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                <li class="awemenu-megamenu-item">
                                    <div class="container-fluid">
                                        <div class="awemenu-megamenu-wrapper">

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <h2 class="upper">Shoes</h2>

                                                    <ul class="super">
                                                        <li><a href="#" title="">Bestseller</a></li>
                                                        <li><a href="#" title="">New Arrivals</a></li>
                                                    </ul>
                                                </div>

                                                <div class="col-lg-3">
                                                    <ul class="sublist">
                                                        <li><a href="#">Boat Shoes</a></li>
                                                        <li><a href="#">Boots</a></li>
                                                        <li><a href="#">Casual Shoes</a></li>
                                                        <li><a href="#">Dress Shoes</a></li>
                                                        <li><a href="#">Sneakers</a></li>
                                                    </ul>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="sublist">
                                                        <p>Shop Size</p>
                                                        <ul class="numbers-list">
                                                            <li><a href="#">7</a></li>
                                                            <li><a href="#">7.5</a></li>
                                                            <li><a href="#">7.5</a></li>
                                                            <li><a href="#">8</a></li>
                                                            <li><a href="#">8.5</a></li>
                                                            <li><a href="#">9</a></li>
                                                            <li><a href="#">10</a></li>
                                                            <li><a href="#">10.5</a></li>
                                                            <li><a href="#">11</a></li>
                                                            <li><a href="#">11.5</a></li>
                                                            <li><a href="#">12</a></li>
                                                            <li><a href="#">13</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="awe-media inline margin-bottom-25">
                                                        <div class="awe-media-image">
                                                            <a href="#" title="">
                                                                <img src="/public/statics/template/img/samples/menu/trending-shoes.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <h4 class="awe-media-title medium upper center">
                                                            <a href="#" title="">Hot trend shoes</a>
                                                        </h4>
                                                    </div>

                                                    <div class="awe-media inline">
                                                        <div class="awe-media-image">
                                                            <a href="#" title="">
                                                                <img src="/public/statics/template/img/samples/menu/dress-shoes.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <h4 class="awe-media-title medium upper center">
                                                            <a href="#" title="">Dress shoes shop</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="bottom-link">
                                                <a href="#" class="btn btn-lg btn-dark btn-outline">
                                                    <span>Shop All Shoes</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="awemenu-item">
                            <a href="#" title="">
                                <span>Accessories</span>
                            </a>

                            <ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                <li class="awemenu-megamenu-item">
                                    <div class="container-fluid">
                                        <div class="awemenu-megamenu-wrapper">

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <h2 class="upper">Shoes</h2>

                                                    <ul class="super">
                                                        <li><a href="#" title="">Bestseller</a></li>
                                                        <li><a href="#" title="">New Arrivals</a></li>
                                                    </ul>
                                                </div>

                                                <div class="col-lg-3">
                                                    <ul class="sublist">
                                                        <li><a href="#" title="#">Bags</a></li>
                                                        <li><a href="#" title="#">Belts</a></li>
                                                        <li><a href="#" title="#">Grooming</a></li>
                                                        <li><a href="#" title="#">Hats</a></li>
                                                        <li><a href="#" title="#">Jewelry</a></li>
                                                    </ul>
                                                </div>

                                                <div class="col-lg-3">
                                                    <ul class="sublist">
                                                        <li><a href="#" title="">Scarves &amp; Glovers</a></li>
                                                        <li><a href="#" title="">Wallets</a></li>
                                                        <li><a href="#" title="">Watches</a></li>
                                                        <li><a href="#" title="">Glasses</a></li>
                                                        <li><a href="#" title="">Zippo</a></li>
                                                    </ul>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="awe-media inline margin-bottom-25">
                                                        <div class="awe-media-image">
                                                            <a href="#" title="">
                                                                <img src="/public/statics/template/img/samples/menu/trending-accessories.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <h4 class="awe-media-title medium upper center">
                                                            <a href="#" title="">Hot Trend Accessories</a>
                                                        </h4>
                                                    </div>

                                                    <div class="awe-media inline">
                                                        <div class="awe-media-image">
                                                            <a href="#" title="">
                                                                <img src="/public/statics/template/img/samples/menu/new-arrivals.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <h4 class="awe-media-title medium upper center">
                                                            <a href="#" title="">New Arrivals Swatch</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="bottom-link">
                                                <a href="#" class="btn btn-lg btn-dark btn-outline">
                                                    <span>Shop All Accessories</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        

                        <li class="awemenu-item">
                            <a href="#" title="">
                                <span>Brand</span>
                            </a>

                            <ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                <li class="awemenu-megamenu-item">
                                    <div class="container-fluid">
                                        <div class="awemenu-megamenu-wrapper">

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <h2 class="upper">Brand</h2>
                                                </div>

                                                <div class="col-lg-3">
                                                    <ul class="sublist">
                                                        <li><a href="#" title="">Dr.Matten</a></li>
                                                        <li><a href="#" title="">The Police</a></li>
                                                        <li><a href="#" title="">Adidas</a></li>
                                                        <li><a href="#" title="">Like</a></li>
                                                        <li><a href="#" title="">The Sandiago</a></li>
                                                        <li><a href="#" title="">Pollo</a></li>
                                                    </ul>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="sublist">
                                                        <p>Brand</p>
                                                        <ul class="numbers-list">
                                                            <li><a href="#" title="">A</a></li>
                                                            <li><a href="#" title="">B</a></li>
                                                            <li><a href="#" title="">C</a></li>
                                                            <li><a href="#" title="">D</a></li>
                                                            <li><a href="#" title="">E</a></li>
                                                            <li><a href="#" title="">F</a></li>
                                                            <li><a href="#" title="">G</a></li>
                                                            <li><a href="#" title="">H</a></li>
                                                            <li><a href="#" title="">I</a></li>
                                                            <li><a href="#" title="">J</a></li>
                                                            <li><a href="#" title="">K</a></li>
                                                            <li><a href="#" title="">L</a></li>
                                                            <li><a href="#" title="">M</a></li>
                                                            <li><a href="#" title="">N</a></li>
                                                            <li><a href="#" title="">O</a></li>
                                                            <li><a href="#" title="">P</a></li>
                                                            <li><a href="#" title="">Q</a></li>
                                                            <li><a href="#" title="">R</a></li>
                                                            <li><a href="#" title="">S</a></li>
                                                            <li><a href="#" title="">T</a></li>
                                                            <li><a href="#" title="">U</a></li>
                                                            <li><a href="#" title="">V</a></li>
                                                            <li><a href="#" title="">W</a></li>
                                                            <li><a href="#" title="">X</a></li>
                                                            <li><a href="#" title="">Y</a></li>
                                                            <li><a href="#" title="">Z</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="awe-media inline margin-bottom-25">
                                                        <div class="awe-media-image">
                                                            <a href="#" title="">
                                                                <img src="/public/statics/template/img/samples/menu/horosen-shop.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <h4 class="awe-media-title medium upper center">
                                                            <a href="#" title="">Horosen shop</a>
                                                        </h4>
                                                    </div>

                                                    <div class="awe-media inline">
                                                        <div class="awe-media-image">
                                                            <a href="#" title="">
                                                                <img src="/public/statics/template/img/samples/menu/police-shop.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <h4 class="awe-media-title medium upper center">
                                                            <a href="#" title="">The police shop</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="bottom-link">
                                                <a href="#" class="btn btn-lg btn-dark btn-outline">
                                                    <span>Shop All Accessories</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="awemenu-item">
                            <a href="#" title="">Pages</a>

                            <ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                <li class="awemenu-megamenu-item">
                                    <div class="container-fluid">

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li class="awemenu-item">
                                                        <a href="index.html" title="">Home Page</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="index2.html" title="">Home Page 2</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="index3.html" title="">Home Page 3</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="index4.html" title="">Home Page 4</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="index-header-1.html" title="">Home with header style 1</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="index-header-2.html" title="">Home with header style 2</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="index-header-3.html" title="">Home with header style 3</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="index-header-4.html" title="">Home with header style 4</a>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li class="awemenu-item">
                                                        <a href="index-empty.html" title="">Home with empty cart</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="index-footer-style.html" title="">Home with footer style</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="about-us.html" title="">About us</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="blog-left.html" title="">Blog left</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="blog-right.html" title="">Blog right</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="blog-nobar.html" title="">Blog nobar</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="blog-masonry.html" title="">Blog masonry</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="blog-detail.html" title="">Blog details</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li class="awemenu-item">
                                                        <a href="404.html" title="">404</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="comming-soon.html" title="">Comming soon</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="contact.html" title="">Contact</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="portfolio-main-style1.html" title="">Portfolio 1</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="portfolio-main-style2.html" title="">Portfolio 2</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="portfolio-main-stylepicture-grid.html" title="">Portfolio 3</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="portfolio-main-stylepicture-masonry.html" title="">Portfolio 4</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="portfolio-detail.html" title="">Portfolio details</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li class="awemenu-item">
                                                        <a href="customers-say.html" title="">Customers Say</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="lookbook.html" title="">Lookbook</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="lookbook-details.html" title="">Lookbook details</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="products-grid.html" title="">Product grid</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="products-list.html" title="">Product list</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="product-detail.html" title="">Product detail</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="product-fullwidth.html" title="">Product detail 2</a>
                                                    </li>

                                                    <li class="awemenu-item">
                                                        <a href="checkout.html" title="">Checkout</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="awemenu-item">
                            <a href="#">Elements</a>

                            <ul class="awemenu-submenu awemenu-megamenu" data-width="650px" data-animation="fadeup">
                                <li class="awemenu-megamenu-item">

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <ul class="list-unstyled">
                                                    <li class="awemenu-item"><a href="./elements-alert.html">Alert</a></li>
                                                    <li class="awemenu-item"><a href="./elements-background.html">Background</a></li>
                                                    <li class="awemenu-item"><a href="./elements-bar.html">Bar (Progress)</a></li>
                                                    <li class="awemenu-item"><a href="./elements-box.html">Box</a></li>
                                                    <li class="awemenu-item"><a href="./elements-buttons.html">Buttons</a></li>
                                                    <li class="awemenu-item"><a href="./elements-forms.html">Form Fields</a></li>
                                                    <li class="awemenu-item"><a href="./elements-grid.html">Grid</a></li>
                                                    <li class="awemenu-item"><a href="./elements-page-title.html">Page Title</a></li>
                                                    <li class="awemenu-item"><a href="./elements-maps.html">Maps</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-lg-6">
                                                <ul class="list-unstyled">
                                                    <li class="awemenu-item"><a href="./elements-aweicon.html">Icons (Aweicon)</a></li>
                                                    <li class="awemenu-item"><a href="./elements-glyphicon.html">Icons (Glyphicon)</a></li>
                                                    <li class="awemenu-item"><a href="./elements-fontawesome.html">Icons (FontAwesome)</a></li>
                                                    <li class="awemenu-item"><a href="./elements-carousel.html">Carousel</a></li>
                                                    <li class="awemenu-item"><a href="./elements-tabs.html">Tabs</a></li>
                                                    <li class="awemenu-item"><a href="./elements-typography.html">Typography</a></li>
                                                    <li class="awemenu-item"><a href="./elements-video-sound.html">Video / Sound</a></li>
                                                    <li class="awemenu-item"><a href="./elements-divider.html">Divider</a></li>
                                                    <li class="awemenu-item"><a href="./elements-counter.html">Counter</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </li>

                    </ul><!-- /.awemenu -->
                </div>
            </div><!-- /.container -->

        </nav><!-- /.awe-menubar -->
    </header><!-- /.awe-menubar-header -->


        @yield('content')

<footer class="footer">
            <div class="footer-wrapper">
                <div class="footer-widgets">
                    
                        
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            
                            <div class="widget">
                                <h3 class="widget-title">ABOUT HOSOREN</h3>

                                <div class="widget-content">
                                    <p>Lorem ipsum dolor sit amet isse potenti. Vesquam ante aliquet lacusemper elit. Cras neque nulla, convallis non commodo et, euismod nonsese.</p>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-6">
                            
                            <div class="widget">
                                <h3 class="widget-title">WE CAN HELP YOU?</h3>
                 
                                <div class="widget-content">
                                    <p>Phone 1: 8 (495) 989—20—11</p>
                                    <p>Phone 2: 8 (800) 875—05—26</p>
                                    <p>Open - Close: 09:00-21:00</p>
                                    <p>Mail: hosoren@gmail.com</p>
                                </div>
                            </div><!-- /.widget -->

                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6">
                    
                           <div class="widget">
                                <h3 class="widget-title">Shopping</h3>

                                <ul>
                                    <li><a href="#" title="">Your Cart</a></li>
                                    <li><a href="#" title="">Your Orders</a></li>
                                    <li><a href="#" title="">Compared Items</a></li>
                                    <li><a href="#" title="">Wishlist Items</a></li>
                                    <li><a href="#" title="">Shipping Detail</a></li>
                                </ul>
                            </div><!-- /.widget -->

                </div>

                <div class="col-md-2 col-sm-6">
                    
                            <div class="widget">
                                <h3 class="widget-title">MORE LINK</h3>
  
                                <ul>
                                    <li><a href="#" title="">Blog</a></li>
                                    <li><a href="#" title="">Gift Center</a></li>
                                    <li><a href="#" title="">Buying Guides</a></li>
                                    <li><a href="#" title="">New Arrivals</a></li>
                                    <li><a href="#" title="">Clearance</a></li>
                                </ul>
                            </div><!-- /.widget -->

                </div>

                <div class="col-md-4">
                    
                            <div class="widget">
                                <h3 class="widget-title">Are You Like Me</h3>

                                <ul class="list-socials">
                                    <li><a href="#" title=""><i class="icon icon-twitter"></i></a></li>
                                    <li><a href="#" title=""><i class="icon icon-facebook"></i></a></li>
                                    <li><a href="#" title=""><i class="icon icon-google-plus"></i></a></li>
                                    <li><a href="#" title=""><i class="icon icon-pinterest"></i></a></li>
                                </ul>
                            </div>


                    
                            <div class="widget">
                                <h3 class="widget-title">PAYMENT ACCEPT</h3>

                                <ul class="list-socials">
                                    <li>
                                        <a href="#" title="">
                                            <i class="fa fa-cc-paypal"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" title="">
                                            <i class="fa fa-cc-visa"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" title="">
                                            <i class="fa fa-cc-amex"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- /.widget -->

                </div>
            </div>
        </div>

                    
                </div><!-- /.footer-widgets -->

                <div class="footer-copyright">
                    <div class="container">
                        <div class="copyright">
                            <p>Copyright &copy; 2015 Hosoren - All Rights Reserved.</p>
                        </div>

                        <div class="footer-nav">
                            <nav>
                                <ul>
                                    <li><a href="#" title="">Contact Us</a></li>
                                    <li><a href="#" title="">Term of Use</a></li>
                                    <li><a href="#" title="">Privacy Policy</a></li>
                                    <li><a href="#" title="">Site Map</a></li>
                                </ul>
                            </nav>

                            <nav>
                                <ul>
                                    <li class="dropdown dropup">
                                        <div class="language-select">
                                            <span class="select-title">Language:</span>

                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <span>ENG</span>
                                                <span class="icon icon-arrow-down"></span>
                                            </a>

                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">English</a></li>
                                                <li><a href="#">Vietnamese</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="dropdown dropup">
                                        <div class="price-select">
                                            <span class="select-title">Price:</span>

                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <span>USD</span>
                                                <span class="icon icon-arrow-down"></span>
                                            </a>

                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">USD</a></li>
                                                <li><a href="#">VND</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!-- /.footer-copyright -->
            </div><!-- /.footer-wrapper -->

            <a href="#" class="back-top" title="">
                <span class="back-top-image">
                    <img src="/public/statics/template/img/back-top.png" alt="">
                </span>

                <small>Volver a arriba</small>
            </a><!-- /.back-top -->
        </footer><!-- /footer -->

        </div><!-- /#wrapper -->

        
<div id="login-popup" class="white-popup login-popup mfp-hide">
    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#account-login" aria-controls="account-login" role="tab" data-toggle="tab">Login</a>
            </li>

            <li role="presentation">
                <a href="#account-register" aria-controls="account-register" role="tab" data-toggle="tab">Registro</a>
            </li>
        </ul><!-- /.nav -->

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="account-login">
                <form action="index.html" method="POST" >
                     <span class="error" style="color: #ffa200;">&nbsp;</span><br>
                    <div class="form-group">
                        <label for="login-account">Email</label>
                        <input type="text" class="form-control validame soloAlphaCorreo email" id="login-account" data-tipo="email" data-errorcustom="El email es requerido">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" class="form-control validame password" id="login-password" data-show-password="true" data-tipo="password" data-errorcustom="El password es requerido">
                    </div><!-- /.form-group -->

                    <div class="forgot-passwd">
                        <a href="#" title="">
                            <i class="icon icon-key"></i>
                            <span class="botonRecuperar">Si olvidaste tu contraseña, escribe tu email y has click AQUÍ</span>
                        </a>
                    </div><!-- /.forgot-passwd -->

                    <div class="form-button">
                        <button type="button" class="btn btn-lg btn-primary btn-block botonEnviar">Login</button>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->

            <div role="tabpanel" class="tab-pane" id="account-register">
                <form method="POST" >
                    <span class="error" style="color: #ffa200;">&nbsp;</span><br>
                    <div class="form-group">
                        <label for="register-username">Nombre y apellido <sup>*</sup></label>
                        <input type="text" class="form-control validameReg soloAlpha nombreReg" id="register-username" data-tipo="texto" data-errorcustom="El nombre es requerido">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label for="register-email">Email <sup>*</sup></label>
                        <input type="text" class="form-control validameReg emailReg soloAlphaCorreo" id="register-email" data-tipo="email" data-errorcustom="El email es requerido">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label for="register-password">Password <sup>*</sup></label>
                        <input type="password" class="form-control validameReg passwordReg" id="register-password" data-tipo="password" data-errorcustom="El password es requerido">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label for="register-confirm-password">Confirma tu password <sup>*</sup></label>
                        <input type="password" class="form-control validameReg passwordReg" id="register-confirm-password" data-tipo="password" data-errorcustom="Confirmar el password es requerido">
                    </div><!-- /.form-group -->

                    <div class="form-button">
                        <button type="button" class="btn btn-lg btn-warning btn-block botonEnviarReg">Enviar</button>
                    </div><!-- /.form-button -->
                    {{Form::token()}}
                </form>
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div>
</div><!-- /.login-popup -->

<script>
    $(function() {
        $('a[href="#login-popup"]').magnificPopup({
            type:'inline',
            midClick: false,
            closeOnBgClick: false
        });
    });
</script>


        
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    

    <!-- build:js js/plugins.js -->
    <script src="/public/statics/template/js/plugins/bootstrap.min.js"></script>

    
        <script src="/public/statics/template/js/vendor/jquery-ui.min.js"></script>
    

    <script src="/public/statics/template/js/plugins/awemenu.min.js"></script>
    <script src="/public/statics/template/js/plugins/headroom.min.js"></script>

    <script src="/public/statics/template/js/plugins/hideshowpassword.min.js"></script>
    <script src="/public/statics/template/js/plugins/jquery.parallax-1.1.3.min.js"></script>
    <script src="/public/statics/template/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="/public/statics/template/js/plugins/jquery.nanoscroller.min.js"></script>

    <script src="/public/statics/template/js/plugins/swiper.min.js"></script>
    <script src="/public/statics/template/js/plugins/owl.carousel.min.js"></script>
    <script src="/public/statics/template/js/plugins/jquery.countdown.min.js"></script>
    <script src="/public/statics/template/js/plugins/easyzoom.js"></script>

    <script src="/public/statics/template/js/plugins/masonry.pkgd.min.js"></script>
    <script src="/public/statics/template/js/plugins/isotope.pkgd.min.js"></script>
    <script src="/public/statics/template/js/plugins/imagesloaded.pkgd.min.js"></script>

    <script src="/public/statics/template/js/plugins/gmaps.min.js"></script>
    <!-- endbuild -->

    <!-- build:js js/main.js -->
    <script src="/public/statics/template/js/awe/awe-carousel-branch.js"></script>
    <script src="/public/statics/template/js/awe/awe-carousel-blog.js"></script>
    <script src="/public/statics/template/js/awe/awe-carousel-products.js"></script>
    <script src="/public/statics/template/js/awe/awe-carousel-testimonial.js"></script>

    <script src="/public/statics/template/js/awe-hosoren.js"></script>
    <script src="/public/statics/template/js/main.js"></script>
    <!-- endbuild -->

    <!-- build:js js/docs.js -->
    <script src="/public/statics/template/js/plugins/list.min.js"></script>
    <script src="/public/statics/template/js/docs.js"></script>
    <!-- endbuild -->

    <!-- login.js -->
    <script src="/public/statics/js/login.js"></script>
    <script src="/public/statics/js/registro.js"></script>
    <script src="/public/statics/js/recuperacion.js"></script>
    <!-- login -->

    @yield('scripts')

    </body>
</html>