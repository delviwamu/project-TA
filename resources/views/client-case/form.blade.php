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

                            <form action="{{ isset($data) ? route('clientCase.update', $data->id) : route('clientCase.store') }}" method="POST">
                                @csrf
                                @if(isset($data))
                                    @method('PUT')
                                @endif

                                <!-- Client -->
                                <div class="form-group">
                                    <label for="client_id">Pilih Klien</label>
                                    <select class="form-control @error('client_id') is-invalid @enderror" name="client_id" id="client_id">
                                        <option value="">-- Pilih Klien --</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}" {{ old('client_id', $data->client_id ?? '') == $client->id ? 'selected' : '' }}>
                                                {{ $client->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Judul Kasus -->
                                <div class="form-group">
                                    <label for="judul_kasus">Judul Kasus</label>
                                    <input type="text" name="judul_kasus" id="judul_kasus" class="form-control @error('judul_kasus') is-invalid @enderror"
                                        value="{{ old('judul_kasus', $data->judul_kasus ?? '') }}" placeholder="Masukkan judul kasus">
                                    @error('judul_kasus')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jenis Kasus -->
                                <div class="form-group">
                                    <label for="jenis_kasus">Jenis Kasus</label>
                                    <select class="form-control @error('jenis_kasus') is-invalid @enderror" name="jenis_kasus" id="jenis_kasus">
                                        <option value="">-- Pilih Jenis --</option>
                                        @foreach(['pidana', 'perdata', 'keluarga', 'lainnya'] as $jenis)
                                            <option value="{{ $jenis }}" {{ old('jenis_kasus', $data->jenis_kasus ?? '') == $jenis ? 'selected' : '' }}>
                                                {{ ucfirst($jenis) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jenis_kasus')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kronologi -->
                                <div class="form-group">
                                    <label for="kronologi">Kronologi</label>
                                    <textarea name="kronologi" id="kronologi" rows="4" class="form-control @error('kronologi') is-invalid @enderror"
                                            placeholder="Masukkan kronologi kejadian">{{ old('kronologi', $data->kronologi ?? '') }}</textarea>
                                    @error('kronologi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                        @foreach(['baru', 'berjalan', 'selesai', 'ditolak'] as $status)
                                            <option value="{{ $status }}" {{ old('status', $data->status ?? 'baru') == $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pengacara -->
                                <div class="form-group">
                                    <label for="pengacara_id">Pengacara</label>
                                    <select class="form-control @error('pengacara_id') is-invalid @enderror" name="pengacara_id" id="pengacara_id">
                                        <option value="">-- Pilih Pengacara --</option>
                                        @foreach($dataPengacara as $pengacara)
                                            <option value="{{ $pengacara->id }}" {{ old('pengacara_id', $data->pengacara_id ?? '') == $pengacara->id ? 'selected' : '' }}>
                                                {{ $pengacara->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pengacara_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kepala Advokasi -->
                                <div class="form-group">
                                    <label for="kepala_advokasi_id">Kepala Advokasi</label>
                                    <select class="form-control @error('kepala_advokasi_id') is-invalid @enderror" name="kepala_advokasi_id" id="kepala_advokasi_id">
                                        <option value="">-- Pilih Kepala Advokasi --</option>
                                        @foreach($dataKepalaAdvokasi as $kepalaAdvokasi)
                                            <option value="{{ $kepalaAdvokasi->id }}" {{ old('kepala_advokasi_id', $data->kepala_advokasi_id ?? '') == $kepalaAdvokasi->id ? 'selected' : '' }}>
                                                {{ $kepalaAdvokasi->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kepala_advokasi_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal Mulai -->
                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                        value="{{ old('tanggal_mulai', $data->tanggal_mulai ?? now()->toDateString()) }}">
                                    @error('tanggal_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal Selesai -->
                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                        value="{{ old('tanggal_selesai', $data->tanggal_selesai ?? '') }}">
                                    @error('tanggal_selesai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-dark text-primary">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                    @if(isset($data))
                                    <a href="{{ route('clientCase.show', $data->id) }}" class="btn text-muted">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                    @endif
                                    <a href="{{ route('clientCase.index') }}" class="btn text-muted">
                                        <i class="fa fa-times-circle"></i> Keluar
                                    </a>
                                </div>
                            </form>



                            @if(isset($data->id))
                                <x-force-delete-modal 
                                    :id="$data->id" 
                                    :nama="$data->nama" 
                                    :route="route('client.forceDelete', $data->id)" 
                                />
                            @endif

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
