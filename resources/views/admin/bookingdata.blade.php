<thead>
    <tr>
        <th>Nama Pengunjung</th>
        <th>Ruangan</th>
        <th>Keperluan</th>
        <th>Tanggal Berkunjung</th>
        <th class="has-text-right">Detail</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $data)
    <tr>
        <td data-label="Nama Pengunjung">{{$data->name}}</td>
        <td data-label="Ruangan">{{$data->room_name}}</td>
        <td data-label="Keperluan">{{$data->keperluan}}</td>
        <td data-label="Tanggal Berkunjung">{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}</td>
        <td class="is-actions-cell">
            <div class="buttons is-right">
                <button
                    class="button is-small is-primary"
                    type="button"
                    data-kode="{{$data->kode_booking}}"
                    data-nama="{{$data->name}}"
                    data-room="{{$data->room_name}}"
                    data-tgl="{{$data->tanggal->isoFormat('ddd, DD MMM Y')}}"
                    data-keperluan="{{$data->keperluan}}"
                    data-book="{{$data->created_at->isoFormat('ddd, DD MMM Y')}}"
                    data-nik="{{$data->nik}}"
                    onclick="detail(this)">
                    <span class="icon">
                        <i class="mdi mdi-eye"></i>
                    </span>
                </button>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>