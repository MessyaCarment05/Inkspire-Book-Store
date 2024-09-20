<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
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
   <div class="collection-all-wrapper">
    <div class="our-collection-wrapper">
        <div class="our-collection">
            <h3 class="left-our">CART</h3>
            <h3 class="right-our">LIST</h3>
        </div>
    </div>
    @if($cart->isEmpty())
        <div style="width: 100%; padding: 20px; display:flex; justify-content:center; font-size: 50px; font-weight: bold; color: #dc3545;">
            Your cart is empty!
        </div>
        <div style="width: 100%; padding: 20px; display:flex; justify-content:center; font-size: 50px; font-weight: bold; color: #dc3545;">
            <a href="/showCheckout">
                 
                <button style="padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                    View Order Summary
                </button>
            </a>
        </div>
    @else
        <div class="collection-wrapper" style="display: flex; flex-wrap: wrap; gap: 1rem;">
            <table style="width:90%; border-collapse: collapse; margin-bottom: 20px; border: 1px solid #ddd;">
                <thead>
                    <tr>
                        <th style="padding: 15px; text-align: left; background-color: #333; color: white;">Book Title</th>
                        <th style="padding: 15px; text-align: left; background-color: #333; color: white;">Book Author</th>
                        <th style="padding: 15px; text-align: left; background-color: #333; color: white;">Book Category</th>
                        <th style="padding: 15px; text-align: left; background-color: #333; color: white;">Book Price</th>
                        <th style="padding: 15px; text-align: left; background-color: #333; color: white;">Quantity</th>
                        <th style="padding: 15px; text-align: left; background-color: #333; color: white;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $carts)
                    <tr>
                        <td style="padding: 15px; border: 1px solid #ddd;">{{$carts->cart_book_title}}</td>
                        <td style="padding: 15px; border: 1px solid #ddd;">{{$carts->cart_book_author}}</td>
                        <td style="padding: 15px; border: 1px solid #ddd;">{{$carts->category->category_name}}</td>
                        <td style="padding: 15px; border: 1px solid #ddd;">Rp. {{$carts->cart_book_price}},-</td>
                        <td style="padding: 15px; border: 1px solid #ddd;">{{$carts->cart_book_quantity}}</td>
                        <td style="padding: 15px; border: 1px solid #ddd;">
                            <div style="display: flex; gap: 5px;">
                                <form action="{{ route('checkout.book', $carts->id) }}" method="POST">
                                    @csrf
                                  
                                    <button type="submit" style="padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100px;">Checkout</button>
                                </form>
                                <form action="{{ route('cart.delete', $carts->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button style="padding: 10px 15px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100px;">Remove</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="padding-right: 90px; width: 100%; display: flex; justify-content: flex-end; padding-top: 20px;">
                <a href="/showCheckout">
                 
                    <button style="padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                        View Order Summary
                    </button>
                </a>
            </div>
            
        </div>
    @endif
    
</div>

    
 {{-- Book Collection End --}}




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