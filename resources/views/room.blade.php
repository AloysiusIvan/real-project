@foreach ($data as $item)
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
<script>
    function book(val) {
        var id = $(val).attr("data-id");
        var name = $(val).attr("data-name");
        var keperluan = $("#keperluan").val();
        var tgl = $("#tgl").val();
        if (keperluan == ""){
            Swal.fire({
                title: 'Tolong isi keperluan',
                icon: 'error',
                confirmButtonColor: '#2c598d'
            })    
        } else {
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
    }
</script>