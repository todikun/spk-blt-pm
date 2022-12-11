<form action="{{route('warga.update', $warga->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" value="{{$warga->nik}}" placeholder="NIK" required>
        </div>
        <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{$warga->nama}}" placeholder="Nama" required>
        </div>

        <div class="form-group col-md-6">
            <label>Periode Bantuan</label>
            <input type="month" name="periode" class="form-control"
                value="{{ Carbon\Carbon::parse($warga->periode)->format('Y-m') }}" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
</form>