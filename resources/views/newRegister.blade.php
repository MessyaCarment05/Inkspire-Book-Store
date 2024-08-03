<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <title>Register Page</title>
</head>
<body>
    <div class="content-wrapper">
        <div class="left-wrapper">
        </div>
        <div class="right-wrapper">
           <form action="{{route('register')}}" method="POST">
                @if($errors->any())
                    {{$errors->first()}}
                @endif
                @csrf
               <div class="input-container">
                    <label for="name">Name</label>
                    <input type="text" placeholder ="John Doe" id="name" name="name"  required>
               </div>
               <div class="input-container">
                    <label for="email">Email</label>
                    <input type="email" placeholder ="john.doe@gmail.com" id="email"  name="email" required>
                </div>         
                <div class="input-container">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" placeholder="0812345678" phone_number" name="phone_number" required>
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Password must be at least 8 characters long" pattern=".{8,}"  name="password" required>
                </div>
                <div class="input-container">
                    <label for="password_conformation">Password Confirmation</label>
                    <input type="password" placeholder="Password must be at least 8 characters long"  id="password_confirmation" pattern=".{8,}" name="password_confirmation" required>
                </div>
                <button type="submit">Sign Up Now</button>
                <a href="/login">I am already a member</a>
           </form>
        </div>
    </div>
</body>
</html>