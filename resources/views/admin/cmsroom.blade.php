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

        @media all and (min-width:1024px) {
            td {
                max-width: 344px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        }
        @media all and (max-width:1024px) {
            table {
                table-layout: fixed;
                width: 378;
            }
            td {
                max-width: 378;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        }
        @keyframes modal-show {
            0% {
                transform: scale(0.7);
            }
            45% {
                transform: scale(1.05);
            }
            80% {
                transform: scale(0.95);
            }
            100% {
                transform: scale(1);
            }
        }
        .modal-card {
            animation-name: modal-show;
            animation-duration: 0.3s;
        }
        .button.is-primary {
            background-color: #2c598d;
        }
        .button.is-primary:hover {
            background-color: #234771;
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
                    </ul>
                </div>
            </aside>
            <section class="section is-title-bar">
                <div class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <ul>
                                <li>Admin</li>
                                <li>Room Management</li>
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
                                    Room Management
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
                <div class="card has-table">
                    <header class="card-header">
                        <p class="card-header-title">
                            <span class="icon">
                                <i class="mdi mdi-home-circle"></i>
                            </span>
                            Rooms
                        </p>
                        <a href="#" class="card-header-icon">
                            <span class="button is-small is-primary" type="button" onclick="addModal()">
                                <strong>Add Room</strong>
                            </span>
                        </a>
                    </header>
                    <div class="card-content">
                        <div class="b-table has-pagination">
                            <div class="table-wrapper has-mobile-cards">
                                <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>Nama Ruangan</th>
                                            <th>Kapasitas</th>
                                            <th class="has-text-centered">Status</th>
                                            <th class="has-text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($room as $item)
                                        <tr>
                                            <td data-label="Nama Ruangan">{{$item->room_name}}</td>
                                            <td data-label="Kapasitas">{{$item->kapasitas}}</td>
                                            <td data-label="Status" style="text-align:center;">
                                                @if ($item->status == "active")
                                                <span class="icon has-text-success">
                                                    <i class="mdi mdi-24px mdi-check"></i>
                                                </span>
                                                @else
                                                <span class="icon has-text-danger">
                                                    <i class="mdi mdi-24px mdi-close"></i>
                                                </span>
                                                @endif
                                            </td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <a href="{{route('editroom',$item->id)}}">
                                                        <button class="button is-small is-primary" type="button" style="background-color:#d8e3f8;color:#111c2b;">
                                                            <span class="icon">
                                                                <i class="mdi mdi-pencil"></i>
                                                            </span>
                                                        </button>
                                                    </a>
                                                    <a
                                                        data-id="{{$item->id}}"
                                                        data-name="{{$item->room_name}}"
                                                        onclick="deleteModal(this)">
                                                        <button class="button is-small is-danger jb-modal" type="button">
                                                            <span class="icon">
                                                                <i class="mdi mdi-trash-can"></i>
                                                            </span>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <?php 
                                $total = $room->total();
                                $page = $room->perPage();
                                $current = $room->currentPage();
                                $totalpage = ceil($total / $page);
                            ?>
                            <div class="notification">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <div class="buttons has-addons">
                                                @for($i=1 ; $i <= $totalpage ; $i++)
                                                @if ($i == $current)
                                                <a style="text-decoration:none" href="{{$room->url($i)}}"><button type="button" class="button is-active">{{$i}}</button></a>
                                                @else
                                                <a style="text-decoration:none" href="{{$room->url($i)}}"><button type="button" class="button">{{$i}}</button></a>
                                                @endif
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <small>Page {{$current}} of {{$totalpage}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

            <div id="add-modal" class="modal">
                <div class="modal-background jb-modal-close"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Add New Room</p>
                        <button class="delete jb-modal-close" aria-label="close"></button>
                    </header>
                    <form action="{{route('addroom')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <section class="modal-card-body">
                            <div class="field">
                                <label class="label">Nama Ruangan</label>
                                <div class="control">
                                    <input
                                        type="text"
                                        placeholder="Nama Ruangan"
                                        class="input"
                                        required="required"
                                        name="room_name">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Kapasitas</label>
                                <div class="control">
                                    <input
                                        type="text"
                                        placeholder="Kapasitas"
                                        class="input"
                                        required="required"
                                        name="kapasitas"
                                        id="roomcap">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Foto Ruangan</label>
                                <div class="file has-name">
                                    <label class="file-label">
                                        <input
                                            id="roomphoto"
                                            accept="image/*"
                                            class="file-input"
                                            type="file"
                                            name="room_photo"
                                            required="required">
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
                        </section>
                        <footer class="modal-card-foot">
                            <button class="button jb-modal-close">Cancel</button>
                            <button class="button is-primary" type="submit">Save</button>
                        </footer>
                    </form>
                </div>
            </div>

            <div id="delete-modal" class="modal">
                <div class="modal-background jb-modal-close"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">
                            <strong>Delete Room</strong>
                        </p>
                        <button class="delete jb-modal-close" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <p>Are you sure want to delete this data?</p>
                        <p>This process cannot be undone.</p>
                    </section>
                    <footer class="modal-card-foot">
                        <button class="button jb-modal-close">Cancel</button>
                        <button class="button is-danger deletethis">Delete</button>
                    </footer>
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
                function addModal() {
                    $("#add-modal").addClass("is-active");
                    setInputFilter(
                        document.getElementById("roomcap"),
                        function (value) {
                            return /^-?\d*$/.test(value);
                        },
                        "Masukan kapasitas yang sesuai"
                    );
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
                }

                function deleteModal(val) {
                    var id = $(val).attr("data-id");
                    var name = $(val).attr("data-name");
                    Swal.fire({
                        title: 'Delete Data?',
                        text: 'Are you sure want to delete this data?',
                        icon: 'error',
                        showCancelButton: true,
                        confirmButtonColor: '#2c598d',
                        cancelButtonColor: 'light'
                    });
                    $(".swal2-confirm").click(function () {
                        window.location = "/deleteroom/" + id;
                    });

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

                document
                    .getElementById('roomphoto')
                    .onchange = function () {
                        document
                            .getElementsByClassName("file-name")[0]
                            .textContent = this
                            .files[0]
                            .name;
                    };
            </script>
        </body>
    </html>