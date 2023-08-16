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



    <!-- Shop Section Begin -->
    <section class="shop spad" style="margin-top:20px">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">

                          

                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne" style="padding: 9px 44px;">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">

                                                <ul class="nice-scroll">
                                                    @foreach($category_product as $cate)
                                                    <li><a href="{{ URL::to('/shop_category_product/'.$cate->id_category_product)}}">{{ $cate->name_category_product }}</a></li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree" style="padding: 9px 44px;">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                   
                                                    <li><a href="?price=1">Under 100 000</a></li>
                                                    <li><a href="?price=2">100 000 - 150 000</a></li>
                                                    <li><a href="?price=3">250 000 - 300 000</a></li>
                                                    <li><a href="?price=4">Over 300 000</a></li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select class="sort">
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($category_product_by_id as $product)
                        <a href="{{ URL::to('/shop-detail/'.$product->id_product) }}">
                            <div class="col-lg-4 col-md-6 col-sm-6">

                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ URL::to('public/admin/image/product/'.$product->product_image)}}"></div>
                                    <div class="product__item__text">
                                        
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h6>{{ $product->name_product}}</h6>
                                        <h5>{{number_format($product->price).' VND' }}</h5>
                                    </div>
                                </div>

                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{ $category_product_by_id->links('user.layouts.product__pagination') }}
            
        </div>
    </section>






    <!-- Shop Section End -->



    @include('user.layouts.footer')

    <!-- Search Begin -->
    <!-- <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search" placeholder="Search here.....">
            </form>
        </div>
    </div> -->
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