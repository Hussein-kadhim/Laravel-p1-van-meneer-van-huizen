<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Spel App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <div class="container header-content">
            <a href="{{ route('home') }}" class="logo">Spel App</a>

            <button
                type="button"
                class="hamburger"
                id="hamburger-btn"
                aria-label="Menu openen of sluiten"
                aria-expanded="false"
                aria-controls="nav-menu"
            >
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
            </button>

            <nav class="nav" id="nav-menu">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">Categorieën</a>
                <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">Producten</a>
                <a href="{{ route('orders.index') }}" class="{{ request()->routeIs('orders.*') ? 'active' : '' }}">Bestellingen</a>
                <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">Gebruikers</a>
                <a href="{{ route('roles.index') }}" class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">Rollen</a>
                <a href="{{ route('prices.index') }}" class="{{ request()->routeIs('prices.*') ? 'active' : '' }}">Prijzen</a>
                <a href="{{ route('reviews.index') }}" class="{{ request()->routeIs('reviews.*') ? 'active' : '' }}">Reviews</a>
                @auth
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="background:none; border:none; cursor:pointer; font:inherit; padding:0.5rem 1rem; color:inherit;">Uitloggen</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Inloggen</a>
                @endauth
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container footer-content">
            <p>&copy; {{ date('Y') }} Spel App. Alle rechten voorbehouden.</p>
        </div>
    </footer>
</body>
</html>
