<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
        <link href="https://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
    </head>
    <style>
        #primarytechno {
            background-color: #2c598d;
            .is-fullwidth;
        }
        #bg {
            background-image: url("{{ asset('img/3.png') }}"), url("{{ asset('img/2.png') }}"), url("{{ asset('img/1.png') }}"), url("{{ asset('img/bgtechno.png') }}");
            background-size: 7vh, 4vh, 5vh, cover;
            background-repeat: no-repeat, no-repeat, no-repeat, no-repeat;
            background-position: 84% 73%, 99% 28%, 1% 40%, left top;
            height: 100vh;
        }
        @keyframes animate {
            50% {
                background-position: 84% 71%, 99% 26%, 1% 38%, left top;
            }
        }
        #bg {
            animation: animate 5s infinite;
        }
        @media all and (min-width:1024px) {
            .pad {
                padding-left: 21rem;
                padding-right: 21rem;
            }
            #bg {
                background-position: 62% 62%, 60% 28%, 31% 40%, center;
            }
            @keyframes animate {
                50% {
                    background-position: 62% 60%, 60% 26%, 31% 38%, left top;
                }
            }
            #bg {
                animation: animate 5s infinite;
            }
        }
    </style>
    <body id="bg">
        <div class="section">
            <div id="container" class="container">
                <div class="columns">
                    <div class="column">
                        <figure class="image is-128x128">
                            <img src="{{ asset('img/iconberijalan.png') }}">
                        </figure>
                    </div>
                </div>
                <div class="columns mt-6">
                    <div class="column has-text-centered">
                        <h1
                            class="title is-1 is-spaced"
                            style="font-family:'Cooper Black', sans-serif; letter-spacing: 4px; color:#2c598d;">VISIT TECHNO</h1>
                        <p class="subtitle is-3 pad">Reservasi Working Space Kantor Berijalan Astra Credit Company Petung Yogyakarta</p>
                    </div>
                </div>
                <div class="columns">
                    <div class="column has-text-centered">
                        <a href="/login">
                            <button
                                id="primarytechno"
                                class="button is-primary has-text-weight-bold is-fullwidth"
                                href="/login">BOOK NOW</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        if (window.innerWidth > 1023) {
            var element = document.getElementById("primarytechno");
            element
                .classList
                .remove("is-fullwidth");
        }
    </script>
</html>