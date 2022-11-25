<form action="{{route('kriteria.store')}}" method="POST">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Aspek</label>
            <select class="form-control" name="aspekid">
                <option value="">PILIH</option>
                @foreach ($aspek as $item)
                <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
        </div>

        <div class="form-group col-md-6">
            <label>Nilai Ideal</label>
            <input type="number" name="nilai_ideal" class="form-control" placeholder="Nilai Ideal" required>
        </div>

    </div>

    <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
</form>