<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
    </head>
    <style>
        .img {
            width: 100%;
            max-width: 240px;
            height: auto;
        }
        #primarytechno {
            background-color: #2c598d;
        }
        .strike {
            display: block;
            text-align: center;
            overflow: hidden;
            white-space: nowrap;
        }

        .strike > span {
            position: relative;
            display: inline-block;
        }

        .strike > span:after,
        .strike > span:before {
            content: "";
            position: absolute;
            top: 50%;
            width: 9999px;
            height: 1px;
            background: #f0f2f5;
        }

        .strike > span:before {
            right: 100%;
            margin-right: 15px;
        }

        .strike > span:after {
            left: 100%;
            margin-left: 15px;
        }
    </style>
    <body style="background-color: #f0f2f5;">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-centered">
                        <div class="column has-text-centered">
                            <img src="{{ asset('img/berijalanver.png') }}" class="img">
                        </div>
                    </div>
                    <div class="columns is-centered">
                        <div class="column is-6-tablet is-4-desktop box">
                            <form action="{{route('loginuser')}}" method="post">
                                {{ csrf_field() }}
                                <div class="field has-text-centered">
                                    <p class="mb-5 is-size-5">Log In Menggunakan NIK KTP</p>
                                    <div class="control">
                                        <input
                                            type="text"
                                            placeholder="NIK"
                                            class="input"
                                            maxlength="16"
                                            required="required"
                                            name="nik">
                                        <input id="hid" type="hidden" value="techno" name="password">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <button
                                            id="primarytechno"
                                            class="button is-primary has-text-weight-bold is-fullwidth">
                                            Log In
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="field has-text-centered mt-3">
                                <div class="control">
                                    <div class="strike mb-3">
                                        <span>
                                            <p>Atau</p>
                                        </span>
                                    </div>
                                    <a href="/register">
                                        <button
                                            class="button is-primary has-text-weight-bold"
                                            style="background-color:#6ed34b;">
                                            Registrasi
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="modal" class="modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div class="box mx-4 is-size-5 has-text-centered">
                        <p>NIK kamu belum terdaftar.</p>
                        <p>Lanjutkan pendaftaran?</p>
                        <div class="columns mt-4">
                            <div class="column">
                                <button id="primarytechno" class="button is-success">Registrasi</button>
                                <button id="closemodal" class="button">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('sweetalert::alert')
    </body>
    <script>
        var modal = document.getElementById("modal");
        var closemodal = document.getElementById("closemodal");
        closemodal.onclick = function () {
            modal
                .classList
                .remove("is-active");
        }

        var loading = document.getElementById("primarytechno");
        loading.onclick = function () {
            loading
                .classList
                .add("is-loading");
        }
        var hid = document.getElementById("hid");
        console.log(hid.value);
    </script>
</html>