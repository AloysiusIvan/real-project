@foreach ($data as $item)
<div class="columns is-centered pad-mob mar-mob">
    <div
        class="hov column is-6-tablet is-9-desktop box mt-3"
        data-id="{{$item->id}}"
        data-name="{{$item->room_name}}"
        data-cap ="{{$item->cap}}"
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
                    <p class="is-size-6">Sisa Kapasitas : 
                        @if($item->cap == "")
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
                        <input class="input" type="text" placeholder="NIK">
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
                    <button id="primarytechno" class="button is-primary">Book</button>
                    <button id="closegroup" class="button text is-primary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function book(val) {
        var id = $(val).attr("data-id");
        var name = $(val).attr("data-name");
        var cap = $(val).attr("data-cap");
        var keperluan = $("#keperluan").val();
        var tgl = $("#tgl").val();
        if (keperluan == ""){
            Swal.fire({
                title: 'Tolong isi keperluan',
                icon: 'error',
                confirmButtonColor: '#2c598d'
            })    
        } else if (cap == "0"){
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
                denyButtonText: `Booking Group`,
                confirmButtonColor: '#2c598d',
                denyButtonColor: '#d8e3f8',
                cancelButtonColor: '#ffffff'
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
            $(".swal2-deny").click(function(){
                $("#group").addClass("is-active");
                $("#closegroup").click(function(){
                    $("#group").removeClass("is-active");
                });
                $(".modal-background").click(function(){
                    $("#group").removeClass("is-active");
                    $(".par").remove();
                });
            });
        }
    }

    $("#add").click(function(){
        $("#wrap").append('<div class="columns par is-mobile"><div class="column is-10"><input class="input" type="text" placeholder="NIK"></div><div class="column"><button id="rem" class="button err"><span class="material-symbols-outlined">close</span></button></div></div>');
        $(".err").click(function(){
            $(this).parent("div").parent("div").remove();
        });
    });
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
</style>