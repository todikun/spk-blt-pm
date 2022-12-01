<form action="{{route('warga.kondisi.store')}}" method="POST">
    @csrf

    <input type="hidden" name="wargaid" value="{{$warga->id}}">
    <div class="form-row">
        <div class="form-group col-md">
            <label>Kriteria</label>
            <select class="form-control" name="kondisiid">
                <option value="">PILIH</option>
                @foreach ($kondisi as $item)
                <option value="{{$item->id}}">
                    {{$item->kriteria->nama}}
                    ({{$item->nama}})
                </option>
                @endforeach
            </select>
        </div>

    </div>

    <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
</form>