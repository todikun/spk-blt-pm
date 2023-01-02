<form action="{{route('warga.kondisi.store')}}" method="POST">
    @csrf

    <input type="hidden" name="wargaid" value="{{$warga->id}}">
    <div class="form-row">
        <div class="form-group col-md">
            <label>Kriteria</label>
            <select class="form-control" name="kondisiid">
                <option value="">PILIH</option>
                @foreach ($kondisi as $item)
                @if ($loop->iteration > sizeof($data))
                <option value="{{$item->id}}">
                    {{$loop->iteration . '. ' .$item->kriteria->nama}}
                    ({{$item->nama}})
                </option>
                @endif
                @endforeach
            </select>
        </div>

    </div>

    <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
</form>