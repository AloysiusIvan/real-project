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
        <link rel="stylesheet" href="{{ URL::asset('adminsrc/css/stardecimal.css') }}">
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
                        <li>
                            <a href="/bookinglist" class="has-icon">
                                <span class="icon">
                                    <i class="mdi mdi-view-list"></i>
                                </span>
                                <span class="menu-item-label">Booking List</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-list">
                        <li>
                            <a href="" class="is-active has-icon">
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
                                <li>Review</li>
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
                                    Review
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
                                <i class="mdi mdi-book"></i>
                            </span>
                            Review
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="b-table has-pagination">
                            <div class="table-wrapper has-mobile-cards">
                                <table id="initbooking" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>Ruangan</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Rating</th>
                                            <th>Review</th>
                                        </tr>
                                    </thead>
                                    <tbody id="perpage">
                                        @foreach ($review as $data)
                                        <tr>
                                        <td>{{$data->room_name}}</td>
                                        <td>{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}</td>
                                        <td>{{substr($data->jam_mulai,0,5)}} - {{substr($data->jam_selesai,0,5)}}</td>
                                        @if($data->like)
                                        <td class="pt-0"><i data-star="{{$data->like}}" style="font-size:25px;"></i></td>
                                        @else
                                        <td>Kosong</td>
                                        @endif
                                        <td>{{$data->review}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="notification">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <div id="pagination-container" class="buttons has-addons">
                                                
                                            </div>
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
                // const itemsPerPage = 10;
                // let currentPage = 1;

                // $(document).ready(function() {
                //     function displayData() {
                //         const startIndex = (currentPage - 1) * itemsPerPage;
                //         const endIndex = startIndex + itemsPerPage;
                //         $('#perpage').find('tr').hide();
                //         $('#perpage').find('tr').slice(startIndex, endIndex).show();
                //     }

                //     function generatePaginationButtons() {
                //         const totalItems = $('#perpage').find('tr').length;
                //         const totalPages = Math.ceil(totalItems / itemsPerPage);
                //         $('#pagination-container').empty();
                //         let startPage = currentPage - 5;
                //         let endPage = currentPage + 4;
                //         if (startPage < 1) {
                //             startPage = 1;
                //             endPage = Math.min(totalPages, 10);
                //         }
                //         if (endPage > totalPages) {
                //             endPage = totalPages;
                //             startPage = Math.max(1, totalPages - 9);
                //         }
                //         const prevButton = $('<button type="button" class="button"></button>')
                //             .text('<')
                //             .click(function() {
                //                 if (currentPage > 1) {
                //                     currentPage--;
                //                     displayData();
                //                     generatePaginationButtons();
                //                 }
                //             });
                //         const nextButton = $('<button type="button" class="button"></button>')
                //             .text('>')
                //             .click(function() {
                //                 if (currentPage < totalPages) {
                //                     currentPage++;
                //                     displayData();
                //                     generatePaginationButtons();
                //                 }
                //             });
                //         if (currentPage > 1) {
                //             $('#pagination-container').append(prevButton);
                //         }
                //         for (let i = startPage; i <= endPage; i++) {
                //             const button = $('<button type="button" class="button"></button>')
                //             .text(i)
                //             .click(function() {
                //                 currentPage = i;
                //                 displayData();
                //                 generatePaginationButtons();
                //             });
                //             if (i === currentPage) {
                //                 button.addClass('is-active');
                //             }
                //             $('#pagination-container').append(button);
                //         }
                //         if (currentPage < totalPages) {
                //             $('#pagination-container').append(nextButton);
                //         }
                //     }

                //     displayData();
                //     generatePaginationButtons();
                // });
            </script>
        </body>
    </html>