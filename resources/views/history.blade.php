<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <script src="{{asset('adminsrc/js/star-rating.min.js')}}"></script>
        <link href="{{asset('adminsrc/js/star-rating.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('adminsrc/css/stardecimal.css') }}">
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
                    @if ($empty > 0)
                    <button id="btnberlangsung" class="button is-small is-info" type="button" onclick="switchToBerlangsung()">Berlangsung</button>
                    <button id="btnexpired" class="button is-small is-light" type="button" onclick="switchToExpired()">Kedaluwarsa</button>
                    <button id="btnselesai" class="button is-small is-light" type="button" onclick="switchToSelesai()">Selesai</button>
                    <table class="table is-fullwidth is-hoverable is-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ruangan</th>
                                <th>Tanggal Booking</th>
                                <th>Keperluan</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th id="ratingth" hidden>Rating</th>
                                <th class="has-text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="berlangsung">
                            <?php 
                                $i = 1;
                            ?>
                            @foreach($history as $data)
                            <tr>
                                <td data-label="No">{{$i++}}</td>
                                <td data-label="Ruangan">{{$data->room_name}}</td>
                                <td data-label="Tanggal Booking">{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}</td>
                                <td data-label="Keperluan">{{$data->keperluan}}</td>
                                <td data-label="jam">{{substr($data->jam_mulai,0,5)}} - {{substr($data->jam_selesai,0,5)}}</td>
                                @if ($data->status == "present" && strtotime($data->jam_selesai) > time())
                                <td data-label="status"><span class="tag is-success">Masuk</span></td>
                                @elseif($data->status == null && $data->tanggal->isoFormat('Y-MM-DD') > date('Y-m-d'))
                                <td data-jam="{{substr($data->jam_mulai,0,5)}}" data-label="status"><span class="tag is-light">Proses</span></td>
                                @elseif($data->status == null && $data->tanggal->isoFormat('Y-MM-DD') == date('Y-m-d') && strtotime($data->jam_mulai) > time())
                                <td data-jam="{{substr($data->jam_mulai,0,5)}}" data-label="status"><span class="tag is-light">Proses</span></td>
                                @elseif($data->status == "present" && strtotime($data->jam_selesai) < time())
                                <td data-jam="{{substr($data->jam_mulai,0,5)}}" data-label="status"><span class="tag is-warning">Keluar</span></td>
                                @else
                                <td data-jam="{{substr($data->jam_mulai,0,5)}}" data-label="status"><span class="tag is-white">Menunggu</span></td>
                                @endif
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
                                        @if($data->status != 'present')
                                        <button data-id="{{$data->id}}" class="button is-small is-danger" type="button" onclick="batalkan(this)">Batalkan</button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tbody id="expired" class="is-hidden">
                            <?php 
                                $i = 1;
                            ?>
                            @foreach($historyexp as $data)
                            <tr>
                                <td data-label="No">{{$i++}}</td>
                                <td data-label="Ruangan">{{$data->room_name}}</td>
                                <td data-label="Tanggal Booking">{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}</td>
                                <td data-label="Keperluan">{{$data->keperluan}}</td>
                                <td data-label="jam">{{substr($data->jam_mulai,0,5)}} - {{substr($data->jam_selesai,0,5)}}</td>
                                <td data-label="status"><span class="tag is-danger">Kedaluwarsa</span></td>
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
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tbody id="selesai" class="is-hidden">
                            <?php 
                                $i = 1;
                            ?>
                            @foreach($historydone as $data)
                            <tr>
                                <td data-label="No">{{$i++}}</td>
                                <td data-label="Ruangan">{{$data->room_name}}</td>
                                <td data-label="Tanggal Booking">{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}</td>
                                <td data-label="Keperluan">{{$data->keperluan}}</td>
                                <td data-label="jam">{{substr($data->jam_mulai,0,5)}} - {{substr($data->jam_selesai,0,5)}}</td>
                                <td data-label="status"><span class="tag is-success">Selesai</span></td>
                                @if($data->like != null)
                                <td class="pt-0"><i data-star="{{$data->like}}" style="font-size:25px;"></i></td>
                                @else
                                <td>Kosong</td>
                                @endif
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
                                        <button data-id="{{$data->id}}" data-like="{{$data->like}}" data-review="{{$data->review}}" class="button is-small is-info" type="button" onclick="review(this)">Review</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p id="dataempty" class="has-text-centered is-hidden">Oops, nggak ada riwayat booking yang sesuai filter...</p>
                    @else
                    <p class="has-text-centered">Tidak ada data riwayat booking...</p>
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
        @include('sweetalert::alert')
    </body>
    <script>
        $(document).ready(function() {
            var count = {{ count($history) }};
            if (count > 0){
                $("#dataempty").addClass("is-hidden");
            }else{
                $("#dataempty").removeClass("is-hidden");
            }
        });

        function removeActive() {
            $("#btnberlangsung").removeClass("is-info");
            $("#btnexpired").removeClass("is-info");
            $("#btnselesai").removeClass("is-info");
            $("#btnberlangsung").removeClass("is-light");
            $("#btnexpired").removeClass("is-light");
            $("#btnselesai").removeClass("is-light");
        }

        function hideAll() {
            $("#berlangsung").addClass("is-hidden");
            $("#expired").addClass("is-hidden");
            $("#selesai").addClass("is-hidden");
        }

        function switchToExpired() {
            var count = {{ count($historyexp) }};
            removeActive();
            hideAll();
            $("#btnexpired").removeClass("is-light");
            $("#btnexpired").addClass("is-info");
            $("#expired").removeClass("is-hidden");
            $("#ratingth").hide();
            if (count > 0){
                $("#dataempty").addClass("is-hidden");
            }else{
                $("#dataempty").removeClass("is-hidden");
            }
        }

        function switchToBerlangsung() {
            var count = {{ count($history) }};
            removeActive();
            hideAll();
            $("#btnberlangsung").removeClass("is-light");
            $("#btnberlangsung").addClass("is-info");
            $("#berlangsung").removeClass("is-hidden");
            $("#ratingth").hide();
            if (count > 0){
                $("#dataempty").addClass("is-hidden");
            }else{
                $("#dataempty").removeClass("is-hidden");
            }
        }

        function switchToSelesai() {
            var count = {{ count($historydone) }};
            removeActive();
            hideAll();
            $("#btnselesai").removeClass("is-light");
            $("#btnselesai").addClass("is-info");
            $("#selesai").removeClass("is-hidden");
            $("#ratingth").show();
            if (count > 0){
                $("#dataempty").addClass("is-hidden");
            }else{
                $("#dataempty").removeClass("is-hidden");
            }
        }

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

        function batalkan(vari){
            var id = $(vari).attr("data-id");
            Swal.fire({
                        title: 'Batalkan Reservasi?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Batalkan',
                        confirmButtonColor: '#2c598d',
                        cancelButtonColor: '#ffffff'
                    });
            $(".swal2-confirm").click(function () {
                window.location = "/cancelbook/"+id;
            });
        }

        function review(vari){
            var id = $(vari).attr("data-id");
            var review = $(vari).attr("data-review");
            var like = $(vari).attr("data-like");
            if (review == ""){
                Swal.fire({
                    title: 'Review Working Space',
                    input: 'text',
                    showCancelButton: true,
                    confirmButtonText: 'Kirim',
                    confirmButtonColor: '#2c598d',
                    cancelButtonColor: '#ffffff'
                });
            } else {
                Swal.fire({
                    title: 'Review Working Space',
                    text: review,
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonText: 'Kembali',
                    cancelButtonColor: '#ffffff'
                });
            }
            if(like == '5'){
                $(".swal2-input").before('<select id="like" class="star-rating-old" disabled> <option value=""></option> <option value="5" selected></option> <option value="4"></option> <option value="3"></option> <option value="2"></option> <option value="1"></option> </select>');
            }else if(like == '4'){
                $(".swal2-input").before('<select id="like" class="star-rating-old" disabled> <option value=""></option> <option value="5"></option> <option value="4" selected></option> <option value="3"></option> <option value="2"></option> <option value="1"></option> </select>');
            }else if(like == '3'){
                $(".swal2-input").before('<select id="like" class="star-rating-old" disabled> <option value=""></option> <option value="5"></option> <option value="4"></option> <option value="3" selected></option> <option value="2"></option> <option value="1"></option> </select>');
            }else if(like == '2'){
                $(".swal2-input").before('<select id="like" class="star-rating-old" disabled> <option value=""></option> <option value="5"></option> <option value="4"></option> <option value="3"></option> <option value="2" selected></option> <option value="1"></option> </select>');
            }else if(like == '1'){
                $(".swal2-input").before('<select id="like" class="star-rating-old" disabled> <option value=""></option> <option value="5"></option> <option value="4"></option> <option value="3"></option> <option value="2"></option> <option value="1" selected></option> </select>');
            }else{
                $(".swal2-input").before('<select id="like" class="star-rating-old"> <option value=""></option> <option value="5"></option> <option value="4"></option> <option value="3"></option> <option value="2"></option> <option value="1"></option> </select>');
            }
            var starratingOld = new StarRating('.star-rating-old');
            $(".gl-star-rating").attr("style","justify-content:center;");
            $(".swal2-confirm").click(function () {
                var inputReview = $(".swal2-input").val();
                var starLike = $("#like").val();
                $.ajax({
                    type: "get",
                    url: "{{route('reviewuser')}}",
                    data: {
                        id: id,
                        review: inputReview,
                        like: starLike
                    },
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Memberikan Review',
                            text: 'Terima kasih telah memberikan review!',
                            showCancelButton: false,
                            showConfirmButton: true,
                            confirmButtonColor: '#2c598d',
                            confirmButtonText: 'OK'
                        }).then((result)=>{
                            location.reload();
                        });
                    }
                });
            });
        }
        $("#history-nav").css({"background-color":"#d3e3ff", "color":"#001c39"});
    </script>
    <style>
        .swal2-styled.swal2-cancel {
            color: #2c598d;
        }
    </style>
</html>