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
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

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
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    @include('user.layouts.header')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our Blog</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                
                    @foreach($cate_post_by_id as $post_by_cate)
                    <a href="{{ URL::to('/post/'.$post_by_cate->id_post) }}">
                    <div class="blog__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ URL::to('public/admin/image/post/'.$post_by_cate->post_image)}}"></div>
                        <div class="blog__item__text" style="margin-top:10px">
                            <span><img src="img/icon/calendar.png" alt=""> 16 February 2020</span>
                            <h5>{{$post_by_cate->post_title}}</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                    </a>
                    @endforeach
                
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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


<link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css')}}" type="text/css">
 <link rel="stylesheet" href="{{ asset('client/css/font-awesome.min.css')}}" type="text/css">
 <link rel="stylesheet" href="{{ asset('client/css/elegant-icons.css')}}" type="text/css">
 <link rel="stylesheet" href="{{ asset('client/css/magnific-popup.css')}}" type="text/css">
 <link rel="stylesheet" href="{{ asset('client/css/nice-select.css')}}" type="text/css">
 <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css')}}" type="text/css">
 <link rel="stylesheet" href="{{ asset('client/css/slicknav.min.css')}}" type="text/css">
 <link rel="stylesheet" href="{{ asset('client/css/style.css')}}" type="text/css">
 <link rel="stylesheet" href="{{ asset('client/css/loginbootstrap.css')}}" type="text/css">
</html>