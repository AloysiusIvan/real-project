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
        }
        @media all and (max-width:1023px) {
            .pad-mob {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
            body {
                background-color: linear-gradient(to top, #f0f2f5 0%, #f0f2f5 47%, #2c598d 47%, #2c598d 100%);
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
                    <table class="table is-fullwidth is-hoverable is-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ruangan</th>
                                <th>Tanggal Booking</th>
                                <th>Keperluan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $data)
                            <tr>
                                <td>1</td>
                                <td>{{$data->room_name}}</td>
                                <td>{{$data->tanggal->format('D, d M Y')}}</td>
                                <td>{{$data->keperluan}}</td>
                                <td style="max-width:4.5rem">
                                    <span class="but button is-primary is-small">Detail</span>
                                    <span class="button is-danger is-small">Batalkan</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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

        $(".but").click(function () {
            Swal.fire(
                {title: 'Haiii', text: 'Kode booking anda adalah : ', icon: 'info', confirmButtonColor: '#2c598d'}
            )
        });
    </script>
</html>