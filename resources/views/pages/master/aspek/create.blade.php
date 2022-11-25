<form action="{{route('aspek.store')}}" method="POST">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" placeholder="Kode" required>

        </div>
        <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
        </div>

    </div>

    <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
</form>