<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Zando - Product Detail</title>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>

<body>
    <header>
        <button class="hamburger">☰</button>
        <nav class="nav-menu">
            <div class="menu-left">
                <a href="/">Home</a>
                <div class="dropdown">
                    <p>Men</p>
                    <div class="dropdown-content">
                        <a href="/ones#men-shoes">Shoes</a>
                        <a href="/ones#men-shirts">Shirts</a>
                    </div>
                </div>
                <div class="dropdown">
                    <p>Women</p>
                    <div class="dropdown-content">
                        <a href="/ones#women-shoes">Shoes</a>
                        <a href="/ones#women-shirts">Shirts</a>
                        <a href="/ones#women-jeans">Jeans</a>
                    </div>
                </div>
                <div class="dropdown">
                    <p>Accessories</p>
                    <div class="dropdown-content">
                        <a href="/ones#accessories-necklaces">Necklaces</a>
                        <a href="/ones#accessories-rings">Rings</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="logo">
            <h1><a href="/ones">ONES</a></h1>
        </div>
        <div class="menu-right">
            <input type="search" name="search" placeholder="Search..." class="search-bar" autocomplete="off">
            <a href="/cart" title="Add to Bag" class="cart menu-right-btn" data-count="0">🛍️</a>

            @guest
            <button class="login">Login</button>
            <button class="register">Register</button>
            @endguest

            @auth
            <a title="User Account" class="account-btn">👤</a>
            <div class="profile-dropdown">
                <li class="username">{{ Auth::user()->username }}</li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="logout">Logout</button>
                </form>
            </div>
            @endauth

            <!-- <div class="account-menu">
                <button title="Notifications">🔔</button>
                <button title="Add to Bag" class="cart" data-count="0">🛍️</button>
            </div> -->
        </div>
    </header>

    <!-- login popup -->
    <div class="popup-bg"></div>
    <div class="popup">
        <button class="close" style="font-size: 24px;">&#215;</button>
        <div class="popup-nav">
            <button class="popup-nav-button nav-login">Login</button>
            <button class="popup-nav-button nav-reg">Register</button>
        </div>
        <div>
            <form action="{{ route('login') }}" method="post" class="login-body">
                @csrf
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" required>
                <button type="submit" class="login-submit">Login</button>
            </form>
        </div>
        <div class="error"></div>
        <div>
            <form action="{{ route('register') }}" method="post" class="register-body">
                @csrf
                <label for="regi-username">Username</label>
                <input type="text" id="regi-username" name="username" required value="{{ old('username') }}">
                <label for="regi-password">Password</label>
                <input type="password" id="regi-password" name="password" required value="{{ old('password') }}">
                <label for="confirm-pw">Confirm Password</label>
                <input type="password" id="confirm-password" name="password_confirmation" value="{{ old('confirm-password') }}" required>
                <button type="submit" class="register-submit">Register</button>
            </form>
        </div>
    </div>
    @yield('content')

    <script src="{{ asset('js/search.js') }}"></script>
    <script src="{{ asset('js/cart_count.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/loginout.js') }}"></script>
</body>

</html>