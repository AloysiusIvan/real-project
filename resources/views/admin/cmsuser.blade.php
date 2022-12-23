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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>
    <style>
        .tabs li.is-active a {
            border-bottom-color: #2c598d;
            color: #2c598d;
        }

        @media all and (min-width:1024px) {
            td {
                max-width: 208px;
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
                            <a href="{{route('cmsuser')}}" class="is-active has-icon">
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
                                <li>User Management</li>
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
                                    User Management
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
                    <div id="tab-validasi" class="tabs is-boxed mb-0">
                        <ul>
                            <li id="waiting" class="is-active">
                                <a href="#waiting" onclick="switchToWaiting()">
                                    <span class="icon is-small">
                                        <i class="mdi mdi-clock" aria-hidden="true"></i>
                                    </span>
                                    <span>Waiting</span>
                                </a>
                            </li>
                            <li id="active">
                                <a href="#active" onclick="switchToActive()">
                                    <span class="icon is-small">
                                        <i class="mdi mdi-check-circle" aria-hidden="true"></i>
                                    </span>
                                    <span>Approved</span>
                                </a>
                            </li>
                            <li id="inactive">
                                <a href="#inactive" onclick="switchToInactive()">
                                    <span class="icon is-small">
                                        <i class="mdi mdi-close-circle" aria-hidden="true"></i>
                                    </span>
                                    <span>Rejected</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div class="b-table has-pagination">
                            <div class="table-wrapper has-mobile-cards">
                                <table id="table-default" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Pekerjaan</th>
                                            <th>Nama Instansi</th>
                                            <th>Tanggal</th>
                                            <th class="has-text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="waiting-tab-content">
                                        @foreach ($user as $item)
                                        <tr>
                                            <td data-label="NIK">{{$item->nik}}</td>
                                            <td data-label="Name">{{$item->name}}</td>
                                            <td data-label="Profesi">{{$item->profesi}}</td>
                                            <td data-label="nama Institusi">{{$item->nama_institusi}}</td>
                                            <td data-label="Created">{{$item->created_at->format('d M, Y')}}</td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <a href="{{route('detailuser',$item->id)}}">
                                                        <button class="button is-small is-primary" type="button">
                                                            <span class="icon">
                                                                <i class="mdi mdi-eye"></i>
                                                            </span>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody class="is-hidden" id="inactive-tab-content">
                                        @foreach ($userinac as $item2)
                                        <tr>
                                            <td data-label="NIK">{{$item2->nik}}</td>
                                            <td data-label="Name">{{$item2->name}}</td>
                                            <td data-label="Profesi">{{$item2->profesi}}</td>
                                            <td data-label="nama Institusi">{{$item2->nama_institusi}}</td>
                                            <td data-label="Created">{{$item2->created_at->format('d M, Y')}}</td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <a href="{{route('detailuser',$item2->id)}}">
                                                        <button class="button is-small is-primary" type="button">
                                                            <span class="icon">
                                                                <i class="mdi mdi-eye"></i>
                                                            </span>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody class="is-hidden" id="active-tab-content">
                                        @foreach ($userac as $item3)
                                        <tr>
                                            <td data-label="NIK">{{$item3->nik}}</td>
                                            <td data-label="Name">{{$item3->name}}</td>
                                            <td data-label="Profesi">{{$item3->profesi}}</td>
                                            <td data-label="nama Institusi">{{$item3->nama_institusi}}</td>
                                            <td data-label="Created">{{$item3->created_at->format('d M, Y')}}</td>
                                            <td class="is-actions-cell">
                                                <div class="buttons is-right">
                                                    <a href="{{route('detailuser',$item3->id)}}">
                                                        <button class="button is-small is-primary" type="button">
                                                            <span class="icon">
                                                                <i class="mdi mdi-eye"></i>
                                                            </span>
                                                        </button>
                                                    </a>
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
            function removeActive() {
                $("li").each(function () {
                    $(this).removeClass("is-active");
                });
            }

            function hideAll() {
                $("#waiting-tab-content").addClass("is-hidden");
                $("#inactive-tab-content").addClass("is-hidden");
                $("#active-tab-content").addClass("is-hidden");
            }

            function switchToInactive() {
                removeActive();
                hideAll();
                $("#inactive").addClass("is-active");
                $("#inactive-tab-content").removeClass("is-hidden");
            }

            function switchToWaiting() {
                removeActive();
                hideAll();
                $("#waiting").addClass("is-active");
                $("#waiting-tab-content").removeClass("is-hidden");
            }

            function switchToActive() {
                removeActive();
                hideAll();
                $("#active").addClass("is-active");
                $("#active-tab-content").removeClass("is-hidden");
            }

            $("#search").keyup(function () {
                $.ajax({
                    type: "get",
                    url: "{{route('searchuser')}}",
                    data: {
                        search: $("#search").val()
                    },
                    success: function (data) {
                        if(!$("#search").val()){
                            $("#table-default").show();
                            $("#tab-validasi").show();
                            $("#table-search").hide();
                        } else{
                            $("#table-default").hide();
                            $("#tab-validasi").hide();
                            $("#table-search").html(data);
                            $("#table-search").show();
                        }
                    }
                });
            });
        </script>
    </body>
</html>