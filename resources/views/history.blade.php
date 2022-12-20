<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap"
            rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200"/>
    </head>
    <style>
        .navbar-item img {
            max-height: 2.8rem;
        }
        #nu {
            font-family: 'Nunito', sans-serif;
            color: white;
        }
        @media all and (min-width:1024px) {
            .pad {
                padding-left: 4.725rem;
                padding-right: 4.725rem;
            }
            html {
                background-color: #f0f2f5;
            }
            .bg-color {
                background-color: #2c598d;
                height: 31.125rem;
                width: 100vw;
            }
            .mawe {
                margin-left: 9.875rem;
                margin-right: 9.875rem;
                margin-top: 9.375rem;
            }
            .mabo {
                margin-top: 4.875rem;
            }
            td {
                max-width: 206px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        }
        @media screen and (max-width:1023px) {
            .pad-mob {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
            html {
                background-color: #f0f2f5;
            }
            .bg-color {
                background-color: #2c598d;
                height: 20rem;
                width: 100vw;
            }
            .mawe {
                margin-top: 5.875rem;
            }
            .mabo {
                margin-top: 5rem;
            }
            th {
                display: block;
            }
            .modal-margin-mob {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
            thead {
                display: none;
            }
            td:before {
                content: attr(data-label);
                font-weight: bold;
                text-align: left;
            }
            td {
                display: flex;
                justify-content: space-between;
                text-align: right;
                width: auto;
            }
            td.butmob {
                display: inline;
            }
        }
        #primarytechno {
            background-color: #2c598d;
        }
        .img {
            width: 100%;
            max-width: 1368px;
            height: auto;
            box-shadow: rgba(0, 0, 0, 0.19) 0 10px 20px, rgba(0, 0, 0, 0.23) 0 6px 6px;
        }
        .itemhome {
            margin: 12px;
            border-style: solid;
            border-width: 2px;
            border-radius: 6px;
            border-color: #d9dde3;
        }
    </style>
    <body class="bg-color">
        @include('nav')
        <div class="container pad-mob">
            <div class="columns">
                <div class="column mawe">
                    <h1 id="nu" class="title is-4">History Booking Working Space</h1>
                </div>
            </div>
            <div class="columns is-centered pad-mob">
                <div class="column is-6-tablet is-9-desktop box mabo">
                    @if(!$history->isEmpty())
                    <table class="table is-fullwidth is-hoverable is-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ruangan</th>
                                <th>Tanggal Booking</th>
                                <th>Keperluan</th>
                                <th class="has-text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $data)
                            <tr>
                                <td data-label="No">1</td>
                                <td data-label="Ruangan">{{$data->room_name}}</td>
                                <td data-label="Tanggal Booking">{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}</td>
                                <td data-label="Keperluan">{{$data->keperluan}}</td>
                                <td class="butmob" data-label="">
                                    <div class="buttons is-right">
                                        <button
                                            id="primarytechno"
                                            class="button is-small is-primary"
                                            type="button"
                                            data-tgl="{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}"
                                            data-room="{{$data->room_name}}"
                                            data-kode="{{$data->kode_booking}}"
                                            onclick="but(this)">Detail</button>
                                        <button class="button is-small is-danger" type="button">Batalkan</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="has-text-centered">Belum ada history booking...</p>
                    @endif
                </div>
            </div>
        </div>

        <div id="tiket" class="modal-margin-mob modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title has-text-weight-bold">Detail Booking</p>
                    <button id="tiket-close" class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <div class="columns is-mobile">
                        <div class="column has-text-centered">
                            Tanggal
                        </div>
                    </div>
                    <div class="columns is-size-4 is-mobile has-text-weight-bold">
                        <div class="tgl column has-text-centered"></div>
                    </div>
                    <div class="columns is-mobile">
                        <div class="column has-text-centered">
                            Ruangan
                        </div>
                    </div>
                    <div class="columns is-mobile is-size-4 has-text-weight-bold">
                        <div class="room column has-text-centered"></div>
                    </div>
                    <div class="columns is-mobile">
                        <div class="column has-text-centered">
                            Kode Booking
                        </div>
                    </div>
                    <div class="columns is-mobile is-size-4 has-text-weight-bold">
                        <div class="kode column has-text-centered"></div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button id="primarytechno" class="ok button is-success is-fullwidth">OK</button>
                </footer>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $(".navbar-burger").click(function () {
                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");

            });
        });

        function but(val) {
            $("#tiket").addClass("is-active");
            var tgl = $(val).attr("data-tgl");
            $(".tgl").html(tgl);
            $(".room").html($(val).attr("data-room"));
            $(".kode").html($(val).attr("data-kode"));
            $("#tiket-close, .ok").click(function () {
                $("#tiket").removeClass("is-active");
            });
        };

        $("#history-nav").css({"background-color":"#d3e3ff", "color":"#001c39"});
    </script>
</html>