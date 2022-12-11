<!DOCTYPE html>
<html>

<head>
    <title>Export to PDF</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <div class="text-center">
        <h5>Laporan Warga Penerima BLT</h4>
            <h6>Periode {{Carbon\Carbon::parse($periode)->format('F Y') }}
        </h5>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @forelse($warga as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->nik}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->nilai_akhir}}</td>
            </tr>
            @empty
            <td colspan="50%" class="text-center">Data tidak tersedia</td>
            @endforelse
        </tbody>
    </table>

</body>

</html>