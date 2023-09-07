<!DOCTYPE html>
<html
    lang="en"
    class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
    <head>
        <link rel="shortcut icon" href="https://i.ibb.co/TrwLnwM/justlogo.png" />
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
            animation-duration: 0.5s;
        }
        .button.is-primary{
            background-color: #2c598d;
        }
        .button.is-primary:hover{
            background-color: #234771;
        }
    </style>
    <body>  
        @include('admin/swaljs')
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
                                <span class="menu-item-label">Home</span>
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
                            <a href="/cmsroom" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-home-circle"></i>
                                </span>
                                <span class="menu-item-label">Room Management</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li id="dropDown" class="is-active">
                            <a class="has-icon has-dropdown-icon is-active">
                                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                                <span class="menu-item-label">Booking List</span>
                                <div class="dropdown-icon">
                                    <span class="icon"><i class="mdi mdi-arrow-down-drop-circle"></i></span>
                                </div>
                            </a>
                            <ul>
                                <li>
                                    <a href="/bookinglist" class="is-active">
                                        <span>Booking Hari Ini</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/allbooking">
                                        <span>Semua Booking</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li>
                            <a href="/review" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-book"></i>
                                </span>
                                <span class="menu-item-label">Review</span>
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
                                <li>Booking List</li>
                                <li>Booking Hari Ini</li>
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
                                    Booking Hari Ini
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
            <input  id="search" class="search input mb-3" type="text" placeholder="Search" style="max-width:25vw;">
                <div class="card has-table">
                    <div id="tab-checking" class="tabs is-boxed mb-0">
                        <ul>
                        <li id="waiting" class="is-active">
                            <a href="#waiting" onclick="switchToWaiting()">
                                <span class="icon is-small">
                                    <i class="mdi mdi-clock" aria-hidden="true"></i>
                                </span>
                                <span>Menunggu</span>
                            </a>
                        </li>
                        <li id="checkin">
                            <a href="#checkin" onclick="switchToCheckin()">
                                <span class="icon is-small">
                                    <i class="mdi mdi-check-circle" aria-hidden="true"></i>
                                </span>
                                <span>Masuk</span>
                            </a>
                        </li>
                        <li id="selesai">
                            <a href="#selesai" onclick="switchToSelesai()">
                                <span class="icon is-small">
                                    <i class="mdi mdi-clock-check" aria-hidden="true"></i>
                                </span>
                                <span>Selesai</span>
                            </a>
                        </li>
                        <li id="pending">
                            <a href="#pending" onclick="switchToPending()">
                                <span class="icon is-small">
                                    <i class="mdi mdi-clock-alert" aria-hidden="true"></i>
                                </span>
                                <span>Proses</span>
                            </a>
                        </li>
                        <li id="expired">
                            <a href="#expired" onclick="switchToExpired()">
                                <span class="icon is-small">
                                    <i class="mdi mdi-close-circle" aria-hidden="true"></i>
                                </span>
                                <span>Kedaluwarsa</span>
                            </a>
                        </li>
                    </ul>
                    </div>
                    <div class="card-content">
                        <div class="b-table has-pagination">
                            <div class="table-wrapper has-mobile-cards">
                                <table id="initbooking" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>Nama Pengunjung</th>
                                            <th>Ruangan</th>
                                            <th>Keperluan</th>
                                            <th>Tanggal Berkunjung</th>
                                            <th>Status</th>
                                            <th class="has-text-right">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody id="waiting-booklist">
                                        @foreach($bookinglist as $data)
                                        <tr>
                                            <td data-label="Nama Pengunjung">{{$data->name}}</td>
                                            <td data-label="Ruangan">{{$data->room_name}}</td>
                                            <td data-label="Keperluan">{{$data->keperluan}}</td>
                                            <td data-label="Tanggal Berkunjung">{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}</td>
                                            <td data-label="Status"><span class="tag is-white">Menunggu</span></td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <button
                                                        class="button is-small is-primary"
                                                        type="button"
                                                        data-id="{{$data->id}}"
                                                        data-kode="{{$data->kode_booking}}"
                                                        data-nama="{{$data->name}}"
                                                        data-room="{{$data->room_name}}"
                                                        data-tgl="{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}"
                                                        data-tanggal="{{$data->tanggal->isoFormat('Y-MM-DD')}}"
                                                        data-jam_mulai="{{$data->jam_mulai}}"
                                                        data-jam_selesai="{{$data->jam_selesai}}"
                                                        data-keperluan="{{$data->keperluan}}"
                                                        data-status="{{$data->status}}"
                                                        data-book="{{$data->created_at->isoFormat('ddd, DD MMM Y')}}"
                                                        data-nik="{{$data->nik}}"
                                                        onclick="detail(this)">
                                                        <span class="icon">
                                                            <i class="mdi mdi-eye"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody id="checkin-booklist" class="is-hidden">
                                        @foreach($bookinglistcheck as $data)
                                        <tr>
                                            <td data-label="Nama Pengunjung">{{$data->name}}</td>
                                            <td data-label="Ruangan">{{$data->room_name}}</td>
                                            <td data-label="Keperluan">{{$data->keperluan}}</td>
                                            <td data-label="Tanggal Berkunjung">{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}</td>
                                            <td data-label="Status"><span class="tag is-success">Masuk</span></td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <button
                                                        class="button is-small is-primary"
                                                        type="button"
                                                        data-id="{{$data->id}}"
                                                        data-kode="{{$data->kode_booking}}"
                                                        data-nama="{{$data->name}}"
                                                        data-room="{{$data->room_name}}"
                                                        data-tgl="{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}"
                                                        data-tanggal="{{$data->tanggal->isoFormat('Y-MM-DD')}}"
                                                        data-jam_mulai="{{$data->jam_mulai}}"
                                                        data-jam_selesai="{{$data->jam_selesai}}"
                                                        data-keperluan="{{$data->keperluan}}"
                                                        data-status="{{$data->status}}"
                                                        data-book="{{$data->created_at->isoFormat('ddd, DD MMM Y')}}"
                                                        data-nik="{{$data->nik}}"
                                                        onclick="detail(this)">
                                                        <span class="icon">
                                                            <i class="mdi mdi-eye"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody id="pending-booklist" class="is-hidden">
                                        @foreach($bookinglistpending as $data)
                                        <tr>
                                            <td data-label="Nama Pengunjung">{{$data->name}}</td>
                                            <td data-label="Ruangan">{{$data->room_name}}</td>
                                            <td data-label="Keperluan">{{$data->keperluan}}</td>
                                            <td data-label="Tanggal Berkunjung">{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}</td>
                                            <td data-label="Status"><span class="tag is-light">Proses</span></td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <button
                                                        class="button is-small is-primary"
                                                        type="button"
                                                        data-id="{{$data->id}}"
                                                        data-kode="{{$data->kode_booking}}"
                                                        data-nama="{{$data->name}}"
                                                        data-room="{{$data->room_name}}"
                                                        data-tgl="{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}"
                                                        data-tanggal="{{$data->tanggal->isoFormat('Y-MM-DD')}}"
                                                        data-jam_mulai="{{$data->jam_mulai}}"
                                                        data-jam_selesai="{{$data->jam_selesai}}"
                                                        data-keperluan="{{$data->keperluan}}"
                                                        data-status="{{$data->status}}"
                                                        data-book="{{$data->created_at->isoFormat('ddd, DD MMM Y')}}"
                                                        data-nik="{{$data->nik}}"
                                                        onclick="detail(this)">
                                                        <span class="icon">
                                                            <i class="mdi mdi-eye"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody id="expired-booklist" class="is-hidden">
                                        @foreach($bookinglistexpired as $data)
                                        <tr>
                                            <td data-label="Nama Pengunjung">{{$data->name}}</td>
                                            <td data-label="Ruangan">{{$data->room_name}}</td>
                                            <td data-label="Keperluan">{{$data->keperluan}}</td>
                                            <td data-label="Tanggal Berkunjung">{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}</td>
                                            <td data-label="Status"><span class="tag is-danger">Kedaluwarsa</span></td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <button
                                                        class="button is-small is-primary"
                                                        type="button"
                                                        data-id="{{$data->id}}"
                                                        data-kode="{{$data->kode_booking}}"
                                                        data-nama="{{$data->name}}"
                                                        data-room="{{$data->room_name}}"
                                                        data-tgl="{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}"
                                                        data-tanggal="{{$data->tanggal->isoFormat('Y-MM-DD')}}"
                                                        data-jam_mulai="{{$data->jam_mulai}}"
                                                        data-jam_selesai="{{$data->jam_selesai}}"
                                                        data-keperluan="{{$data->keperluan}}"
                                                        data-status="{{$data->status}}"
                                                        data-book="{{$data->created_at->isoFormat('ddd, DD MMM Y')}}"
                                                        data-nik="{{$data->nik}}"
                                                        onclick="detail(this)">
                                                        <span class="icon">
                                                            <i class="mdi mdi-eye"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody id="selesai-booklist" class="is-hidden">
                                        @foreach($bookinglistselesai as $data)
                                        <tr>
                                            <td data-label="Nama Pengunjung">{{$data->name}}</td>
                                            <td data-label="Ruangan">{{$data->room_name}}</td>
                                            <td data-label="Keperluan">{{$data->keperluan}}</td>
                                            <td data-label="Tanggal Berkunjung">{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}</td>
                                            <td data-label="Status">
                                                @if($data->status=='present')
                                                <span class="tag is-warning">Habis</span>
                                                @else
                                                <span class="tag is-info">Selesai</span>
                                                @endif
                                            </td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <button
                                                        class="button is-small is-primary"
                                                        type="button"
                                                        data-id="{{$data->id}}"
                                                        data-kode="{{$data->kode_booking}}"
                                                        data-nama="{{$data->name}}"
                                                        data-room="{{$data->room_name}}"
                                                        data-tgl="{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}"
                                                        data-tanggal="{{$data->tanggal->isoFormat('Y-MM-DD')}}"
                                                        data-jam_mulai="{{$data->jam_mulai}}"
                                                        data-jam_selesai="{{$data->jam_selesai}}"
                                                        data-keperluan="{{$data->keperluan}}"
                                                        data-status="{{$data->status}}"
                                                        data-cekout="{{$data->checkout}}"
                                                        data-book="{{$data->created_at->isoFormat('ddd, DD MMM Y')}}"
                                                        data-nik="{{$data->nik}}"
                                                        onclick="detail(this)">
                                                        <span class="icon">
                                                            <i class="mdi mdi-eye"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <table id="table-search" class="table is-fullwidth is-striped is-hoverable is-fullwidth" style="display:none;"></table>
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
                                © 2023, Visit techno Project
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <div id="detail-modal" class="modal">
                <div class="modal-background jb-modal-close"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">
                            <strong>Detail Booking List</strong>
                        </p>
                        <button class="delete jb-modal-close" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="columns is-mobile">
                            <div class="column has-text-weight-bold">
                                Kode Booking
                            </div>
                            <div id="kode" class="column"></div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column has-text-weight-bold">
                                Nama Pengunjung
                            </div>
                            <div id="nama" class="column"></div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column has-text-weight-bold">
                                NIK
                            </div>
                            <div id="nik" class="column"></div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column has-text-weight-bold">
                                Ruangan
                            </div>
                            <div id="room" class="column"></div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column has-text-weight-bold">
                                Tanggal Berkunjung
                            </div>
                            <div id="tglber" class="column"></div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column has-text-weight-bold">
                                Jam
                            </div>
                            <div id="jam" class="column"></div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column has-text-weight-bold">
                                Keperluan
                            </div>
                            <div id="keperluan" class="column"></div>
                        </div>
                    </section>
                    <footer class="modal-card-foot is-centered">
                        <button class="button is-white jb-modal-close">Close</button>
                        <button id="cekin" class="button is-primary">Check-In</button>
                        <button id="cekout" class="button is-primary is-hidden">Check-Out</button>
                    </footer>
                </div>
            </div>
            <script
                type="text/javascript"
                src="{{ URL::asset('adminsrc/js/main.min.js') }}"></script>
            <link
                rel="stylesheet"
                href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
            <script>
                function detail(vari) {
                    $("#kode").html($(vari).attr("data-kode"));
                    $("#nama").html($(vari).attr("data-nama"));
                    $("#nik").html($(vari).attr("data-nik"));
                    $("#room").html($(vari).attr("data-room"));
                    $("#tglber").html($(vari).attr("data-tgl"));
                    $("#keperluan").html($(vari).attr("data-keperluan"));
                    $("#jam").html($(vari).attr("data-jam_mulai").substring(0,5)+" - "+$(vari).attr("data-jam_selesai").substring(0,5));
                    var bookingDate = $(vari).attr("data-tanggal");
                    var bookingTime = $(vari).attr("data-jam_mulai");
                    var bookingEndTime = $(vari).attr("data-jam_selesai");
                    var currentDate = new Date().toISOString().split('T')[0];
                    var currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false });
                    var status = $(vari).attr("data-status");
                    var cekout = $(vari).attr("data-cekout");
                    if (status != "present" && bookingDate == currentDate && bookingTime <= currentTime && bookingEndTime >= currentTime){
                        $("#cekin").removeClass("is-hidden");
                    } else {
                        $("#cekin").addClass("is-hidden");
                    }
                    if (status == "present" && bookingEndTime <= currentTime){
                        $("#cekout").removeClass("is-hidden");
                    } else{
                        $("#cekout").addClass("is-hidden");
                    }
                    $("#detail-modal").addClass("is-active");
                    $("#cekin").click(function(){
                        window.location = "/checkin/"+$(vari).attr("data-id");
                    });
                    $("#cekout").click(function(){
                        window.location = "/checkout/"+$(vari).attr("data-id");
                    });
                }

                $("#search").keyup(function () {
                    $.ajax({
                        type: "get",
                        url: "{{route('searchbooking')}}",
                        data: {
                            search: $("#search").val()
                        },
                        success: function (data) {
                            if(!$("#search").val()){
                                $("#initbooking").show();
                                $("#tab-checking").show();
                                $("#table-search").hide();
                            } else{
                                $("#initbooking").hide();
                                $("#tab-checking").hide();
                                $("#table-search").html(data);
                                $("#table-search").show();
                            }
                        }
                    });
                });

                function removeActive() {
                    $("li").each(function () {
                        $(this).removeClass("is-active");
                    });
                }

                function hideAll() {
                    $("#waiting-booklist").addClass("is-hidden");
                    $("#checkin-booklist").addClass("is-hidden");
                    $("#pending-booklist").addClass("is-hidden");
                    $("#expired-booklist").addClass("is-hidden");
                    $("#selesai-booklist").addClass("is-hidden");
                }

                function switchToWaiting() {
                    removeActive();
                    hideAll();
                    $("#waiting").addClass("is-active");
                    $("#waiting-booklist").removeClass("is-hidden");
                }

                function switchToCheckin() {
                    removeActive();
                    hideAll();
                    $("#checkin").addClass("is-active");
                    $("#checkin-booklist").removeClass("is-hidden");
                }

                function switchToPending() {
                    removeActive();
                    hideAll();
                    $("#pending").addClass("is-active");
                    $("#pending-booklist").removeClass("is-hidden");
                }

                function switchToExpired() {
                    removeActive();
                    hideAll();
                    $("#expired").addClass("is-active");
                    $("#expired-booklist").removeClass("is-hidden");
                }

                function switchToSelesai() {
                    removeActive();
                    hideAll();
                    $("#selesai").addClass("is-active");
                    $("#selesai-booklist").removeClass("is-hidden");
                }

                $("#tab-checking").on('click', function() {
                    $("#dropDown").addClass("is-active");
                });
            </script>
        </body>
    </html>