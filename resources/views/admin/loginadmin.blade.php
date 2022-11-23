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
                            <form action="{{route('loginadmin')}}" method="post">
                                {{ csrf_field() }}
                                <div class="field">
                                    <label class="label">Username</label>
                                    <div class="control">
                                        <input
                                            type="text"
                                            placeholder="Username"
                                            class="input"
                                            maxlength="16"
                                            required="required"
                                            name="nik">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Password</label>
                                    <div class="control">
                                        <input
                                            type="password"
                                            placeholder="Password"
                                            class="input"
                                            required="required"
                                            name="password">
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

        var swal = document.getElementsByClassName("swal2-confirm");
    </script>
</html>