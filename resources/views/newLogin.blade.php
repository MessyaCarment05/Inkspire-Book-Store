<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <title>Login Page</title>
</head>
<body>
    <div class="content-wrapper">
        <div class="left-wrapper">
        </div>
        <div class="right-wrapper">
           <form action="{{route('login')}}" method="POST">
             @csrf
               <div class="input-container">
                    <label for="Email">Email</label>
                    <input type="email" id="email" name="email"  required>
                </div>
               
                <div class="input-container">
                    <label for="name">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
               
                <button type="submit">Login</button>
                <a href="/register">Don’t have an account? </a>
           </form>
        </div>
    </div>
</body>
</html>