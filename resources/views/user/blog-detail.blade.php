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
        @foreach($post as $key => $po)
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
                                <h3><b>{{ $po->post_title }}</b></h3>
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel" style="margin-top:20px">
                                        <div class="product__details__pic__item">
                                            <img src="{{ URL::to('public/admin/image/post/'.$po->post_image)}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="product__details__content">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">

                                <div class="product__details__text" style="text-align:left">
                                    
                                    <?php
                                    echo $po -> content;
                                    echo $po -> post_meta_desc
                                    ?>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product__details__tab">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                            <div class="product__details__tab__content">

                                                <div class="product__details__tab__content__item">



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

        @endforeach
    </section>


    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->

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
<script type="text/javascript">
    $(document).ready(function() {
        // var _token = $('input[name="_token"]').val();
        // var product_id = $('comment_product_id').val();
        // alert(product_id)
        load_comment();

        function load_comment() {
            var _token = $('input[name="_token"]').val();
            var id_product = $('.comment_product_id').val();
            $.ajax({
                url: "{{ url('/load-comment') }}",
                method: "POST",
                data: {
                    id_product: id_product,
                    _token: _token
                },
                success: function(data) {

                    $('#comment_show').html(data);
                }
            });
        }
        $('.send-comment').click(function() {
            var id_product = $('.comment_product_id').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ url('/send-comment') }}",
                method: "GET",
                data: {
                    id_product: id_product,
                    comment_content: comment_content,
                    _token: _token
                },

                success: function(data) {

                    load_comment();
                }
            });
        });


    });
</script>
<script src="{{ asset('client/js/alertify.min.js') }}"></script>

</html>