<form action="{{route('kriteria.update', $kriteria->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Aspek</label>
            <select class="form-control" name="aspekid">
                <option value="">PILIH</option>
                @foreach ($aspek as $item)
                <option value="{{$item->id}}" {{$kriteria->aspekid == $item->id ? 'selected' : ''}}>{{$item->nama}}
                </option>
                @endforeach
            </select>

        </div>

        <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{old('nama', $kriteria->nama)}}"
                placeholder="Nama" required>
        </div>

        <div class="form-group col-md-6">
            <label>Nilai Ideal</label>
            <input type="number" name="nilai_ideal" class="form-control"
                value="{{old('nilai_ideal', $kriteria->nilai_ideal)}}" placeholder="Nilai Ideal" required>
        </div>

    </div>

    <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
</form>