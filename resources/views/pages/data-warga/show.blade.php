@extends('layouts.main')

@section('title', 'Data Kondisi Warga')

@section('content')

<!-- Table -->

<div class="content-body">
    <div class="container-fluid">
        <!-- row -->

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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Kondisi Warga</h4>
                        @if ($hasil->count() < $kriteria->count())
                        <a href="{{route('warga.kondisi.create', ['warga' => $warga->id])}}"
                            class="btn btn-primary btn-add mb-2 ml-3 font-weight-bold">+ Tambah
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        Nama Warga : {{$warga->nama}}, NIK : {{$warga->nik}}, Periode : {{$warga->periode}}
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th width="1%">#</th>
                                        <th>Kriteria</th>
                                        <th>Kondisi</th>
                                        <th>Nilai</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($hasil as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->kondisi->kriteria->nama}}</td>
                                        <td>{{$item->kondisi->nama}}</td>
                                        <td>{{$item->kondisi->nilai}}</td>
                                        <td>#</td>
                                    </tr>
                                    @empty
                                    <td colspan="5" class="text-center">Kondisi masih kosong</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <tfoot>
                                <div class="alignment-content-end">
                                    <a href="{{route('warga.index')}}" class="btn btn-success font-weight-bold">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                            </tfoot>
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
                $('#baseModal').find('.modal-title').html("Tambah Kondisi Warga");
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