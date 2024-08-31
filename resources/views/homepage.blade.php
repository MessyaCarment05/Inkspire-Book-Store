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
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css”>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
         {{-- Navbar Start --}}
            <nav class="navbar">
                <div class="nav-left-wrapper">
                    <a href="/homepage"><img src="pics\Logo Inkspire.png" alt="" class="nav-logo"></a>
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
                        <a href="/profile" class="nav-link">PROFILE</a>
                    </div>
                    <div class="nav-menu">
                        {{-- <a href="/cart" class="nav-link">CART</a> --}}
                        <a href="/cart" style="text-decoration: none;" class="nav-link">
                            <i class="fas fa-shopping-cart" style="color: white; transition:0.5s ease;" onmouseover="this.style.color='black'" onmouseout="this.style.color='white'"></i>
                        </a>
                        
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
   {{-- Best Seller Start --}}
        <div class="collection-all-wrapper">
            <div class="our-collection-wrapper">
                <div class="our-collection">
                    <h3 class="left-our">BEST</h3>
                     <h3 class="right-our">SELLER</h3>
                </div>
                <div class="see-more-wrapper">
                    <div class="see-more">
                       <a href="/bookcollection" style="text-decoration: none;"> <h3 class="more-book">></h3></a>
                    </div>
                </div>
               
            </div>
            <div class="collection-wrapper">
                <div class="collection-wrapper">
                    @foreach ($books->slice(5, 5) as $book)
                        <div class="card" style="width: 23 rem; margin-top: 1rem; margin-left: 1rem; border-radius: 10px; cursor: pointer; border-color: none; height:fit-content; z-index:1;">
                            <img class="card-img-top" src="{{asset($book->book_image)}}" alt="Card image cap" style="width: 65%; align-self: center; margin-top: 0.5rem; border-radius: 10px; border-style: solid; border-color:grey;">
                            <div class="card-body" style="font-family: 'DM Sans';">
                                <a href="{{route('books.showDetail', $book->id)}}" style="text-decoration: none;"><h5 class="card-title" style="font-weight: 600; margin-left: -0.5rem; color: black;">{{$book->book_title}}</h5></a>
                                <p class="clientposter" style="margin-top: -0.5rem; font-size: 15px; margin-left: -0.5rem;">{{$book->book_author}}</p>
                                <p class="card-text" style="margin-left: -0.5rem;">Rp. {{$book->book_price}},-</p>
                                <span class="badge badge-pill badge-primary" style="background-color: #e67e22; border-radius: 50px; font-size: 13px; margin-left: -0.5rem;">{{$book->category->category_name}}</span>
                                <a href=""style="text-decoration: none;"><i class="fas fa-shopping-cart" style="font-size: 20px; float: right; padding-top: 0.15rem; color:black;"></i></a>        
                            </div>
                        </div>
                    @endforeach
                   
                </div>
                
            </div>
        </div>
     {{-- Best Seller End --}}
      {{-- Book Collection Start --}}
      <div class="collection-all2-wrapper">
        <div class="our-collection-wrapper">
            <div class="our-collection">
                <h3 class="left-our">BOOK</h3>
                 <h3 class="right-our">COLLECTION</h3>
            </div>
            <div class="see-more-wrapper">
                <div class="see-more">
                    <a href="/bookcollection" style="text-decoration: none;"> <h3 class="more-book">></h3></a>
                </div>
            </div>
           
        </div>
        <div class="collection-wrapper">
                @foreach ($books->take(5) as $book)
                    <div class="card" style="width: 23rem; margin-top: 1rem; margin-left: 1rem; border-radius: 10px; cursor: pointer; border-color: none; height:fit-content; z-index:1;">
                        <img class="card-img-top" src="{{asset($book->book_image)}}" alt="Card image cap" style="width: 65%; align-self: center; margin-top: 0.5rem; border-radius: 10px; border-style: solid; border-color:grey;">
                        <div class="card-body" style="font-family: 'DM Sans';">
                        <a href="{{route('books.showDetail', $book->id)}}" style="text-decoration: none;"><h5 class="card-title" style="font-weight: 600; margin-left: -0.5rem; color: black;">{{$book->book_title}}</h5></a>
                        <p class="clientposter" style="margin-top: -0.5rem; font-size: 15px; margin-left: -0.5rem;">{{$book->book_author}}</p>
                        <p class="card-text" style="margin-left: -0.5rem;">Rp. {{$book->book_price}},-</p>
                        <span class="badge badge-pill badge-primary" style="background-color: #e67e22; border-radius: 50px; font-size: 13px; margin-left: -0.5rem;">{{$book->category->category_name}}</span>
                        <a href=""style="text-decoration: none;"><i class="fas fa-shopping-cart" style="font-size: 20px; float: right; padding-top: 0.15rem; color:black;"></i></a>        
                        </div>
                    </div>
                @endforeach
        </div>
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
     {{-- Footer Stop        --}}
    
    <script src="{!! asset('/js/homepage.js') !!}"></script>

</body>
</html>