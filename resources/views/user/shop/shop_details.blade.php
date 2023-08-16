<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Soko Glam">
    <meta name="keywords" content="Soko Glam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soko Glam</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">


    @include('user.lib');
</head>

<body>
    <!-- Page Preloder -->


    <!-- Offcanvas Menu Begin -->

    <!-- Offcanvas Menu End -->

    @include('user.layouts.header')

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        @foreach($detail_product as $key => $detail_pro)
        <div class="shop_details_main">
            <div class="product_data">
                <div class="product__details__pic">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product__details__breadcrumb">
                                    <a href="./index.html">Home</a>
                                    <a href="./shop.html">Shop</a>
                                    <span>Product Details</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-3 col-md-3">
                            </div>
                            <div class="col-lg-6 col-md-9">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="product__details__pic__item">
                                            <img src="{{ URL::to('public/admin/image/product/'.$detail_pro->product_image)}}" alt="">
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane" id="tabs-2" role="tabpanel">
                                        <div class="product__details__pic__item">
                                            <img src="img/shop-details/product-big-3.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                                        <div class="product__details__pic__item">
                                            <img src="img/shop-details/product-big.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-4" role="tabpanel">
                                        <div class="product__details__pic__item">
                                            <img src="img/shop-details/product-big-4.jpeg" alt="">
                                            <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1" class="video-popup"><i class="fa fa-play"></i></a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="product__details__content">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">

                                <div class="product__details__text">
                                    <h4>{{ $detail_pro->name_product }}</h4>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span> - 5 Reviews</span>
                                    </div>
                                    <form action="{{URL::to('/save-cart')}}" method="POST">
                                        {{csrf_field()}}
                                        <h3>{{number_format($detail_pro->price).' VND' }}</h3>
                                        <div class="product__details__cart__option">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input name="idproduct_hidden" type="hidden" class="product_id" value="{{ $detail_pro-> id_product }}">
                                                    <input type="number" value="1" min="1" name="qty" class="qty-input">
                                                </div>
                                            </div>
                                            <button href="" type="submit" class="primary-btn">add to cart</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product__details__tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                            <div class="product__details__tab__content">

                                                <div class="product__details__tab__content__item">
                                                    <h5>Products Infomation</h5>
                                                    <p>{{ $detail_pro -> describe_product }}</p>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </section>


    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    @foreach($relate_product as $relate)
                    <div class="product__item">
                        <div class="product__item__pic set-bg">
                            <img src="{{ URL::to('public/admin/image/product/'.$relate->product_image)}}">
                        </div>
                        <div class="product__item__text">
                            <h6>{{$relate->name_product}}</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>{{$relate->price}}</h5>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Related Section End -->

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
<!-- <script src="{{ asset('client/js/custom.js') }}"></script> -->

<script src="{{ asset('client/js/alertify.min.js') }}"></script>

</html>