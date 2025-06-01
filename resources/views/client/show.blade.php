@extends('layouts.app')
@section('content')

<!-- main content -->
<div class="container">
    <div class="page-inner">

        <x-page-header 
            :pageTitle="$pageTitle" 
            :pageDescription="$pageDescription" 
        />

        <div class="page-category">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <x-alert />

                            <!-- Detail Data Start -->
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <p class="form-control-plaintext">{{ $data->nama }}</p>
                            </div>

                            <div class="form-group">
                                <label>NIK</label>
                                <p class="form-control-plaintext">{{ $data->nik }}</p>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <p class="form-control-plaintext">{{ $data->alamat }}</p>
                            </div>

                            <div class="form-group">
                                <label>No. HP</label>
                                <p class="form-control-plaintext">{{ $data->no_hp }}</p>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Input</label>
                                <p class="form-control-plaintext">{{ \Carbon\Carbon::parse($data->tanggal_input)->format('d-m-Y') }}</p>
                            </div>

                            <hr class="my-4 d-block">

                            <div class="form-group">
                                <!-- Tombol Ubah -->
                                <a href="{{ route('client.edit', $data->id) }}" class="btn btn-dark text-primary">
                                    <i class="fa fa-edit"></i> Ubah
                                </a>

                            <!-- Tombol Kembali -->
                                <a href="{{ route('client.index') }}" class="btn">
                                    <i class="fa fa-times-circle"></i> Tutup
                                </a>
                            </div>
                            <!-- Detail Data End -->

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- end page-inner -->
</div>
<!-- end container -->

@stop

@push('scripts')
@endpush
