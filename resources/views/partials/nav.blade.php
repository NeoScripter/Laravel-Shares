<header class="header">
    <nav class="header__nav" aria-label="Main navigation">
        <ul>
            <li>
                <a href="{{ route('home') }}" class="header__link header__link--home"
                    aria-label="Login to your account">Home</a>
            </li>
            @auth
                <li class="header__auth-il header__link--admin">
                    {{ Auth::user()->name }}
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="header__link" aria-label="Logout">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('login') }}" class="header__link header__link--login"
                        aria-label="Login to your account">Login</a>
                </li>
                <li>
                    <a href="{{ route('signup') }}" class="header__link" aria-label="Sign up for an account">Signup</a>
                </li>
            @endguest
        </ul>
    </nav>
</header>
