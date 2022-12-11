<form action="{{route('kondisi.update', $kondisi->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-row">

        <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{$kondisi->nama}}" placeholder="Nama" required>
        </div>

        <div class="form-group col-md-6">
            <label>Nilai</label>
            <input type="number" name="nilai" class="form-control" value="{{$kondisi->nilai}}"
                placeholder="Max: {{$kondisi->kriteria->nilai_ideal}}" required>
        </div>

    </div>

    <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
</form>