<form action="{{route('warga.store')}}" method="POST">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" placeholder="NIK" required>
        </div>
        <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
        </div>

        <div class="form-group col-md-6">
            <label>Periode Bantuan</label>
            <input type="month" name="periode" class="form-control" required>
        </div>

    </div>

    <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
</form>