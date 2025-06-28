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
                                <label>Klien</label>
                                <p class="form-control-plaintext">{{ $data->client->nama ?? '-' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Judul Kasus</label>
                                <p class="form-control-plaintext">{{ $data->judul_kasus }}</p>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kasus</label>
                                <p class="form-control-plaintext text-capitalize">{{ $data->jenis_kasus }}</p>
                            </div>

                            <div class="form-group">
                                <label>Kronologi</label>
                                <p class="form-control-plaintext">{{ $data->kronologi }}</p>
                            </div>

                            <div class="form-group">
                                <label>Bukti Kasus</label>
                                @if (!empty($data->bukti_kasus))
                                    <p>
                                        <a href="{{ asset('storage/' . $data->bukti_kasus) }}" target="_blank" class="btn btn-sm btn-outline-dark">
                                            📎 Unduh Bukti Kasus
                                        </a>
                                    </p>
                                @else
                                    <p class="form-control-plaintext text-muted">Belum ada bukti kasus diunggah.</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <p class="form-control-plaintext text-capitalize">{{ $data->status }}</p>
                            </div>

                            <div class="form-group">
                                <label>Pengacara</label>
                                <p class="form-control-plaintext">{{ $data->pengacara->name ?? '-' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Kepala Advokasi</label>
                                <p class="form-control-plaintext">{{ $data->kepalaAdvokasi->name ?? '-' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <p class="form-control-plaintext">{{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('d M Y') }}</p>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <p class="form-control-plaintext">
                                    {{ $data->tanggal_selesai ? \Carbon\Carbon::parse($data->tanggal_selesai)->format('d M Y') : '-' }}
                                </p>
                            </div>

                            <hr class="my-4 d-block">

                            <div class="form-group">
                                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('advokasi'))
                                <!-- Tombol Ubah -->
                                <a href="{{ route('clientCase.edit', $data->id) }}" class="btn btn-dark text-primary">
                                    <i class="fa fa-edit"></i> Ubah
                                </a>
                                @endif

                            <!-- Tombol Kembali -->
                                <a href="{{ route('clientCase.index') }}" class="btn">
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
