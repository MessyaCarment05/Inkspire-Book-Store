<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
    <header>
         {{-- Navbar Start --}}
            <nav class="navbar">
                <div class="nav-left-wrapper">
                    <img src="pics\Logo Inkspire.png" alt="" class="nav-logo">
                </div>
                <div class="nav-right-wrapper">
                    <div class="nav-menu">
                        <a href="/homepage" class="nav-link">HOME</a>
                    </div>
                    <div class="nav-menu">
                        <a href="/book" class="nav-link">COLLECTION</a>
                    </div>
                    <div class="nav-menu">
                        <a href="/contactus" class="nav-link">CONTACT US</a>
                    </div>
                    <div class="nav-menu">
                        <a href="/contactus" class="nav-link">PROFILE</a>
                    </div>
                    <div class="nav-menu">
                        <a href="/cart" class="nav-link">CART</a>
                    </div>
                </div>
            </nav>
            {{-- Navbar Stop --}}
    </header>
   <div class="content-wrapper">
        <div class="hero-wrapper">
            <div class="hero-content-wrapper">
                <div class="hero-top-wrapper">
                    <h2>Where stories come to life and knowledge finds its home.</h2>
                </div>
                <div class="hero-bottom-wrapper">
                    <a href="/homepage">
                        <button href="/" class="hero-button">See Collection</button>
                    </a>
                </div>
            </div>
        </div>
   </div>
   {{-- Book Collection Start --}}
        <div class="collection-wrapper">
                @foreach ($books->take(5) as $book)
                    <div class="card-wrapper">
                        <div class="top-card-wrapper">
                            <div class="image-card-wrapper">
                                <img class="image-card" src="{{asset($book->book_image)}}" alt="">
                            </div>
                        </div>
                        <div class="bottom-card-wrapper">
                            <div class="atas-wrapper">
                                <div class="title-card-wrapper">
                                    <h2>{{$book->book_title}}</h4>
                                </div>
                                <div class="price-card-wrapper">
                                    <h4>Rp. {{$book->book_price}}</h4>
                                </div>
                                <div class="category-card-wrapper">
                                    <h5>{{$book->category->category_name}}</h5>
                                </div>
                            </div>
                            <div class="bawah-wrapper">
                                <div class="button-detail-wrapper">
                                    <a href="" class="button-detail-link">
                                        <button class="button-detail"href="">See Detail</button>
                                    </a>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
     {{-- Book Collection End --}}
   <form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="route('logout')"><button type="submit" class="btn btn-primary btn-block" style="border-style: solid; background: rgba(251, 111, 111, 0.712); color: black; border-color: rgb(179, 179, 179); text-align: left; padding-left: 3.8rem;">Logout<i class="fa-solid fa-arrow-right-from-bracket" style="margin-left: 5.3rem;"></i></button></a>
    
    </form>
    <div class="col-auto">
        <h3 class="display-6" style="font-family: 'DM Sans'; font-size: 35px; font-weight: 600; margin-top: 1.2rem; color: black">Welcome to BookStore, {{auth()->user()->name}}</h3>
    </div>
    {{-- Footer Start --}}
        <footer class="footer">
                <div class="footer-left">
                    <h3>Inkspire <span>Book Store</span></h3>
                    <p class="footer-links">
                        <a href="/homepage">Home</a>
                        |
                        <a href="/book">Collection</a>
                        |
                        <a href="/contactus">Contact Us</a>
                        |
                        <a href="/profile">Profile</a>
                        |
                        <a href="/cart">Cart</a>
                    </p>
                    <p class="footer-company-name">Copyright &#169 2024 <strong>Messya Carment</strong>
                        All right reserved
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
                        <p><a href="home.html">inskpire@gmail.com</a></p>
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
     {{-- Footer Stop        --}}
    
    <script src="{!! asset('/js/homepage.js') !!}"></script>

</body>
</html>