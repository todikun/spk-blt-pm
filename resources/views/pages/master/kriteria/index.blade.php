@extends('layouts.main')

@section('title', 'Data Kriteria')

@section('content')

<!-- Table -->

<div class="content-body">
    <div class="container-fluid">
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                class="mdi mdi-close"></i></span>
                    </button>
                    <strong>{{session('success')}}</strong>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close h-100 text-white" data-dismiss="alert"
                        aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                    @foreach ($errors->all() as $error)
                    <div class="font-weight-bold text-white">{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Semua Data Kriteria</h4>
                        <div class="justify-content-sm-end">
                            <a href="{{route('kriteria.create')}}"
                                class="btn btn-primary btn-add mb-2 ml-3 font-weight-bold">+
                                Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm" data-form="deleteForm">
                                <thead>
                                    <tr>
                                        <th width="1%">#</th>
                                        <th>Aspek</th>
                                        <th>Nama</th>
                                        <th>Nilai Ideal</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kriteria as $item)
                                    <tr class="text-dark">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->aspek->nama}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->nilai_ideal}}</td>
                                        <td>
                                            <a href="#" class="btn btn-xs btn-success font-weight-bold">+ Range</a>

                                            <a href="{{route('kriteria.edit', $item->id)}}"
                                                class="btn btn-xs btn-edit btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form action="{{route('kriteria.destroy', $item->id)}}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger"
                                                    onclick="return confirm('Apakah data ini akan dihapus?')">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>

                                    @empty
                                    <td colspan="5" class="text-center">Belum ada data</td>
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
                $('#baseModal').find('.modal-title').html("Tambah Kriteria");
                $('#baseModal').find('.modal-body').html(result);
                $('#baseModal').modal('show');
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
    
    // event button edit
    $('.btn-edit').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            dataType: 'HTML',
            method: 'GET',
            success: function(result) {
                $('#baseModal').find('.modal-title').html("Edit Kriteria");
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