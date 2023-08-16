<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="/"><img src="https://cdn.shopify.com/s/files/1/0249/1218/files/Soko-Glam-logo-GSD-Blue_1.png?v=1613726693" alt="" style="max-width:80%"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="/about">About us</a></li>
                            <li><a href="/shop">Shop</a>
                                <ul class="dropdown">
                                    @foreach($category_product as $cate)
                                    <li><a href="{{ URL::to('/shop_category_product/'.$cate->id_category_product)}}">{{ $cate->name_category_product }}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                            <li><a href="/blog">Blog</a>
                                <ul class="dropdown">
                                 @foreach($category_post as $cate)
                                    <li><a href="{{ URL::to('/category_post/'.$cate->id_cate_post)}}">{{ $cate->cate_post_name }}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                            <!-- <li><a href="/contact">Contacts</a></li> -->
                            @auth
                            <li><a href="/user">User</a>
                                <ul class="dropdown">
                                    <li><a href="/user-profile">Profile</a></li>
                                    <li><a href="/view-order-user">Order History</a></li>
                                    <li><a href="/wishlist">wishlist</a></li>
                                    <li><a href="{{ route('password') }}">Change Password</a></li>
                                </ul>

                            </li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                            @endauth
                            @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @endguest

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search"><input type="search" placeholder="Search.." id="search_product"></a>
                        <!-- <img src="client/img/icon/search.png" alt=""> -->
                        <!-- <a href="#"><img src="client/img/icon/heart.png" alt=""></a> -->
                        <a href="#"><img src="client/img/icon/cart.png" alt="">
                            <span class="basket-item-count">
                                <span class="badge badge-pill red"> 0 </span>
                            </span>

                        </a>


                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
</header>
<script type="text/javascript">
    $(function() {
        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        $("#search_product").autocomplete({
            source: availableTags
        });
    });
</script>
<!-- Header Section End -->