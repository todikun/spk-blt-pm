@extends('layouts.main')

@section('title', 'Hasil Seleksi Warga')

@section('content')

<!-- Table -->

<div class="content-body">
    <div class="container-fluid">

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                        class="mdi mdi-close"></i></span>
            </button>
            <strong>{{session('success')}}</strong>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-white">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                        class="mdi mdi-close"></i></span>
            </button>
            <strong>{{session('error')}}</strong>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close h-100 text-white" data-dismiss="alert" aria-label="Close"><span><i
                        class="mdi mdi-close"></i></span>
            </button>
            @foreach ($errors->all() as $error)
            <div class="font-weight-bold text-white">{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Hasil seleksi warga penerima BLT periode {{
                            Carbon\Carbon::parse($periode)->format('F Y') }}</h4>
                        <div class="justify-content-sm-end d-inline-flex">
                            <form action="{{route('warga.search')}}" method="GET" class="form-inline">

                                <input type="hidden" name="type" value="result">
                                <div class="form-group mb-2">
                                    <input type="month" class="form-control" name="periode" placeholder="Periode">
                                </div>
                                <button type="submit" class="btn btn-dark mb-2 mr-2 font-weight-bold">Search</button>
                            </form>

                            <a href="{{route('warga.laporan', ['periode' => $periode])}}"
                                class="btn btn-danger mb-2 ml-3 font-weight-bold">Export to PDF
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th width="1%">#</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($warga as $item)
                                    <tr class="text-dark ">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->nik}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->nilai_akhir}}</td>
                                        <td>
                                            <a href="{{route('warga.result.show', $item->id)}}"
                                                class="btn btn-xs btn-detail btn-outline-light">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @empty
                                    <td colspan="50%" class="text-center">Belum ada data</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('client-script')
<script>
    // event button add
        $('.btn-add').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            dataType: 'HTML',
            method: 'GET',
            success: function(result) {
                $('#baseModal').find('.modal-title').html("Tambah Warga");
                $('#baseModal').find('.modal-body').html(result);
                $('#baseModal').modal('show');
            },
            error: function(err) {
                console.log(err);
            }
        });
    });

    // event button detail
        $('.btn-detail').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            dataType: 'HTML',
            method: 'GET',
            success: function(result) {
                $('#baseModal').find('.modal-title').html("Detail Warga");
                $('#baseModal').find('.modal-body').html(result);
                $('#baseModal').modal('show');
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
        
</script>
@endpush