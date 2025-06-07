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
                                <label>Judul Kasus</label>
                                <p class="form-control-plaintext">{{ $data->case->judul_kasus ?? '-' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Nama Klien</label>
                                <p class="form-control-plaintext">{{ $data->case->client->nama ?? '-' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Sidang</label>
                                <p class="form-control-plaintext">{{ \Carbon\Carbon::parse($data->tanggal_sidang)->translatedFormat('d F Y') ?? '-' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Lokasi Sidang</label>
                                <p class="form-control-plaintext">{{ $data->lokasi ?? '-' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Nomor Perkara</label>
                                <p class="form-control-plaintext">{{ $data->nomor_perkara ?? '-' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Hasil Sidang</label>
                                <p class="form-control-plaintext">{{ $data->hasil_sidang ?? '-' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Catatan Tambahan</label>
                                <p class="form-control-plaintext">{{ $data->catatan ?? '-' }}</p>
                            </div>

                            <hr class="my-4 d-block">

                            <div class="form-group">
                                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('advokasi'))
                                <!-- Tombol Ubah -->
                                <a href="{{ route('courtSession.edit', $data->id) }}" class="btn btn-dark text-primary">
                                    <i class="fa fa-edit"></i> Ubah
                                </a>
                                @endif

                            <!-- Tombol Kembali -->
                                <a href="{{ route('courtSession.index') }}" class="btn">
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
