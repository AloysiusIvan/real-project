<thead>
    <tr>
        <th>Nama Ruangan</th>
        <th>Kapasitas</th>
        <th class="has-text-centered">Status</th>
        <th class="has-text-right">Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach ($data as $item)
    <tr>
        <td data-label="Nama Ruangan">{{$item->room_name}}</td>
        <td data-label="Kapasitas">{{$item->kapasitas}}</td>
        <td data-label="Status" style="text-align:center;">
            @if ($item->status == "active")
            <span class="icon has-text-success">
                <i class="mdi mdi-24px mdi-check"></i>
            </span>
            @else
            <span class="icon has-text-danger">
                <i class="mdi mdi-24px mdi-close"></i>
            </span>
            @endif
        </td>
        <td class="is-actions-cell">
            <div class="buttons is-right">
                <a
                    data-capacity="{{$item->kapasitas}}"
                    data-roomname="{{$item->room_name}}"
                    data-status="{{$item->status}}"
                    onclick="detailModal(this)">
                    <button
                        class="button is-small is-primary"
                        type="button"
                        style="background-color:rgba(0,0,0,0);color:#234771;">
                        <span class="icon">
                            <i class="mdi mdi-eye"></i>
                        </span>
                    </button>
                </a>
                <a href="{{route('editroom',$item->id)}}">
                    <button
                        class="button is-small is-primary"
                        type="button"
                        style="background-color:#d8e3f8;color:#111c2b;">
                        <span class="icon">
                            <i class="mdi mdi-pencil"></i>
                        </span>
                    </button>
                </a>
                <a data-id="{{$item->id}}" onclick="deleteModal(this)">
                    <button class="button is-small is-danger jb-modal" type="button">
                        <span class="icon">
                            <i class="mdi mdi-trash-can"></i>
                        </span>
                    </button>
                </a>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>