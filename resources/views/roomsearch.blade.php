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
            .bg-color {
                background-color: #2c598d;
                height: 31.125rem;
                width: 100vw;
            }
            html {
                background-color: #f0f2f5;
            }
            .mawe {
                margin-left: 9.875rem;
                margin-right: 9.875rem;
                margin-top: 9.375rem;
            }
            .mabo {
                margin-top: 4.875rem;
            }
            .inre {
                width: 50%;
            }
        }
        @media all and (max-width:1023px) {
            .pad-mob {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
            body {
                background: linear-gradient(to top, #f0f2f5 0%, #f0f2f5 47%, #2c598d 47%, #2c598d 100%);
            }
            .mawe {
                margin-top: 5.875rem;
            }
            .mabo {
                margin-top: 5rem;
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
        .bor {
            outline-style: solid;
            outline-width: 3px;
            outline-color: #2c598d;
            cursor: pointer;
        }
        .tile {
            text-decoration: none;
        }
    </style>
    <body class="bg-color">
        @include('nav')
        <div class="container pad-mob">
            <div class="columns">
                <div class="column mawe">
                    <h1 id="nu" class="title is-4">Pilih tanggal dan isi keperluan</h1>
                </div>
            </div>
            <div class="columns is-centered pad-mob">
                <div class="column is-6-tablet is-9-desktop box mabo">
                    <form>
                        <div class="field">
                            <label class="label">Keperluan</label>
                            <div class="control">
                                <input
                                    id="keperluan"
                                    type="text"
                                    class="input inre"
                                    required="required"
                                    name="keperluan"
                                    value="{{$keperluan}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Tanggal Berkunjung</label>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input
                                            id="tgl"
                                            name="tgl"
                                            class="input"
                                            type="date"
                                            value="{{$tgl}}"
                                            required="required">
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <button
                                            id="primarytechno"
                                            class="button is-primary has-text-weight-bold is-fullwidth">
                                            Cari Working Space
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @foreach ($roomavail as $item)
            <div class="columns is-centered pad-mob">
                <div
                    class="hov column is-6-tablet is-9-desktop box mt-3"
                    data-id="{{$item->id}}"
                    data-name="{{$item->room_name}}"
                    onclick="book(this)">
                    <div class="tile is-ancestor">
                        <div class="tile is-4 is-parent">
                            <div class="tile is-child">
                                <img src="{{asset('storage/img/room/'.$item->photo)}}">
                            </div>
                        </div>
                        <div class="tile is-vertical is-parent">
                            <div class="tile is-child">
                                <p class="is-size-5">
                                    <strong>{{$item->room_name}}</strong>
                                </p>
                            </div>
                            <div class="tile is-child">
                                <p class="is-size-6">Kapasitas :
                                    {{$item->kapasitas}}
                                    orang</p>
                            </div>
                            <div class="tile is-child">
                                <p class="is-size-6">AC</p>
                            </div>
                            <div class="tile is-child">
                                <p class="is-size-6">No Smoking</p>
                            </div>
                            <div class="tile is-child">
                                <p class="is-size-6">Sisa Kapasitas : @if($item->cap == null)
                                    {{$item->kapasitas}}
                                    @else
                                    {{$item->cap}}
                                    @endif orang
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $(".navbar-burger").click(function () {
                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");

            });
        });

        $(".hov").hover(function () {
            $(this).addClass("bor");
        }, function () {
            $(this).removeClass("bor");
        });

        function book(val) {
            var id = $(val).attr("data-id");
            var name = $(val).attr("data-name");
            var keperluan = $("#keperluan").val();
            var tgl = $("#tgl").val();
            Swal.fire({
                title: 'Booking ruangan ini?',
                text: 'Pilih "OK" untuk melanjutkan',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#2c598d',
                cancelButtonColor: 'light'
            })
            $(".swal2-confirm").click(function () {
                $.ajax({
                    type: "get",
                    data: {
                        keperluan: $("#keperluan").val(),
                        tgl: $("#tgl").val(),
                        id_room: $(val).attr("data-id")
                    },
                    url: "{{url('booking')}}",
                    success: function (data) {
                        if (data == "fail") {
                            Swal.fire(
                                {title: 'Ooops...', text: 'Anda sudah melakukan booking di hari ini', icon: 'error', confirmButtonColor: '#2c598d'}
                            )
                        } else {
                            Swal
                                .fire({
                                    title: 'Booking Berhasil',
                                    text: 'Kode Booking Anda : ' + data,
                                    icon: 'success',
                                    confirmButtonColor: '#2c598d'
                                })
                                .then((result) => {
                                    location.reload();
                                })
                        }
                    }
                });
            });
        }
    </script>
</html>