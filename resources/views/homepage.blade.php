<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
</head>
<body>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="route('logout')"><button type="submit" class="btn btn-primary btn-block" style="border-style: solid; background: rgba(251, 111, 111, 0.712); color: black; border-color: rgb(179, 179, 179); text-align: left; padding-left: 3.8rem;">Logout<i class="fa-solid fa-arrow-right-from-bracket" style="margin-left: 5.3rem;"></i></button></a>
        
    </form>
    <div class="col-auto">
        <h3 class="display-6" style="font-family: 'DM Sans'; font-size: 35px; font-weight: 600; margin-top: 1.2rem; color: black">Welcome to BookStore, {{auth()->user()->name}}</h3>
    </div>
</body>
</html>