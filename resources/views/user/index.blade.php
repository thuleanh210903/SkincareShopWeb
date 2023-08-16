<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Soko Glam">
    <meta name="keywords" content="Soko Glam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soko Glam</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    @include('user.lib');


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>

        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="client/img/icon/search.png" alt=""></a>
            <a href="#"><img src="client/img/icon/heart.png" alt=""></a>
            <a href="#"><img src="client/img/icon/cart.png" alt=""> <span>0</span></a>

        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    @include('user.layouts.header')


    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="https://pbs.twimg.com/media/D5-eyQtW0AA1kUV?format=jpg&name=4096x4096">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">

                                <h2 style="color:#ffff">Beauty is in the skin!</h2>
                                <p style="color:#ffff">Beauty is in the skin! Take care of it, oil it, clean it, scrub it, perfume it, and put on your best clothes, even if there is no special occasion, and you'll feel like a queen.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

   
    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                    </div>
                </div> -->
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="https://www.larocheposay.vn/-/media/project/loreal/brand-sites/lrp/apac/vn/products/effaclar/effaclar-cleansing-foaming-gel/la-roche-posay-face-cleanser-effaclar-cleansing-foaming-gel-200ml-3337872411083-front.png" alt="">
                        <div class="hot__deal__sticker">
                            <span>Sale Of</span>
                            <h5>10%</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2>EFFACLAR PURIFYING FOAMING GEL</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="client/img/instagram/instagram-1.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="client/img/instagram/instagram-2.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="client/img/instagram/instagram-3.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="client/img/instagram/instagram-4.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="client/img/instagram/instagram-5.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="client/img/instagram/instagram-6.jpg"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <h3>#SOKO GLAM</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Skincare Tips</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="https://i.pinimg.com/736x/87/b1/67/87b16775fa6fbc3a538185745172beb4.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="client/img/icon/calendar.png" alt=""> 16 February 2020</span>
                            <h5>Do facial rolling really work?</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="https://i.pinimg.com/564x/98/e3/e8/98e3e892690c7afa19ce89aaf068bd00.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="client/img/icon/calendar.png" alt=""> 21 February 2020</span>
                            <h5>Skincare routine</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="https://i.pinimg.com/564x/68/af/96/68af960629bcbd1c711d534f90f977f8.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="client/img/icon/calendar.png" alt=""> 28 February 2020</span>
                            <h5>Beauty Test</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    @include('user.layouts.footer')

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->







</body>
<script src="{{ asset('client/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.slicknav.js') }}"></script>
<script src="{{asset('client/js/mixitup.min.js')}}"></script>
<script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('client/js/main.js') }}"></script>



</html>