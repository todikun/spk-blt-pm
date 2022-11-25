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
                                <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
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
                                        <th>Nama</th>
                                        <th>Ttl</th>
                                        <th>#</th>
                                        <th>#</th>
                                        <th>#</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="javascript:void(0)">1</a>
                                        </td>
                                        <td>Herman Beck</td>
                                        <td><span class="text-muted">Oct 16, 2017</span>
                                        </td>
                                        <td>$45.00</td>
                                        <td><span class="badge badge-success">Paid</span>
                                        </td>
                                        <td>EN</td>
                                        <td>#</td>
                                    </tr>
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