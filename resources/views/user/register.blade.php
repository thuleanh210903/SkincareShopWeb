<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css"> -->


    <meta name="robots" content="noindex, follow">
    <link rel="stylesheet" href="{{ asset('client/css/register.css') }}" type="text/css">
</head>

<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
        <div class="inner">
        <div class="image-holder">
                <img src="https://i.pinimg.com/564x/50/df/f6/50dff6e387d33bbd559e7421b90048a0.jpg" alt="">
        </div>
        <form action="{{ route('register.action') }}"  class="form-register"  method="POST">
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Your name" />
            </div>

            <div class="form-wrapper">

                <input class="form-control" type="username" name="username" value="{{ old('username') }}" placeholder="Username" />
                <i class="zmdi zmdi-account"></i>
            </div>

            <div class="form-wrapper">

                <input class="form-control" type="password" name="password" placeholder="Password" />
                <i class="zmdi zmdi-lock"></i>
            </div>
            <div class="form-wrapper">
               
                <input class="form-control" type="password" name="password_confirm"  placeholder="Confirm Password" />
                <i class="zmdi zmdi-lock"></i>
            </div>

          
            <div class="mb-3">
                <button class="btn btn-primary">Register</button>

            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</body>

</html>