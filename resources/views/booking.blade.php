<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        .lds-dual-ring {
            display: inline-block;
            width: 80px;
            height: 80px;
            position: absolute;
            top: 51%;
            left: 51.2%;
            margin: -50px 0 0 -50px;
        }
        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 64px;
            height: 64px;
            margin: 8px;
            border-radius: 50%;
            border: 6px solid #fff;
            border-color: #fff transparent #fff transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }
        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        #overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 5;
            top: 0;
            background: rgba(0, 0, 0, 0.5);
        }
    </style>
    <body class="bg-color">
        <div id="overlay" hidden="hidden">
            <div class="lds-dual-ring"></div>
        </div>
        @include('nav')
        <div class="container pad-mob">
            <div class="columns">
                <div class="column mawe">
                    <h1 id="nu" class="title is-4">Pilih tanggal dan isi keperluan</h1>
                </div>
            </div>
            <div class="columns is-centered pad-mob">
                <div class="column is-6-tablet is-9-desktop box mabo">
                    <div class="field">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Keperluan</label>
                                <div class="control">
                                    <input
                                        id="keperluan"
                                        type="text"
                                        class="input inre is-fullwidth"
                                        required="required"
                                        name="keperluan">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Tanggal Berkunjung</label>
                                <div class="control">
                                    <input
                                        placeholder="Pilih Tanggal"
                                        id="tgl"
                                        name="tgl"
                                        class="input is-fullwidth"
                                        type="date"
                                        required="required">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Jam Mulai</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select id="jam_mulai" name="jam_mulai" required="required">
                                            <option value="" selected="selected" hidden="hidden">Pilih Jam Mulai</option>
                                            <option value="08:00:00">08:00</option>
                                            <option value="09:00:00">09:00</option>
                                            <option value="10:00:00">10:00</option>
                                            <option value="11:00:00">11:00</option>
                                            <option value="12:00:00">12:00</option>
                                            <option value="13:00:00">13:00</option>
                                            <option value="14:00:00">14:00</option>
                                            <option value="15:00:00">15:00</option>
                                            <option value="16:00:00">16:00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Jam Selesai</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select id="jam_selesai" name="jam_selesai" required="required">
                                            <option value="" selected="selected" hidden="hidden">Pilih Jam Selesai</option>
                                            <option value="none" disabled>-----</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="read"></div>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $(".navbar-burger").click(function () {
                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");

            });
        });

        function read() {
            $.ajax({
                type: "get",
                url: "{{url('booking/search')}}",
                data: {
                    tgl: $("#tgl").val(),
                    jam_mulai: $("#jam_mulai").val(),
                    jam_selesai: $("#jam_selesai").val()
                },
                success: function (data) {
                    $("#read").html(data);
                }
            });
        }

        $("#tgl").change(function () {
            var date = new Date();
            var dateNow = date.toISOString().split('T')[0];
            var currentHour = date.getHours();
            if ($("#tgl").val() == dateNow) {
                $("#jam_mulai").find("option").each(function() {
                    var optionValue = $(this).val();
                    if (optionValue <= currentHour+":00:00") {
                        $(this).hide();
                    }
                });
            } else { $('#jam_mulai option').not('[value=""]').show(); }
            $("#jam_mulai").val("");
            $.ajax({
                type: "get",
                url: "{{route('search')}}",
                data: {
                    tgl: $("#tgl").val(),
                    jam_mulai: $("#jam_mulai").val(),
                    jam_selesai: $("#jam_selesai").val()
                },
                beforeSend: function () {
                    $("#overlay").show();
                },
                success: function (data) {
                    $("#read").html(data);
                    $(".hov").hover(function () {
                        $(this).addClass("bor");
                    }, function () {
                        $(this).removeClass("bor");
                    });
                    $("#overlay").hide();
                }
            });
        });

        $("#jam_selesai").change(function () {
            $.ajax({
                type: "get",
                url: "{{route('search')}}",
                data: {
                    tgl: $("#tgl").val(),
                    jam_mulai: $("#jam_mulai").val(),
                    jam_selesai: $("#jam_selesai").val()
                },
                beforeSend: function () {
                    $("#overlay").show();
                },
                success: function (data) {
                    $("#read").html(data);
                    $(".hov").hover(function () {
                        $(this).addClass("bor");
                    }, function () {
                        $(this).removeClass("bor");
                    });
                    $("#overlay").hide();
                }
            });
        });

        $("#jam_mulai").change(function(){
            if($("#jam_mulai").val()=="09:00:00"){
                $("#jam_selesai").html('<option value="" selected="selected" hidden="hidden">Pilih Jam Selesai</option> <option value="10:00:00">10:00</option> <option value="11:00:00">11:00</option> <option value="12:00:00">12:00</option> <option value="13:00:00">13:00</option> <option value="14:00:00">14:00</option> <option value="15:00:00">15:00</option> <option value="16:00:00">16:00</option> <option value="17:00:00">17:00</option>');
            }else if($("#jam_mulai").val()=="10:00:00"){
                $("#jam_selesai").html('<option value="" selected="selected" hidden="hidden">Pilih Jam Selesai</option> <option value="11:00:00">11:00</option> <option value="12:00:00">12:00</option> <option value="13:00:00">13:00</option> <option value="14:00:00">14:00</option> <option value="15:00:00">15:00</option> <option value="16:00:00">16:00</option> <option value="17:00:00">17:00</option>');
            }else if($("#jam_mulai").val()=="11:00:00"){
                $("#jam_selesai").html('<option value="" selected="selected" hidden="hidden">Pilih Jam Selesai</option> <option value="12:00:00">12:00</option> <option value="13:00:00">13:00</option> <option value="14:00:00">14:00</option> <option value="15:00:00">15:00</option> <option value="16:00:00">16:00</option> <option value="17:00:00">17:00</option>');
            }else if($("#jam_mulai").val()=="12:00:00"){
                $("#jam_selesai").html('<option value="" selected="selected" hidden="hidden">Pilih Jam Selesai</option> <option value="13:00:00">13:00</option> <option value="14:00:00">14:00</option> <option value="15:00:00">15:00</option> <option value="16:00:00">16:00</option> <option value="17:00:00">17:00</option>');
            }else if($("#jam_mulai").val()=="13:00:00"){
                $("#jam_selesai").html('<option value="" selected="selected" hidden="hidden">Pilih Jam Selesai</option> <option value="14:00:00">14:00</option> <option value="15:00:00">15:00</option> <option value="16:00:00">16:00</option> <option value="17:00:00">17:00</option>');
            }else if($("#jam_mulai").val()=="14:00:00"){
                $("#jam_selesai").html('<option value="" selected="selected" hidden="hidden">Pilih Jam Selesai</option> <option value="15:00:00">15:00</option> <option value="16:00:00">16:00</option> <option value="17:00:00">17:00</option>');
            }else if($("#jam_mulai").val()=="15:00:00"){
                $("#jam_selesai").html('<option value="" selected="selected" hidden="hidden">Pilih Jam Selesai</option> <option value="16:00:00">16:00</option> <option value="17:00:00">17:00</option>');
            }else if($("#jam_mulai").val()=="16:00:00"){
                $("#jam_selesai").html('<option value="" selected="selected" hidden="hidden">Pilih Jam Selesai</option> <option value="17:00:00">17:00</option>');
            } else{
                $("#jam_selesai").html('<option value="" selected="selected" hidden="hidden">Pilih Jam Selesai</option> <option value="09:00:00">09:00</option> <option value="10:00:00">10:00</option> <option value="11:00:00">11:00</option> <option value="12:00:00">12:00</option> <option value="13:00:00">13:00</option> <option value="14:00:00">14:00</option> <option value="15:00:00">15:00</option> <option value="16:00:00">16:00</option> <option value="17:00:00">17:00</option>');
            }
        });

        $(function () {
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10) 
                month = '0' + month.toString();
            if (day < 10) 
                day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('#tgl').attr('min', maxDate);
        });

        $("#book-nav").css({"background-color":"#d3e3ff", "color":"#001c39"});
    </script>
</html>