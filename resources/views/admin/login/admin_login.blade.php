
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="description" content="Soko Glam">
    <meta name="keywords" content="Soko Glam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/login.css')}}" type="text/css">
 
</head>

<body>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        function show() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById('idforgot');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
</body>

<div class="overlay">
    <!-- LOGN IN FORM by Omar Dsoky -->
    <form action="{{route('admin.loginAction')}}" method="POST">
      {{ csrf_field() }}
       <!--   con = Container  for items in the form-->
       <div class="con">
       <!--     Start  header Content  -->
       <header class="head-form">
          <h2>Admin</h2>
          <!--     A welcome message or an explanation of the login form -->
          <p>login here using your username and password</p>
       </header>
       <!--     End  header Content  -->
       <br>
       <div class="field-set">
         
          <!--   user name -->
             <span class="input-item">
               <i class="fa fa-user-circle"></i>
             </span>
            <!--   user name Input-->
             <input class="form-input" id="txt-input" type="text" placeholder="@UserName" required name="username">
            
          <br>
         
               <!--   Password -->
         
          <span class="input-item">
            <i class="fa fa-key"></i>
           </span>
          <!--   Password Input-->
          <input class="form-input" type="password" placeholder="Password" id="pwd"  name="password" required>
          
    <!--      Show/hide password  -->
         <span>
            <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
         </span>
         
         
          <br>
    <!--        buttons -->
    <!--      button LogIn -->
          <!-- <input type="submit" class="log-in" value="Log In"> -->
          <button class="log-in" type="submit" > Log In </button>
          
       </div>
      
    <!--   other buttons -->
       <div class="other">
    <!--      Forgot Password button-->
          <button class="btn submits frgt-pass" onclick="document.getElementById('idforgot').style.display='block'">Forgot Password</button>
    <!--     Sign Up button -->
          
    <!--      End Other the Division -->
       </div>
         
    <!--   End Conrainer  -->
      </div>
      
      <!-- End Form -->
    </form>
    @if (session()->has('errorLogin'))
        <div >
    
            {{ session()->get('errorLogin') }}
            
    
        </div>
        @endif
    </div>

</html>