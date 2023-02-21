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
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="shopping__cart__table">

                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItem as $item)
                                <tr class="cartpage">
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ URL::to('public/admin/image/product/'.$item -> options -> image)}}" alt="" style="height:115px;">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $item -> name }}</h6>
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h5>{{number_format( $item ->price).' VND' }}</h5>
                                        </div>

                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                                {{ csrf_field() }}
                                                    <input type="number" value="{{$item -> qty}}" name="cart_quantity">
                                                    <input type="hidden" value="{{$item -> rowId}}" name="rowId_cart" class="form-control">
                                                    <input type="submit" value="update" name="update_qty" class="btn btn-default btn-sm">
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="cart-grand-total-price"><?php
                                                                                $subtotal = $item->price * $item->qty;
                                                                                echo number_format($subtotal) . ' VND';
                                                                                ?></span>
                                    </td>
                                    <td class="cart__close"><a href="{{URL::to('/delete-cart/'.$item->rowId)}}"><i class="fa fa-close"></i></a></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="/shop">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div> -->


                </div>
                <div class="col-lg-4" id="totalajaxcall">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="/check-coupon" method="POST">
                            @csrf
                            <input type="text" placeholder="Coupon code" name="coupon">
                            <button type="submit" name="check_coupon">Apply</button>

                        </form>
                    </div>
                    <div class="cart__total" class="totalpricingload">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span>{{number_format((float)Cart::total()) . ' 000 VND'}}</span></li>
                            <li>Discount:
                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key=> $cou)
                                         @if($cou['coupon_condition']==1)
                                             Discount code: {{$cou['coupon_number']}}
                                            <p>
                                            @php
                                                $total_coupon = (float)Cart::total() - $cou['coupon_number'];
                                                echo '<p>Amount:'.number_format($total_coupon).'VND</p>'
                                    @endphp
                                </p>

                                @else
                                {{$cou['coupon_number']}} %
                                <p>
                                    @php
                                    $total_coupon = ((float)Cart::total() * $cou['coupon_number'])/100;
                                    echo '<p>Amount:'.number_format($total_coupon).' 000 VND</p>'
                                    @endphp
                                </p>
                                @endif
                                @endforeach
                                @endif
                            </li>
                           

                        </ul>
                        <!-- <a type="submit" href="{{ URL::to('/check-out')}}">Proceed to checkout</a> -->
                        @auth
                       
                        <a class="btn btn-primary" href="{{ URL::to('/check-out') }}">Check Out</a>
                       
                        @endauth
                        @guest
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                      
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

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