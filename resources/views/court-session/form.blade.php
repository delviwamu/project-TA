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

                            <form action="{{ isset($data) ? route('courtSession.update', $data->id) : route('courtSession.store') }}" method="POST">
                                @csrf
                                @if(isset($data))
                                    @method('PUT')
                                @endif

                                <!-- Pilih Kasus -->
                                <div class="form-group">
                                    <label for="case_id">Pilih Kasus</label>
                                    <select class="form-control @error('case_id') is-invalid @enderror" name="case_id" id="case_id">
                                        <option value="">-- Pilih Kasus --</option>
                                        @foreach($dataKasus as $kasus)
                                            <option value="{{ $kasus->id }}" {{ old('case_id', $data->case_id ?? '') == $kasus->id ? 'selected' : '' }}>
                                                {{ $kasus->judul_kasus }} - {{ $kasus->client->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('case_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal Sidang -->
                                <div class="form-group">
                                    <label for="tanggal_sidang">Tanggal Sidang</label>
                                    <input type="date" name="tanggal_sidang" id="tanggal_sidang" class="form-control @error('tanggal_sidang') is-invalid @enderror"
                                        value="{{ old('tanggal_sidang', $data->tanggal_sidang ?? now()->toDateString()) }}">
                                    @error('tanggal_sidang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Lokasi -->
                                <div class="form-group">
                                    <label for="lokasi">Lokasi Sidang</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control @error('lokasi') is-invalid @enderror"
                                        value="{{ old('lokasi', $data->lokasi ?? '') }}" placeholder="Masukkan lokasi sidang">
                                    @error('lokasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nomor Perkara -->
                                <div class="form-group">
                                    <label for="nomor_perkara">Nomor Perkara</label>
                                    <input type="text" name="nomor_perkara" id="nomor_perkara" class="form-control @error('nomor_perkara') is-invalid @enderror"
                                        value="{{ old('nomor_perkara', $data->nomor_perkara ?? '') }}" placeholder="Masukkan nomor perkara">
                                    @error('nomor_perkara')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Hasil Sidang -->
                                <div class="form-group">
                                    <label for="hasil_sidang">Hasil Sidang</label>
                                    <textarea name="hasil_sidang" id="hasil_sidang" rows="4" class="form-control @error('hasil_sidang') is-invalid @enderror"
                                        placeholder="Masukkan hasil sidang">{{ old('hasil_sidang', $data->hasil_sidang ?? '') }}</textarea>
                                    @error('hasil_sidang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Catatan (opsional) -->
                                <div class="form-group">
                                    <label for="catatan">Catatan Tambahan</label>
                                    <textarea name="catatan" id="catatan" rows="3" class="form-control @error('catatan') is-invalid @enderror"
                                        placeholder="Masukkan catatan jika ada">{{ old('catatan', $data->catatan ?? '') }}</textarea>
                                    @error('catatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-dark text-primary">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                    @if(isset($data))
                                        <a href="{{ route('courtSession.show', $data->id) }}" class="btn text-muted">
                                            <i class="fa fa-eye"></i> Detail
                                        </a>
                                    @endif
                                    <a href="{{ route('courtSession.index') }}" class="btn text-muted">
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
