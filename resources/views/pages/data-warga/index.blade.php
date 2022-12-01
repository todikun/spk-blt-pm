@extends('layouts.main')

@section('title', 'Data Warga')

@section('content')

<!-- Table -->

<div class="content-body">
    <div class="container-fluid">
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Semua Data Warga</h4>
                        <div class="justify-content-sm-end d-inline-flex">
                            <form action="#" method="GET" class="form-inline">
                                @csrf

                                <div class="form-group mb-2">
                                    <input type="month" class="form-control" placeholder="Periode">
                                </div>
                                <button type="submit" class="btn btn-dark mb-2 mr-2 font-weight-bold">Search</button>
                            </form>

                            <a href="{{route('warga.create')}}"
                                class="btn btn-primary btn-add mb-2 ml-3 font-weight-bold">+ Tambah</a>
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
                                        <th>Periode</th>
                                        <th>Item Kondisi</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($warga as $item)
                                    <tr class="text-dark">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->nik}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{ Carbon\Carbon::parse($item->periode)->format('F Y') }}</td>
                                        <td>
                                            @if ($item->hasil->count() == $kriteria)
                                            <a href="#" class="text-success"><i class="fa fa-check fa-2x"></i></a>
                                            @else
                                            {{$item->hasil->count()}}/{{$kriteria}}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->hasil->count() == $kriteria)
                                            <a href="#" class="btn btn-xs btn-success font-weight-bold">Validasi</a>
                                            @endif

                                            <a href="{{route('warga.show', $item->id)}}"
                                                class="btn btn-xs btn-edit btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form action="{{route('warga.destroy', $item->id)}}" method="POST"
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
                $('#baseModal').find('.modal-title').html("Tambah Warga");
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