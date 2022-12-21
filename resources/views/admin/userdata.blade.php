<thead>
    <tr>
        <th>NIK</th>
        <th>Nama</th>
        <th>Pekerjaan</th>
        <th>Nama Instansi</th>
        <th>Tanggal</th>
        <th class="has-text-right">Aksi</th>
    </tr>
</thead>
<tbody id="waiting-tab-content">
    @foreach ($data as $item)
    <tr>
        <td data-label="NIK">{{$item->nik}}</td>
        <td data-label="Name">{{$item->name}}</td>
        <td data-label="Profesi">{{$item->profesi}}</td>
        <td data-label="nama Institusi">{{$item->nama_institusi}}</td>
        <td data-label="Created">{{$item->created_at->format('d M, Y')}}</td>
        <td class="is-actions-cell">
            <div class="buttons is-right">
                <a href="{{route('detailuser',$item->id)}}">
                    <button class="button is-small is-primary" type="button">
                        <span class="icon">
                            <i class="mdi mdi-eye"></i>
                        </span>
                    </button>
                </a>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>