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

    <!-- Breadcrumb Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        @foreach($order_user as $or)
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>

                            <div class="checkout__order__products">Product <span></span></div>

                            <ul class="checkout__total__products">
                                <li><span></span></li>

                            </ul>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span></span></li>
                                <li>Total <span>{{$or -> order_total}}</span></li>
                                <li>Status<span>
                                        <?php
                                        if ($or->order_status == 0) {
                                            echo 'Đang duyệt đơn';
                                        }
                                        ?>
                                    </span></li>
                            </ul>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    <a href="/">
                                        Check Payment
                                        <input type="checkbox" id="payment" name="payment_method" value="1">
                                        <span class="checkmark"></span>
                                    </a>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <form method="POST" action="{{URL::to('/vnpay-payment')}}">
                                            <label for="paypal"><a name='redirect' href="">
                                                    VNPay
                                                    <input type="checkbox" id="paypal" name="payment_method" value="2">
                                                    <span class="checkmark"></span>
                                            </label></a>
                                        </form>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>

                        </div>
                        @endforeach
                    </div>



                </div>


            </div>
        </div>


    </section>

    <!-- Checkout Section End -->

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

</html>