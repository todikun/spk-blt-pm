@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Calon Penerima BLT Tahun ini </div>
                            <div class="stat-digit">{{$warga_year->count()}} <span
                                    class="text-black-50 text-sm">Orang</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Calon Penerima BLT Bulan ini</div>
                            <div class="stat-digit">{{$warga_month->count()}} <span
                                    class="text-black-50 text-sm">Orang</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection