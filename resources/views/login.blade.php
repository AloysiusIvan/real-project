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
                                            name="nik"
                                            onkeyup="validate(this)"
                                            id="intNIK">
                                        <input id="hid" type="hidden" value="techno" name="password">
                                        @foreach ($iduser as $item)
                                        <input id="hiduser" type="hidden" value="{{$item->id}}" name="id">
                                        @endforeach
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
        function validate(obj) {
            if (obj.value.length > 0) {
                loading.onclick = function () {
                    document
                        .getElementById("primarytechno")
                        .classList
                        .add("is-loading");
                }
            } else {
                loading.onclick = function () {
                    document
                        .getElementById("primarytechno")
                        .classList
                        .remove("is-loading");
                }
            }
        }

        var swal = document.getElementsByClassName("swal2-confirm");
        if (swal[0].innerHTML == "Update Data") {
            swal[0].setAttribute('onclick', 'swalfunc()');
            function swalfunc() {
                location.href = "{{route('updateuser',$iduser[0]->id)}}";
            }
        }

        function setInputFilter(textbox, inputFilter, errMsg) {
            [
                "input",
                "keydown",
                "keyup",
                "mousedown",
                "mouseup",
                "select",
                "contextmenu",
                "drop",
                "focusout"
            ].forEach(function (event) {
                textbox.addEventListener(event, function (e) {
                    if (inputFilter(this.value)) {
                        // Accepted value
                        if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                            this
                                .classList
                                .remove("input-error");
                            this.setCustomValidity("");
                        }
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        // Rejected value - restore the previous one
                        this
                            .classList
                            .add("input-error");
                        this.setCustomValidity(errMsg);
                        this.reportValidity();
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        // Rejected value - nothing to restore
                        this.value = "";
                    }
                });
            });
        }
        setInputFilter(document.getElementById("intNIK"), function (value) {
            return /^-?\d*$/.test(value);
        }, "Masukan NIK yang benar");
    </script>
</html>