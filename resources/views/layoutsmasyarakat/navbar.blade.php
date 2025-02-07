<header id="header" class="header sticky-top">
    <div class="branding d-flex align-items-center">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('assets/img/logo_kota_banjar.png') }}" alt="">
                <h1 class="sitename">SUARA<br>REJASARI</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>

                    @guest
                        <li><a href="/login">Login</a></li>
                        <li><a class="cta-btn d-none d-sm-block" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>

                        @auth

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endauth

                    @endguest
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>


        </div>

    </div>

</header>
