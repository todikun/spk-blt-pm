<form action="{{route('aspek.update', $aspek->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="{{old('kode', $aspek->kode)}}" placeholder="Kode"
                required>

        </div>
        <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{old('nama', $aspek->nama)}}" placeholder="Nama"
                required>
        </div>

    </div>

    <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
</form>