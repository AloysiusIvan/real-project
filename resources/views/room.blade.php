<div class="columns is-centered pad-mob mar-mob">
    @foreach ($data as $index => $item)
        @if ($index % 3 === 0)
            @if ($index > 0)
                </div><!-- Closing previous row -->
            @endif
            <div class="columns is-centered">
        @endif

        <div class="column is-4-tablet is-3-desktop">
            <div class="tile is-parent is-vertical box mt-3 hov" data-id="{{$item->id}}" data-name="{{$item->room_name}}" data-cap="{{$item->cap}}" data-capfull="{{$item->kapasitas}}" onclick="book(this)">
                <div class="tile is-child">
                    <img src="{{asset('storage/img/room/'.$item->photo)}}" alt="{{$item->room_name}}">
                </div>
                <div class="tile is-child">
                    <p class="is-size-5"><strong>{{$item->room_name}}</strong></p>
                    <p class="is-size-6">Kapasitas: {{$item->kapasitas}} orang</p>
                    <p class="is-size-6 actsisa">Sisa Kapasitas:
                        @if($item->cap == "")
                        <b>{{$item->kapasitas}}</b>
                        @else
                        <b>{{$item->cap}}</b>
                        @endif orang
                    </p>
                    <p class="is-size-6">{{$item->ac}}</p>
                    @if($item->ac == "AC")
                    <p class="is-size-6">No Smoking</p>
                    @else
                    <p class="is-size-6">Smoking Area</p>
                    @endif
                </div>
            </div>
        </div>

        @if ($loop->last || ($loop->iteration % 3 === 0))
            </div><!-- Closing row after every three items or on the last item -->
        @endif
    @endforeach
</div>

<div id="group" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="container box">
            <div class="columns">
                <div class="column">
                    <p class="has-text-danger has-text-weight-bold">NIK harus sudah terdaftar</p>
                </div>
            </div>
            <div id="wrap">
                <div class="columns is-mobile">
                    <div class="column is-10">
                        <input class="input nikgroup" type="text" name="nikgroup[]" value="{{auth()->user()->nik}}" placeholder="NIK" maxlength="16" readonly>
                    </div>
                </div>
                <div class="columns is-mobile">
                    <div class="column is-10">
                        <input id="nik2" class="input nikgroup" type="text" name="nikgroup[]" placeholder="NIK" maxlength="16">
                    </div>
                    <div class="column">
                        <button id="add" class="button sec">
                            <span class="material-symbols-outlined">
                                add
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <button id="primarytechno" class="button bookgroup is-primary">Book</button>
                    <button id="closegroup" class="button text is-primary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function refresh(){
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
    }

    function book(val) {
        var htmlContent = $(val).find(".actsisa").html();
        var realsisa = htmlContent.replace(/\D/g, "");
        var id = $(val).attr("data-id");
        var name = $(val).attr("data-name");
        var cap = $(val).attr("data-cap");
        var keperluan = $("#keperluan").val();
        var jam_mulai = $("#jam_mulai").val();
        var jam_selesai = $("#jam_selesai").val();
        var tgl = $("#tgl").val();
        if (keperluan == ""){
            Swal.fire({
                title: 'Tolong isi keperluan',
                icon: 'error',
                confirmButtonColor: '#2c598d'
            })    
        } else if (jam_mulai == ""){
            Swal.fire({
                title: 'Tolong isi waktu mulai',
                icon: 'error',
                confirmButtonColor: '#2c598d'
            })
        } else if (jam_selesai == ""){
            Swal.fire({
                title: 'Tolong isi waktu selesai',
                icon: 'error',
                confirmButtonColor: '#2c598d'
            })
        } else if (realsisa == "0"){
            Swal.fire({
                title: 'Ruangan sudah penuh',
                icon: 'error',
                confirmButtonColor: '#2c598d'
            })
        } else {
            Swal.fire({
                title: 'Booking ruangan ini?',
                text: 'Pilih "OK" untuk melanjutkan',
                icon: 'question',
                showCancelButton: true,
                showDenyButton: true,
                denyButtonText: 'Booking Group',
                confirmButtonColor: '#2c598d',
                denyButtonColor: '#d8e3f8',
                cancelButtonColor: '#ffffff'
            })
            if (realsisa == "1"){
                $(".swal2-deny").css("display", "none");
            }
            $(".swal2-confirm").click(function () {
                $.ajax({
                    type: "get",
                    data: {
                        keperluan: $("#keperluan").val(),
                        jam_mulai: $("#jam_mulai").val(),
                        jam_selesai: $("#jam_selesai").val(),
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
            $(".swal2-cancel").click(function(){
                refresh();
            });
            $(".swal2-deny").click(function(){
                $("#group").addClass("is-active");
                $("#closegroup").click(function(){
                    $("#group").removeClass("is-active");
                    $(".par").remove();
                    $("#nik2").val("");
                    x = 2;
                    refresh();
                });
                $(".modal-background").click(function(){
                    $("#group").removeClass("is-active");
                    $(".par").remove();
                    $("#nik2").val("");
                    x = 2;
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
                if (cap != ""){
                    var maxnik = cap;
                } else {
                    var maxnik = $(val).attr("data-capfull");
                }
                var x = 2;
                $("#add").click(function(e){
                    e.preventDefault();
                    if (x < maxnik){
                        x++;
                        $("#wrap").append('<div class="columns par is-mobile"><div class="column is-10"><input class="input" name="nikgroup[]" type="text" placeholder="NIK" maxlength="16"></div><div class="column"><button id="rem" class="button err"><span class="material-symbols-outlined">close</span></button></div></div>');
                    }
                    $(".err").click(function(e){
                        e.preventDefault();
                        $(this).parent("div").parent("div").remove();
                        x--;
                        if (x < 2){
                            x = 2;
                        }
                    });
                });
                function forceNumeric(){
                    var $input = $(this);
                    $input.val($input.val().replace(/[^\d]+/g,''));
                }
                $('#group').on('propertychange input', 'input[type="text"]', forceNumeric);
            });
        }
        
        $(".bookgroup").click(function(){
            var nikgroup = [];
            $('input[name="nikgroup[]"]').each( function() {
                nikgroup.push(this.value);
            });
            $.ajax({
                type: "get",
                url: "{{url('bookinggroup')}}",
                data: {
                    nikgroup: nikgroup,
                    keperluan: $("#keperluan").val(),
                    tgl: $("#tgl").val(),
                    jam_mulai: $("#jam_mulai").val(),
                    jam_selesai: $("#jam_selesai").val(),
                    id_room: $(val).attr("data-id")
                },
                success: function(data){
                    if (data == "already book") {
                        Swal.fire(
                            {title: 'Ooops...', text: 'Anda atau teman anda sudah melakukan booking', icon: 'error', confirmButtonColor: '#2c598d'}
                        )
                    } else if (data == "not found nik") {
                        Swal.fire(
                            {title: 'Ooops...', text: 'NIK belum terdaftar', icon: 'error', confirmButtonColor: '#2c598d'}
                        )
                    } else if (data == "suspended") {
                        Swal.fire(
                            {title: 'Ooops...', text: 'Ada akun yang disuspend', icon: 'error', confirmButtonColor: '#2c598d'}
                        )
                    } else if (data == "duplicate") {
                        Swal.fire(
                            {title: 'Error', text: 'NIK tidak boleh sama', icon: 'error', confirmButtonColor: '#2c598d'}
                        )
                    } else {
                        Swal.fire({
                            title: data,
                            text: 'Silahkan check riwayat',
                            icon: 'success',
                            confirmButtonColor: '#2c598d'
                        }).then((result) => {
                            location.reload();
                        })
                    }
                }
            });
        });
    }
</script>
<link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200"/>
<style>
    .swal2-styled.swal2-deny{
        color: #111c2b;
    }
    .swal2-styled.swal2-cancel {
        color: #2c598d;
    }
    .button.sec{
        background-color: #d3e3ff;
    }
    .button.err{
        background-color: #ffdad6;
    }
    .button.text.is-primary{
        background-color: rgba(255, 99, 71, 0);
        color: #2c598d;
    }
    @media all and (max-width: 1023px) {
        .mar-mob{
            margin-top: 0.5rem;
        }
    }
    .tile.is-vertical>.tile.is-child:not(:last-child) {
        margin-bottom: 0rem!important;
    }
</style>