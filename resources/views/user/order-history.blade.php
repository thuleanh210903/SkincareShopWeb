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
    <style>
        body {
            margin-top: 22px;
            background: rgb(99, 39, 120)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
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
    <table class="table table-hover table-bordered" id="sampleTable">
        <thead>
            <tr>
                <th width="10"><input type="checkbox" id="all"></th>
                <th>ID đơn hàng</th>
                <th>Tổng tiền</th>
                <th>Tình trạng</th>
                <th>Ngày đặt</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($order_by_user as $order)
            <tr>
                <td width="10"><input type="checkbox" name="check1" value="1"></td>
                <td><a href="{{URL::to('/view-order-detail-user/'.$order->id_order)}}">{{$order->id_order}}</a></td>
                <td>{{$order->order_total}}. 000 VND</td>
                <td>
                    <?php
                    if ($order->order_status == 0) {
                        echo '<span class="badge bg-warning">Đang giao hàng</span></td>';
                    } elseif ($order->order_status == 1) {
                        echo '<span class="badge bg-success">Hoàn thành</span></td>';
                    } elseif ($order->order_status == 2) {
                        echo '<span class="badge bg-danger">Chưa duyệt</span></td>';
                    }
                    ?>

                    <span class="badge bg-success">Hoàn thành</span>
                </td>
                <td>{{$order->order_date}}</td>
               
            </tr>
            @endforeach
        </tbody>
    </table>


    @include('user.layouts.footer')




</body>

</html>