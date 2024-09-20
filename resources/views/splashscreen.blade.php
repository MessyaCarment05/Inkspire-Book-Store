<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/splashscreen.css') }}">
    <title>Inkspire</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #e67e22, #f39c12);
            padding: 15px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar img {
            height: 60px;
        }

        .right-wrapper {
            display: flex;
            gap: 20px;
        }

        .login-button, .register-button {
            display: inline-block;
            padding: 10px 25px;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .login-button {
            background-color: #fff;
            border: 2px solid #e67e22;
            color: #e67e22;
        }

        .login-button:hover {
            background-color: #e67e22;
            color: #fff;
        }

        .register-button {
            background-color: #f39c12;
            color: #fff;
            border: 2px solid transparent;
        }

        .register-button:hover {
            background-color: #ffcc00;
            color: #fff;
        }

        /* Splash Screen Styles */
        .splash-screen {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #f39c12 30%, #ffcc00 70%);
            text-align: center;
        }

        .splash-content {
            background: rgba(255, 255, 255, 0.9);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            max-width: 80%;
        }

        h1 {
            font-size: 3.5rem;
            margin: 0 0 20px;
            color: #333;
        }

        p {
            font-size: 1.2rem;
            color: #666;
            margin: 0 0 40px;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #fff;
            background-color: #e67e22;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #d35400;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="left-wrapper">
            <img src="pics/Logo Inkspire.png" alt="Inkspire Logo">
        </div>
        <div class="right-wrapper">
            <a class="login-button" href="/login">Login</a>
            <a class="register-button" href="/register">Register</a>
        </div>
    </div>

    <div class="splash-screen">
        <div class="splash-content">
            <h1>Welcome to Inkspire</h1>
            <p>Your gateway to a world of inspiring books.</p>
            <a href="/homepage" class="button">Explore Now</a>
        </div>
    </div>

  
</body>
</html>
