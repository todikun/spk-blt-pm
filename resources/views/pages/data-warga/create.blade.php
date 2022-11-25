<form action="{{route('warga.create')}}" method="POST">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
        </div>
        <div class="form-group col-md-6">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgllahir" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label>Tempat Lahir</label>
            <input type="text" name="tmplahir" class="form-control" placeholder="Tempat Lahir" required>
        </div>
        <div class="form-group col-md-6">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required>
        </div>

        <div class="col-md-12">
            <h4 class="my-3">Kriteria</h4>
        </div>

        <div class="form-group col-md-6">
            <label>Tempat Lahir</label>
            <input type="text" name="tmplahir" class="form-control" placeholder="Tempat Lahir" required>
        </div>
        <div class="form-group col-md-6">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required>
        </div>

    </div>

    <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
</form>