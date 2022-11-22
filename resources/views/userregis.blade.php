<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200"/>
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
                                        <button class="button has-text-weight-bold">
                                            Cancel
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <form action="{{route('regisuser')}}" method="post">
                                {{ csrf_field() }}
                                <div class="field">
                                    <label class="label">NIK</label>
                                    <div class="control">
                                        <input
                                            type="text"
                                            placeholder="NIK"
                                            class="input"
                                            minlength="16"
                                            maxlength="16"
                                            required="required"
                                            name="nik">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nama</label>
                                    <div class="control">
                                        <input
                                            type="text"
                                            placeholder="Nama Lengkap"
                                            class="input"
                                            maxlength="16"
                                            required="required"
                                            name="name">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Email</label>
                                    <div class="control">
                                        <input
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
                                            type="text"
                                            placeholder="No. Handphone"
                                            class="input"
                                            maxlength="16"
                                            required="required"
                                            name="phone">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Profesi</label>
                                    <div class="control">
                                        <input
                                            type="text"
                                            placeholder="Profesi"
                                            class="input"
                                            maxlength="16"
                                            required="required"
                                            name="profesi">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Institusi</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="institusi">
                                                <option value="" selected="selected" disabled="disabled" hidden="hidden">Pilih Institusi</option>
                                                <option value="Institusi / Perusahaan">Institusi / Perusahaan</option>
                                                <option value="Sekolah / Kampus">Sekolah / Kampus</option>
                                                <option value="Komunitas">Komunitas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nama Institusi / Komunitas/ Kampus</label>
                                    <div class="control">
                                        <input
                                            type="text"
                                            placeholder="Nama Institusi / Komunitas / Kampus"
                                            class="input"
                                            maxlength="16"
                                            required="required"
                                            name="nama_institusi">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Alamat</label>
                                    <div class="control">
                                        <textarea class="textarea" placeholder="Alamat" name="alamat"></textarea>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Keahlian</label>
                                    <div class="control">
                                        <label class="radio">
                                            <input type="radio" value="Coding" name="keahlian">
                                            Coding
                                        </label><br>
                                        <label class="radio">
                                            <input type="radio" value="UI" name="keahlian">
                                            UI
                                        </label>
                                        <label class="radio">
                                            <input type="radio" value="Design" name="keahlian">
                                            Design
                                        </label>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Upload KTP</label>
                                    <div class="control">
                                        <div class="file has-name">
                                            <label class="file-label">
                                                <input class="file-input" type="file" name="foto_ktp">
                                                <span class="file-cta">
                                                    <span class="file-icon">
                                                        <i class="material-symbols-outlined">upload</i>
                                                    </span>
                                                    <span class="file-label">
                                                        Choose a file…
                                                    </span>
                                                </span>
                                                <span class="file-name">
                                                    Screen Shot 2017-07-29 at 15.54.25.png
                                                </span>
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
    </body>
</html>