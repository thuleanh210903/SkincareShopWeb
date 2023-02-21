<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Soko Glam">
    <meta name="keywords" content="Soko Glam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soko Glam</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('client/css/login.css')}}" type="text/css">


</head>

<body>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>



</body>

<div class="overlay">
    <!-- LOGN IN FORM by Omar Dsoky -->

    <form action="{{ route('login.action') }}" method="POST">
        @csrf
        <header class="head-form">
            <h2>Log In</h2>
            <!--     A welcome message or an explanation of the login form -->
            <p>login here using your username and password</p>
        </header>
        <br>
        <div class="mb-3">
            <span class="input-item">
                <i class="fa fa-user-circle"></i>
            </span>
            <label>Username <span class="text-danger">*</span></label>
            <input class="form-input" type="username" placeholder="UserName" required name="username" value="{{ old('username') }}" />
        </div>
        <div class="mb-3">
            <span class="input-item">
                <i class="fa fa-key">Password</i>
                <input class="form-input" type="password" name="password" />
            </span>
           
        </div>
        <div class="mb-3">
            <button class="log-in">Login</button>
            <a href="forgotPassword" class="log-in">Forgot Password</a>


        </div>


       
    </form>
  
</div>

</html>









<!-- 
<div class="row">
    <div class="col-md-6">
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('login.action') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Login</button>
               
            </div>
        </form>
    </div>
</div> -->