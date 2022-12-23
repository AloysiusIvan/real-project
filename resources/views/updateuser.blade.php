<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <style>
        .img {
            width: 100%;
            max-width: 240px;
            height: auto;
        }
        #primarytechno {
            background-color: #2c598d;
            .is-fullwidth;
        }
    </style>
    <body style="background-color: #f0f2f5;">
        <section class="hero">
            <div class="container">
                <div class="columns">
                    <div class="column has-text-centered mt-5">
                        <img src="{{ asset('img/berijalanver.png') }}" class="img">
                    </div>
                </div>
            </div>
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-centered">
                        <div class="column is-5-desktop box">
                            <div class="columns is-mobile">
                                <div class="column">
                                    <h1 class="title">Registrasi</h1>
                                </div>
                                <div class="column has-text-right">
                                    <a href="/login">
                                        <i class="material-symbols-outlined" style="color:#000000;">cancel</i>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            @foreach($iduser as $item)
                            <form
                                action="{{route('edituser', $item->id)}}"
                                method="post"
                                enctype="multipart/form-data"
                                id="regis">
                                {{ csrf_field() }}
                                <div class="field">
                                    <label class="label">NIK</label>
                                    <div class="control">
                                        <input
                                            value="{{$item->nik}}"
                                            type="text"
                                            placeholder="NIK"
                                            class="input"
                                            minlength="16"
                                            maxlength="16"
                                            required="required"
                                            name="nik"
                                            id="intTextBox">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nama</label>
                                    <div class="control">
                                        <input
                                            value="{{$item->name}}"
                                            type="text"
                                            placeholder="Nama Lengkap"
                                            class="input"
                                            required="required"
                                            name="name">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Email</label>
                                    <div class="control">
                                        <input
                                            value="{{$item->email}}"
                                            type="email"
                                            placeholder="Email"
                                            class="input"
                                            required="required"
                                            name="email">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">No. Handphone</label>
                                    <div class="control">
                                        <input
                                            value="{{$item->phone}}"
                                            type="text"
                                            placeholder="No. Handphone"
                                            class="input"
                                            required="required"
                                            name="phone"
                                            minlength="11"
                                            maxlength="16"
                                            id="intTelp">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Pekerjaan</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="profesi" required="required" onchange="yesnoCheck(this);">
                                                <option value="" selected="selected" disabled="disabled" hidden="hidden">Pilih Pekerjaan</option>
                                                <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                                                <option value="PNS">PNS</option>
                                                <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                <option value="other">Lainnya...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="ifYes" class="field" style="display:none;">
                                    <div class="control">
                                        <input
                                            id="prot"
                                            type="text"
                                            placeholder="Pekerjaan"
                                            class="input"
                                            name="profesiother">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Instansi / Organisasi</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="institusi" required="required">
                                                <option value="" selected="selected" disabled="disabled" hidden="hidden">Pilih Institusi</option>
                                                <option value="Institusi / Perusahaan">Institusi / Perusahaan</option>
                                                <option value="Sekolah / Kampus">Sekolah / Kampus</option>
                                                <option value="Komunitas / Organisasi">Komunitas / Organisasi</option>
                                                <option value="Lembaga">Lembaga</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nama Instansi / Komunitas / Kampus</label>
                                    <div class="control">
                                        <input
                                            value="{{$item->nama_institusi}}"
                                            type="text"
                                            placeholder="Nama Instansi / Komunitas / Kampus"
                                            class="input"
                                            required="required"
                                            name="nama_institusi">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Alamat</label>
                                    <div class="control">
                                        <textarea
                                            class="textarea"
                                            placeholder="Alamat"
                                            name="alamat"
                                            required="required">{{$item->alamat}}</textarea>
                                    </div>
                                </div>
                                @endforeach
                                <div class="field checkbox-group required">
                                    <label class="label">Keahlian</label>
                                    <div class="control">
                                        <label class="checkbox">
                                            <input type="checkbox" class="check" value="System Analyst" name="keahlian[]">
                                            System Analyst
                                        </label>
                                    </div>
                                    <div class="control">
                                        <label class="checkbox">
                                            <input type="checkbox" class="check" value="Data Analyst" name="keahlian[]">
                                            Data Analyst / Big Data
                                        </label>
                                    </div>
                                    <div class="control">
                                        <label class="checkbox">
                                            <input type="checkbox" class="check" value="Front End" name="keahlian[]">
                                            Front End Developer
                                        </label>
                                    </div>
                                    <div class="control">
                                        <label class="checkbox">
                                            <input type="checkbox" class="check" value="Back End" name="keahlian[]">
                                            Back End Developer
                                        </label>
                                    </div>
                                    <div class="control">
                                        <label class="checkbox">
                                            <input type="checkbox" class="check" value="Fullstack" name="keahlian[]">
                                            Fullstack Developer
                                        </label>
                                    </div>
                                    <div class="control">
                                        <label class="checkbox">
                                            <input type="checkbox" class="check" value="Software Tester" name="keahlian[]">
                                            Software Tester
                                        </label>
                                    </div>
                                    <div class="control">
                                        <label class="checkbox">
                                            <input
                                                id="lain"
                                                type="checkbox"
                                                class="check"
                                                value="Lainnya"
                                                onclick="checkThis()"
                                                name="other">
                                            Lainnya
                                        </label>
                                    </div>
                                </div>
                                <div id="kealai" class="field" style="display:none;">
                                    <div class="control">
                                        <input
                                            id="skla"
                                            type="text"
                                            placeholder="Keahlian..."
                                            class="input"
                                            name="keahlianother">
                                    </div>
                                </div>
                                <strong>
                                    <p class="err" style="color:red;">Minimal pilih satu</p>
                                </strong>
                                <div class="field">
                                    <label class="label">Upload KTP</label>
                                    <div class="control">
                                        <div class="file has-name">
                                            <label class="file-label">
                                                <input
                                                    id="fotoktp"
                                                    accept="image/*"
                                                    class="file-input"
                                                    type="file"
                                                    name="foto_ktp"
                                                    required="required">
                                                <span class="file-cta">
                                                    <span class="file-icon">
                                                        <i class="material-symbols-outlined">upload</i>
                                                    </span>
                                                    <span class="file-label">
                                                        Choose a file…
                                                    </span>
                                                </span>
                                                <span class="file-name"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control has-text-centered">
                                        <button id="primarytechno" class="button is-primary has-text-weight-bold">
                                            Registrasi
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $(".file-input").change(function () {
                        var fileExtension = ['jpeg', 'jpg', 'png'];
                        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                            Swal.fire({
                                title: 'Tolong upload file gambar',
                                icon: 'error',
                                confirmButtonColor: '#2c598d',
                            });
                            $("#fotoktp").val(null);
                            $(".file-name").html("");
                        }
                    });

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
            setInputFilter(
                document.getElementById("intTextBox"),
                function (value) {
                    return /^-?\d*$/.test(value);
                },
                "Masukan NIK yang benar"
            );

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
            setInputFilter(
                document.getElementById("intTelp"),
                function (value) {
                    return /^-?\d*$/.test(value);
                },
                "Masukan No. Handphone yang benar"
            );

            function yesnoCheck(that) {
                if (that.value == "other") {
                    document
                        .getElementById("ifYes")
                        .style
                        .display = "block";
                    document
                        .getElementById("prot")
                        .setAttribute("required", "");
                } else {
                    document
                        .getElementById("ifYes")
                        .style
                        .display = "none";
                    document
                        .getElementById("prot")
                        .removeAttribute("required");
                }
            }

            $(".err").hide();
            $(document).ready(function () {
                $('div.checkbox-group.required :checkbox:checked').length > 0
                $(".check").click(function () {
                    if ($("input:checkbox").filter(":checked").length < 1) {
                        $(".err").show();
                        return false;
                    } else {
                        $(".err").hide();
                        return true;
                    }
                })
            })

            function checkThis() {
                var check = document.getElementById("lain");
                var checklain = document.getElementById("kealai");
                if (check.checked == true) {
                    checklain.style.display = "block";
                } else {
                    checklain.style.display = "none";
                }
            }

            document
                .getElementById('fotoktp')
                .onchange = function () {
                    document
                        .getElementsByClassName("file-name")[0]
                        .textContent = this
                        .files[0]
                        .name;
                };

            $('#regis').on('submit', function (e) {
                if ($('input[class^="check"]:checked').length === 0) {
                    Swal.fire(
                        {title: 'Error!', text: 'Data diri tidak boleh kosong', icon: 'error', confirmButtonText: 'Close', confirmButtonColor: '#2c598d'}
                    );
                    e.preventDefault();
                }
                if ($("#lain").prop('checked') == true){
                    if (!$("#skla").val()){
                        Swal.fire(
                            {title: 'Error!', text: 'Data diri tidak boleh kosong', icon: 'error', confirmButtonText: 'Close', confirmButtonColor: '#2c598d'}
                        );
                        e.preventDefault();
                    }
                }
            });
        </script>
        @include('sweetalert::alert')
    </body>
</html>