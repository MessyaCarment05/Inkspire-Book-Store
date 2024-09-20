<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   
</head>
<body>
    <header>
        {{-- Navbar Start --}}
        <nav class="navbar">
            <div class="nav-left-wrapper">
                <a href="/homepage"><img src="{{asset('pics/Logo Inkspire.png')}}" alt="" class="nav-logo"></a>
            </div>
            <div class="nav-right-wrapper">
                <div class="nav-menu">
                    <a href="/homepage" class="nav-link">HOME</a>
                </div>
                <div class="nav-menu">
                    <a href="/bookcollection" class="nav-link">COLLECTION</a>
                </div>
                <div class="nav-menu">
                    <a href="/contactus" class="nav-link">CONTACT US</a>
                </div>
                <div class="nav-menu">
                    <a href="{{ route('user.edit', ['id' => Auth::user()->id]) }}" class="nav-link">PROFILE</a>
                </div>
                <div class="nav-menu">
                    <a href="/cart" style="text-decoration: none;" class="nav-link">
                        <i class="fas fa-shopping-cart" style="color: white; transition:0.5s ease;" onmouseover="this.style.color='black'" onmouseout="this.style.color='white'"></i>
                    </a>
                </div>
            </div>
        </nav>
        {{-- Navbar Stop --}}
    </header>

    <div class="profile-container">
        <h2>Edit Profile</h2>
        <form action="{{ route('user.updateProfile', ['id' => $user->id]) }}" method="POST" style="display: flex; flex-direction: column; gap: 10px;">
            @csrf
        
            <div style="display: flex; flex-direction: column;">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="{{ auth()->user()->name }}" required style="width: 500px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
            </div>
        
            <div style="display: flex; flex-direction: column;">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="{{ auth()->user()->email }}" required style="width: 500px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
            </div>
        
            <div style="display: flex; flex-direction: column;">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="{{ auth()->user()->address }}" style="width: 500px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
            </div>
        
            <div style="display: flex; flex-direction: column;">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" placeholder="{{ auth()->user()->phone_number }}" style="width: 500px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
            </div>
        
            <button type="submit" style="margin-top: 10px; padding: 10px 15px; font-size: 16px;">Save Changes</button>
        </form>
        
        <div class="change-password-section">
            <h2 class="section-title">Change Password</h2>
            <p class="section-description">To change your password, please fill out the form below.</p>
            <form action="{{ route('user.UpdatePassword') }}" method="POST">
                @csrf
                
                <label for="current_password">Current Password</label>
                <div class="input-group">
                    <input type="password" class="input-password-detail" id="current_password" name="current_password" pattern=".{8,}" placeholder="Password must be at least 8 characters long" required>
                    <span class="input-group-text" onclick="togglePasswordVisibility('current_password', 'eye_current')" style="cursor: pointer;">
                        <i class="fas fa-eye" id="eye_current"></i>
                    </span>
                </div>
        
                <label for="new_password">New Password</label>
                <div class="input-group">
                    <input type="password" class="input-password-detail" id="new_password" name="password" pattern=".{8,}" placeholder="Password must be at least 8 characters long" required>
                    <span class="input-group-text" onclick="togglePasswordVisibility('new_password', 'eye_new')" style="cursor: pointer;">
                        <i class="fas fa-eye" id="eye_new"></i>
                    </span>
                </div>
        
                <label for="new_password_confirmation">Confirm New Password</label>
                <div class="input-group">
                    <input type="password" class="input-password-detail" id="new_password_confirmation" name="password_confirmation" pattern=".{8,}" placeholder="Password must be at least 8 characters long" required>
                    <span class="input-group-text" onclick="togglePasswordVisibility('new_password_confirmation', 'eye_confirmation')" style="cursor: pointer;" >
                        <i class="fas fa-eye" id="eye_confirmation"></i>
                    </span>
                </div>
        
                <button type="submit" style="margin-top: 10px; padding: 10px 15px; font-size: 16px;">Update Password</button>
            </form>
        </div>
        
        {{-- Logout Button Section --}}
        <div class="logout-section" style="margin-top: 20px;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary btn-block" style="border-style: solid; background-color: #e67e22; color: white; border-color: #ccc; padding: 10px 15px; font-size: 16px;">
                    Logout<i class="fa-solid fa-arrow-right-from-bracket" style="margin-left: 10px;"></i>
                </button>
            </form>
        </div>
    
    </div>
    
    
    

    {{-- Footer Start --}}
    <footer class="footer">
        <div class="footer-left">
            <h3>Inkspire <span>Book Store</span></h3>
            <p class="footer-links">
                <a href="/homepage">Home</a>
                |
                <a href="/bookcollection">Collection</a>
                |
                <a href="/contactus">Contact Us</a>
                |
                <a href="{{ route('user.edit', ['id' => Auth::user()->id]) }}">Profile</a>
            </p>
            <p class="footer-company-name">Copyright &#169 2024 <strong>Messya Carment</strong>
                All rights reserved
            </p>
        </div>
        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Tangerang</span>
                Banten</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+62 125319115</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="">inskpire@gmail.com</a></p>
            </div>
        </div>
    
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the company</span>
                <strong>Inkspire Book Store</strong>
                Inskspire is an online bookstore dedicated to bringing stories to life and making knowledge accessible to everyone. We offer a carefully curated 
                collection across genres to inspire, enlighten, and spark curiosity in every reader. Whether you're seeking adventure, wisdom, or comfort,
                Inskspire is here to accompany you on your literary journey.
            </p> 
        </div>
    </footer> 
    {{-- Footer Stop --}}
    <script src="{!! asset('/js/editprofile.js') !!}"></script>
</body>
</html>
