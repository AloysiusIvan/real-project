<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap"
            rel="stylesheet">
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
            color: white;
        }
        @media all and (min-width:1024px) {
            .pad {
                padding-left: 4.725rem;
                padding-right: 4.725rem;
            }
            body {
                height: 100vh;
                background: linear-gradient(to top, #f0f2f5 0%, #f0f2f5 31%, #2c598d 31%, #2c598d 100%);
            }
            .mawe {
                margin-left: 9.875rem;
                margin-right: 9.875rem;
                margin-top: 9.375rem;
            }
            .mabo {
                margin-top: 4.875rem;
            }
        }
        @media all and (max-width:1023px) {
            .pad-mob {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
            body {
                height: 100vh;
                background: linear-gradient(to top, #f0f2f5 0%, #f0f2f5 47%, #2c598d 47%, #2c598d 100%);
            }
            .mawe {
                margin-top: 5.875rem;
            }
            .mabo {
                margin-top: 5rem;
            }
        }
        #primarytechno {
            background-color: #2c598d;
        }
        .img {
            width: 100%;
            max-width: 1368px;
            height: auto;
            box-shadow: rgba(0, 0, 0, 0.19) 0 10px 20px, rgba(0, 0, 0, 0.23) 0 6px 6px;
        }
        .itemhome {
            margin: 12px;
            border-style: solid;
            border-width: 2px;
            border-radius: 6px;
            border-color: #d9dde3;
        }
    </style>
    <body>
        @include('nav')
        <div class="container pad-mob">
            <div class="columns">
                <div class="column mawe">
                    <h1 id="nu" class="title is-4">Selamat Datang,
                        {{auth()->user()->name}}</h1>
                </div>
            </div>
            <div class="columns is-centered pad-mob">
                <div class="column is-6-tablet is-9-desktop box mabo">
                    <div class="columns">
                        <div class="column itemhome">
                            <div class="columns">
                                <div class="column has-text-center">
                                    <p class="is-size-4">
                                        Yuk Reservasi Sekarang
                                    </p>
                                </div>
                                <div class="column has-text-right">
                                    <a href="/book">
                                        <button id="primarytechno" class="button is-primary has-text-weight-bold">
                                            Reservasi
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column itemhome">
                            <div class="columns">
                                <div class="column has-text-center">
                                    <p class="is-size-4">
                                        Ayo lihat riwayat pesanan kamu
                                    </p>
                                </div>
                                <div class="column has-text-right">
                                    <a href="/history">
                                        <button id="primarytechno" class="button is-primary has-text-weight-bold">
                                            Riwayat
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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

        $("#home-nav").css({"background-color":"#d3e3ff", "color":"#001c39"});
    </script>
</html>