<!-- Table -->
<div class="d-flex text-dark col-md-6 mb-3">
    <div>
        <p>NIK</p>
        <p>Nama</p>
        <p>Periode</p>
    </div>
    <div class="mx-auto">
        <p> : {{$warga->nik}}</p>
        <p> : {{$warga->nama}}</p>
        <p> : {{ Carbon\Carbon::parse($warga->periode)->format('F Y') }}</p>
    </div>
</div>
<div class="table-responsive">
    <table class="table header-border table-responsive-sm text-dark">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th>Kriteria</th>
                <th>Kondisi</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasil as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->kondisi->kriteria->nama}}</td>
                <td>{{$item->kondisi->nama}}</td>
                <td>{{$item->kondisi->nilai}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>