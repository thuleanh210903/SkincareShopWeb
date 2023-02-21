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
    <div class="content">

        <div class="container rounded bg-white mt-5 mb-5" style="width:75%">
            <div class="row">

               
                <div class="col-md-3 border-right">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{Auth::user()->name}}</span></div>
                    <ul>
                        <li style="display: block; background-color:antiquewhite" ><a href="/user">Account Information</a></li>
                        <li style="display: block;"><a href="/view-order-history">Order Information</a></li>
                    </ul>
                </div>
                <div class="col-md-5 border-right">
                    <form action="{{URL::to('/save-profile')}}">
                    {{ csrf_field() }}
                        <div class="p-3 py-5">
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"></div>
                                <div class="col-md-12"><label class="labels">Address</label><input type="text" name="address" class="form-control" value="{{Auth::user()->address}}"></div>
                                <div class="col-md-12"><label class="labels">Numberphone</label><input type="text" class="form-control" name="numberphone" value="{{Auth::user()->numberphone}}"></div>
                                <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" name="username" value="{{Auth::user()->username}}"></div>


                            </div>
                            <div class="row mt-3">
                                <!-- <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                            <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div> -->

                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    @include('user.layouts.footer')




</body>

</html>