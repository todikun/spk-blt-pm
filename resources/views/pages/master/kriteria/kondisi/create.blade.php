<form action="{{route('kondisi.store')}}" method="POST">
    @csrf
    <div class="form-row">

        <input type="hidden" name="kriteriaid" value="{{$kriteria->id}}">

        <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
        </div>

        <div class="form-group col-md-6">
            <label>Nilai</label>
            <input type="number" name="nilai" class="form-control" minlength="{{$kriteria->nilai_ideal}}"
                placeholder="Max: {{$kriteria->nilai_ideal}}" required>
        </div>

    </div>

    <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
</form>