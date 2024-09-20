<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Detail</title>
    <link rel="stylesheet" href="{{asset('css/seebookdetail.css')}}">
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
                   <a href="/homepage"><img src="{{asset('pics\Logo Inkspire.png')}}" alt="" class="nav-logo"></a>
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
                       {{-- <a href="/cart" class="nav-link">CART</a> --}}
                       <a href="/cart" style="text-decoration: none;" class="nav-link">
                           <i class="fas fa-shopping-cart" style="color: white; transition:0.5s ease;" onmouseover="this.style.color='black'" onmouseout="this.style.color='white'"></i>
                       </a>
                       
                   </div>
               </div>
           </nav>
           {{-- Navbar Stop --}}
   </header>
   {{-- Content --}}
   <div class="row">
    <div class="col-12">
        <div class="row align-items-center">
                <div class="col-auto">
                    <a href="/bookcollection">
                        <i class="fa-solid fa-chevron-left" style="font-size: 20px; margin-top: 1.6rem; margin-left: 3.7rem; color: black"></i>
                    </a>    
                </div>
                <div class="col-auto">
                    <h3 class="display-6" style="font-family: 'DM Sans'; font-size: 25px; font-weight: 600; margin-left: 2.5rem; margin-top: 2rem;">Book Collection</h3>
                </div>
        </div>
    </div>
</div>
   <div class="row" style="padding-top: 5rem;">
    <div class="col-1"></div>
    <div class="col-11">
        <div class="container-fluid">
            <div class="row">
                <div class="col-5 mr-5">
                    <img src={{asset($bookdetail->book_image)}} class="img-fluid" alt="image_seedetail">
                </div>
                <div class="col-6">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 pb-3">
                                <h2 style="color: #e0ac1a; font-size: 2rem; font-family: 'DM Sans';"><b>Book Title</b></h2>
                                <h3 style="font-size: 1.8rem; font-family: 'DM Sans'">{{$bookdetail->book_title}}</h3>
                            </div>
                            <div class="col-12">
                                <h2 style="color: #e0ac1a; font-size: 2rem; font-family: 'DM Sans';"><b>Category</b></h2>
                            </div>
                            <div class="col-12 pb-3">
                                <div class="row">
                                    
                                    <div class="col-5">
                                        <div class="category-text" style="font-size: 1.25rem; font-family: 'DM Sans'; border: 0.8px solid #e67e22; border-radius: 8000px; padding: 5px 10px; text-align: center;">
                                            {{ $bookdetail->category->category_name }}
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-12 pb-3">
                                <h2 style="color: #e0ac1a; font-size: 2rem; font-family: 'DM Sans';"><b>Book Author</b></h2>
                                <h3 style="font-size: 1.8rem; font-family: 'DM Sans'">{{$bookdetail->book_author}}</h3>
                            </div>
                            <div class="col-12 pb-3">
                                <h2 style="color: #e0ac1a; font-size: 2rem; font-family: 'DM Sans';"><b>Book Description</b></h2>
                                <h3 style="font-size: 1.8rem; font-family: 'DM Sans'">{{$bookdetail->book_description}}</h3>
                            </div>
                            <div class="col-12 pb-3">
                                <h2 style="color: #e0ac1a; font-size: 2rem; font-family: 'DM Sans';"><b> Book Price</b></h2>
                                <h3 style="font-size: 1.8rem; font-family: 'DM Sans'">Rp. {{$bookdetail->book_price}},-</h3>
                            </div>
                            @if($bookdetail->book_quantity>0)
                            <div class="col-12 pb-3">
                                <h2 style="color: #e0ac1a; font-size: 2rem; font-family: 'DM Sans';"><b>Quantity</b></h2>
                                <h3 style="font-size: 1.8rem; font-family: 'DM Sans'">{{$bookdetail->book_quantity}}</h3>
                            </div>
                            @else 
                                <div class="col-12 pb-3">
                                    <h2 style="color: #e0ac1a; font-size: 2rem; font-family: 'DM Sans';"><b>Quantity</b></h2>
                                    <h3 style="font-size: 1.8rem; font-family: 'DM Sans'">0 (Out of stock <i class="fas fa-times-circle" style="color: red; z-index:1;")></i>
                                    </button>)</h3>
                                </div>
                            @endif
                           @if($bookdetail->book_quantity>0)
                                <div class="row">
                                        <div class="col-12" style="padding-left: 30px; padding-bottom:30px; width :800px;">
                                            <form action="{{ route('add.cart', $bookdetail->id) }}" method="POST">
                                                @csrf
                                                
                                                <button class="btn btn-primary btn-lg btn-block" style="background-color:  #e67e22; padding:1em; font-family: 'DM Sans'; font-weight: 500; font-size:1.25rem; color: white; text-decoration: none;" type="submit" onsubmit="console.log('Form is submitting');">
                                                    Add to cart
                                                </button>
                                            </form>
                                        </div>
                                </div> 
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</body>
</html>