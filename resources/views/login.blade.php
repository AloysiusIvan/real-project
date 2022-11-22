<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
    </head>
    <style>
        .img {
            width: 100%;
            max-width: 192px;
            height: auto;
        }
        #primarytechno {
            background-color: #2c598d;
            .is-fullwidth;
        }
    </style>
    <body>
        <div class="container">
            <div class="columns">
                <div class="column has-text-centered mt-2">
                    <img src="{{ asset('img/berijalanver.png') }}" class="img">
                </div>
            </div>
            <div class="columns mx-4">
                <div class="column">
                    <input class="input" type="text" placeholder="NIK" maxlength="16">
                    <p>Periksa apakah NIK kamu sudah terdaftar</p>
                </div>
                <div class="column">
                    <button
                        id="primarytechno"
                        class="button is-primary has-text-weight-bold is-fullwidth"
                        href="#">Log In</button>
                </div>
            </div>
        </div>
    </body>
</html>