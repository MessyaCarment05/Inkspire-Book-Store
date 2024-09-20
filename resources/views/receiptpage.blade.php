<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Receipt</title>
    <link rel="stylesheet" href="{{ asset('css/receipt.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
       
        .collection-all-wrapper {
            padding: 60px 30px;
            max-width: 1200px;
            margin: auto;
        }
        .transaction-info {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border: 1px solid #ddd;
        }
        .transaction-info p {
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #444;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .summary {
            background-color: #fefefe;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .summary h3 {
            margin-bottom: 10px;
            font-size: 28px;
        }
        .summary p {
            font-size: 26px;
            color: #d35400;
            margin: 0;
        }

       
       
    </style>
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

    <div class="collection-all-wrapper">
        <h3 style="color: #ff9900; margin-bottom: 30px;">TRANSACTION RECEIPT</h3>

        <div class="transaction-info">
            <p><strong>Transaction ID:</strong> {{ $transaction_id }}</p>
            <p><strong>Date:</strong> {{ now()->toFormattedDateString() }}</p>
            <p><strong>Customer Name:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Customer Address:</strong> {{ auth()->user()->address }}</p>
            <p><strong>Customer Phone Number:</strong> {{ auth()->user()->phone_number }}</p>
            <p><strong>Payment Method:</strong> {{ $payment_method }}</p>
        </div>

        <div style="width: 100%; overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Book Author</th>
                        <th>Book Category</th>
                        <th>Book Price</th>
                        <th>Quantity</th>
                        <th>Subtotal Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $totalprice = 0;
                    $totalquantity = 0;
                    @endphp
                    @foreach ($receipts as $receipt)
                    <tr>
                        <td>{{ $receipt->receipt_book_title }}</td>
                        <td>{{ $receipt->receipt_book_author }}</td>
                        <td>{{ $receipt->category->category_name }}</td>
                        <td>Rp. {{ $receipt->receipt_book_price }},-</td>
                        <td>{{ $receipt->receipt_book_quantity }}</td>
                        <td>Rp. {{ $receipt->receipt_book_price * $receipt->receipt_book_quantity }},-</td>
                        @php
                            $totalprice += ($receipt->receipt_book_price * $receipt->receipt_book_quantity);
                            $totalquantity += $receipt->receipt_book_quantity;
                        @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="summary">
            <h3 style="color: #333;">Summary</h3>
            <div style="display: flex; justify-content: space-between; padding: 10px 0;">
                <h4 style="margin: 0;">Total Quantity:</h4>
                <p style="font-size: 24px; color: #d35400; margin: 0;">{{ $totalquantity }}</p>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 10px 0;">
                <h4 style="margin: 0;">Total Price:</h4>
                <p style="font-size: 24px; color: #d35400; margin: 0;">Rp. {{ $totalprice }},-</p>
            </div>
            <div style="border-top: 2px solid #ddd; margin-top: 20px; padding-top: 10px;">
                <h4 style="margin: 0; color: #555;">Thank you for your purchase!</h4>
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

</body>
</html>
