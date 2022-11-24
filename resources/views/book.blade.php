<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link href="https://fonts.cdnfonts.com/css/nunito" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200"/>
    </head>
    <style>
        .navbar-item img {
            max-height: 2.8rem;
        }
        #nu {
            font-family: 'Nunito', sans-serif;
        }
        @media all and (min-width:1024px) {
            .pad {
                padding-left: 4.725rem;
                padding-right: 4.725rem;
            }
        }
        @media all and (max-width:1023px) {
            .pad-mob {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
        }
        #primarytechno {
            background-color: #2c598d;
            box-shadow: rgba(0, 0, 0, 0.19) 0 10px 20px, rgba(0, 0, 0, 0.23) 0 6px 6px;
        }
        .img {
            width: 100%;
            max-width: 1368px;
            height: auto;
            box-shadow: rgba(0, 0, 0, 0.19) 0 10px 20px, rgba(0, 0, 0, 0.23) 0 6px 6px;
        }
    </style>
    <body style="background-color: #f0f2f5;">
        <nav
            class="navbar has-shadow pad"
            role="navigation"
            aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="">
                    <img src="{{ asset('img/berijalanver.png') }}">
                </a>

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
                    <a href="/book" class="navbar-item">
                        Home
                    </a>
                    <a class="navbar-item">
                        Booking
                    </a>
                    <a class="navbar-item">
                        History
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
        <div class="container my-5 pad-mob">
            <div class="columns">
                <div class="column">
                    <h1 id="nu" class="title">Welcome, {{auth()->user()->name}}!</h1>
                </div>
            </div>
            <div class="columns is-mobile">
                <div class="column">
                    <a href="#">
                        <div id="primarytechno" class="hero is-primary" style="border-radius: 12px;">
                            <div class="hero-body has-text-centered">
                                <div class="columns p-0">
                                    <div class="column p-0">
                                        <span class="material-symbols-outlined" style="font-size: 534%;">
                                            room_service
                                        </span>
                                    </div>
                                </div>
                                <div class="columns p-0">
                                    <div class="column p-0">
                                        <h1 class="title is-4">Booking</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="column">
                    <a href="#">
                        <div
                            id="primarytechno"
                            class="hero is-primary is-square"
                            style="border-radius: 12px;">
                            <div class="hero-body has-text-centered">
                                <div class="columns p-0">
                                    <div class="column p-0">
                                        <span class="material-symbols-outlined" style="font-size: 534%;">
                                            history
                                        </span>
                                    </div>
                                </div>
                                <div class="columns p-0">
                                    <div class="column p-0">
                                        <h1 class="title is-4">History</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="columns">
                <div class="column has-text-centered">
                    <img src="{{ asset('img/img-office.jpeg') }}" class="img">
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $(".navbar-burger").click(function () {
                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");

            });
        });
    </script>
</html>