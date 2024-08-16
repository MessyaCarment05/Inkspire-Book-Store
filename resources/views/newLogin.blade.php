<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="pics\Logo Inkspire.png" alt="">
        </div>
   </div>

    <div class="content-wrapper">
        <div class="form-wrapper">
            <div class="left-wrapper">
            </div>
            <div class="right-wrapper">
               <form action="{{route('login')}}" method="POST">
                 @csrf
                   <div class="input-container">
                        <label for="Email">Email</label>
                        <input type="email" id="email" name="email" placeholder="john.doe@gmail.com" required >
                    </div>
                   
                    <div class="input-container">
                        <label for="password">Password</label>
                        <div class="input-password">
                            <input type="password"class="input-password-detail" id="password" pattern=".{8,}"  name="password"  placeholder="Password must be at least 8 characters long" required>
                            <span class="input-group-text" onclick="password_show_hide();" style="background-color:white">
                                <i class="fas fa-eye" id="show_eye"></i>
                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                            </span>
                        </div>
                        
                    </div>
                   
                    <button type="submit">Login</button>
                    <a class="link-register"href="/register">Don’t have an account? </a>
               </form>
            </div>
        </div>
    </div>
    <script src="{!! asset('/js/loginregister.js') !!}"></script>
</body>
</html>