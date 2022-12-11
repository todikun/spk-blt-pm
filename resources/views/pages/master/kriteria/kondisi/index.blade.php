@extends('layouts.main')

@section('title', 'Data Kriteria')

@section('content')

<!-- Table -->

<div class="content-body">
    <div class="container-fluid">
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">

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
                        <h4 class="card-title">Data Kondisi</h4>
                        <div class="justify-content-sm-end">
                            <a href="{{route('kondisi.create', ['kriteria' => $kriteria->id])}}"
                                class="btn btn-primary btn-add mb-2 ml-3 font-weight-bold">+
                                Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex text-black-50 col-md-6">
                            <div>
                                <p>Kriteria</p>
                                <p>Nilai ideal</p>
                            </div>
                            <div class="mx-auto">
                                <p> : {{$kriteria->nama}}</p>
                                <p> : {{$kriteria->nilai_ideal}}</p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm" data-form="deleteForm">
                                <thead>
                                    <tr>
                                        <th width="1%">#</th>
                                        <th>Kondisi</th>
                                        <th>Nilai</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kondisi as $item)
                                    <tr class="text-dark">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->nilai}}</td>
                                        <td>
                                            <a href="{{route('kondisi.edit', $item->id)}}"
                                                class="btn btn-xs btn-edit btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form action="{{route('kondisi.destroy', $item->id)}}" method="POST"
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
                $('#baseModal').find('.modal-title').html("Tambah Kondisi");
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
                $('#baseModal').find('.modal-title').html("Edit Kondisi");
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