<nav
    class="navbar has-shadow pad"
    role="navigation"
    aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="">
            <img src="{{ asset('img/berijalanver.png') }}"></a>

            <a
                role="button"
                class="navbar-burger"
                aria-label="menu"
                aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a href="/home" class="navbar-item" id="home-nav">
                    Beranda
                </a>
                <a href="/book" class="navbar-item" id="book-nav">
                    Reservasi
                </a>
                <a href="/history" class="navbar-item" id="history-nav">
                    Riwayat
                </a>
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="{{route('logout')}}" class="button is-light">
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>