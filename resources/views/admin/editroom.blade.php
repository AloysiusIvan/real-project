<!DOCTYPE html>
<html
    lang="en"
    class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Visit Techno</title>

        <!-- Bulma is included -->
        <link rel="stylesheet" href="{{ URL::asset('adminsrc/css/main.min.css') }}">
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma-switch@2.0.4/dist/css/bulma-switch.min.css">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
            type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <style>
        .tabs li.is-active a {
            border-bottom-color: #2c598d;
            color: #2c598d;
        }
        #primarytechno {
            background-color: #2c598d;
        }
    </style>
    <body>
        @include('sweetalert::alert')
        <div id="app">
            <nav id="navbar-main" class="navbar is-fixed-top">
                <div class="navbar-brand">
                    <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
                        <span class="icon">
                            <i class="mdi mdi-forwardburger mdi-24px"></i>
                        </span>
                    </a>
                </div>
                <div class="navbar-brand is-right">
                    <a
                        class="navbar-item is-hidden-desktop jb-navbar-menu-toggle"
                        data-target="navbar-menu">
                        <span class="icon">
                            <i class="mdi mdi-dots-vertical"></i>
                        </span>
                    </a>
                </div>
                <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
                    <div class="navbar-end">
                        <a
                            href="{{route('logout')}}"
                            title="Log out"
                            class="navbar-item is-desktop-icon-only">
                            <span class="icon">
                                <i class="mdi mdi-logout"></i>
                            </span>
                            <span>Log out</span>
                        </a>
                    </div>
                </div>
            </nav>
            <aside class="aside is-placed-left is-expanded">
                <div class="aside-tools">
                    <div class="aside-tools-label">
                        <span>
                            <b>Admin</b>
                            Visit Techno</span>
                    </div>
                </div>
                <div class="menu is-menu-main">
                    <ul class="menu-list">
                        <li>
                            <a href="/dashboard" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-desktop-mac"></i>
                                </span>
                                <span class="menu-item-label">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li>
                            <a href="{{route('cmsuser')}}" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-account-circle"></i>
                                </span>
                                <span class="menu-item-label">User Management</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li>
                            <a href="/cmsroom" class="is-active has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-home-circle"></i>
                                </span>
                                <span class="menu-item-label">Room Management</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li>
                            <a href="/bookinglist" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-view-list"></i>
                                </span>
                                <span class="menu-item-label">Booking List</span>
                            </a>
                        </li>
                    </div>
                </aside>
                <section class="section is-title-bar">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <ul>
                                    <li>Admin</li>
                                    <li>Room Management</li>
                                    <li>Edit Room</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="hero is-hero-bar">
                    <div class="hero-body">
                        <div class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    <h1 class="title">
                                        Edit Room
                                    </h1>
                                </div>
                            </div>
                            <div class="level-right" style="display: none;">
                                <div class="level-item"></div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section is-main-section">
                    <div class="tile is-ancestor">
                        <div class="tile is-6 is-parent">
                            <div class="card tile is-child">
                                <header class="card-header">
                                    <p class="card-header-title">
                                        <span class="icon">
                                            <i class="mdi mdi-account-circle default"></i>
                                        </span>
                                        Edit Room
                                    </p>
                                </header>
                                <div class="card-content">
                                    @foreach ($roomdata as $item)
                                    <form
                                        action="{{route('updateroom', $item->id)}}"
                                        method="post"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Ruangan</label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input
                                                            type="text"
                                                            autocomplete="on"
                                                            name="room_name"
                                                            value="{{$item->room_name}}"
                                                            class="input"
                                                            required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Kapasitas</label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input
                                                            type="text"
                                                            id="cap"
                                                            autocomplete="on"
                                                            name="kapasitas"
                                                            value="{{$item->kapasitas}}"
                                                            class="input"
                                                            required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label pt-2">Status</label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input
                                                            id="switchStatus"
                                                            type="checkbox"
                                                            name="status"
                                                            class="switch is-rtl is-rounded"
                                                            checked="checked"
                                                            data-val="{{$item->status}}">
                                                        <label for="switchStatus"></label>
                                                        <input type="hidden" name="stva" id="stva" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Photo</label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="file has-name">
                                                        <label class="file-label">
                                                            <input
                                                                accept="image/*"
                                                                id="roomphoto"
                                                                class="file-input"
                                                                type="file"
                                                                name="photo">
                                                            <span class="file-cta">
                                                                <span class="file-icon">
                                                                    <i class="mdi mdi-upload"></i>
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
                                        </div>
                                        <hr>
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal"></div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <a href="/cmsroom">
                                                            <button type="button" class="button is-light">
                                                                Cancel
                                                            </button>
                                                        </a>
                                                        <button type="submit" class="button is-primary">
                                                            Simpan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tile is-6 is-parent">
                            <div class="card tile is-child">
                                <div class="card-content p-0">
                                    <span class="is-centered">
                                        <img src="{{asset('storage/img/room/'.$item->photo)}}">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        © 2022, Visit techno Project
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>

                    <div id="sample-modal" class="modal">
                        <div class="modal-background jb-modal-close"></div>
                        <div class="modal-card">
                            <header class="modal-card-head">
                                <p class="modal-card-title">Confirm action</p>
                                <button class="delete jb-modal-close" aria-label="close"></button>
                            </header>
                            <section class="modal-card-body">
                                <p>This will permanently delete
                                    <b>Some Object</b>
                                </p>
                                <p>This is sample modal</p>
                            </section>
                            <footer class="modal-card-foot">
                                <button class="button jb-modal-close">Cancel</button>
                                <button class="button is-danger jb-modal-close">Delete</button>
                            </footer>
                        </div>
                        <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
                    </div>
                </div>

                <!-- Scripts below are for demo only -->
                <script
                    type="text/javascript"
                    src="{{ URL::asset('adminsrc/js/main.min.js') }}"></script>

                <!-- Icons below are for demo only. Feel free to use any icon pack. Docs:
                https://bulma.io/documentation/elements/icon/ -->
                <link
                    rel="stylesheet"
                    href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

                <script>
                    $(".file-input").change(function () {
                        var fileExtension = ['jpeg', 'jpg', 'png'];
                        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                            Swal.fire(
                                {title: 'Tolong upload file gambar', icon: 'error', confirmButtonColor: '#2c598d'}
                            );
                            $("#roomphoto").val(null);
                            $(".file-name").html("");
                        }
                    });

                    document
                        .getElementById('roomphoto')
                        .onchange = function () {
                            document
                                .getElementsByClassName("file-name")[0]
                                .textContent = this
                                .files[0]
                                .name;
                        };

                    var stat = $("#switchStatus").attr("data-val");
                    if (stat == "inactive") {
                        $("#switchStatus").removeAttr("checked");
                        $("#stva").val("inactive");
                    } else {
                        $("#stva").val("active");
                    }
                    $("#switchStatus").change(function () {
                        if ($("#switchStatus").is(':checked')) {
                            $("#stva").val("active");
                        } else {
                            $("#stva").val("inactive");
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
                document.getElementById("cap"),
                function (value) {
                    return /^-?\d*$/.test(value);
                },
                "Masukan jumlah kapasitas yang sesuai"
            );
                </script>
            </body>
        </html>