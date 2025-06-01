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

                            <!-- form start -->
                            <form action="{{ isset($data) ? route('client.update', $data->id) : route('client.store') }}" method="POST">
                                @csrf
                                @if(isset($data))
                                    @method('PUT')
                                @endif

                                <!-- Nama -->
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('nama') is-invalid @enderror" 
                                        id="nama" name="nama" placeholder="Masukkan nama lengkap"
                                        value="{{ old('nama', isset($data) ? $data->nama : '') }}"
                                    >
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">Nama wajib diisi.</div>
                                    @enderror
                                </div>

                                <!-- NIK -->
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('nik') is-invalid @enderror" 
                                        id="nik" name="nik" placeholder="Masukkan NIK"
                                        value="{{ old('nik', isset($data) ? $data->nik : '') }}"
                                    >
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">NIK wajib diisi dan harus unik.</div>
                                    @enderror
                                </div>

                                <!-- Alamat -->
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea 
                                        class="form-control @error('alamat') is-invalid @enderror" 
                                        id="alamat" name="alamat" placeholder="Masukkan alamat lengkap"
                                    >{{ old('alamat', isset($data) ? $data->alamat : '') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">Alamat wajib diisi.</div>
                                    @enderror
                                </div>

                                <!-- No HP -->
                                <div class="form-group">
                                    <label for="no_hp">No. HP</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('no_hp') is-invalid @enderror" 
                                        id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx"
                                        value="{{ old('no_hp', isset($data) ? $data->no_hp : '') }}"
                                    >
                                    @error('no_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">No HP wajib diisi.</div>
                                    @enderror
                                </div>

                                <!-- Tanggal Input -->
                                <div class="form-group">
                                    <label for="tanggal_input">Tanggal Input</label>
                                    <input 
                                        type="date" 
                                        class="form-control @error('tanggal_input') is-invalid @enderror" 
                                        id="tanggal_input" name="tanggal_input"
                                        value="{{ old('tanggal_input', isset($data) ? $data->tanggal_input : now()->toDateString()) }}"
                                    >
                                    @error('tanggal_input')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        <div class="invalid-feedback">Tanggal input wajib diisi.</div>
                                    @enderror
                                </div>


                                <hr class="my-4 d-block">

                                <!-- Tombol Submit -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark text-primary" id="submitButton">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>

                                    <!-- Tombol Kembali -->
                                    <a href="{{ route('client.index') }}" class="btn">
                                        <i class="fa fa-times-circle"></i> Tutup 
                                    </a>

                                    @if(Request::segment(2) == 'edit')
                                    <!-- Tombol Hapus Permanen -->
                                    <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $data->id }}" title="Hapus Permanen">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @endif
                                </div>
                            </form>
                            <!-- form end -->


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
