@extends('layouts.app')

@section('additionalHeadScripts')
    <!-- ApexChart JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <x-alert />

                                        <a href="{{ route('client.print') }}" target="_blank" class="btn">
                                            <i class="fas fa-print me-2"></i>
                                            Cetak Laporan Semua Data Klien
                                        </a>

                                    <!-- toolbar -->
                                    <x-toolbar 
                                    :btnCreate="route('client.create')"
                                    :formAction="Request::segment(3) == 'trash' 
                                        ? route('client.trash') 
                                        : route('client.index')"
                                    />


                                    <!-- table-responsieve start -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Lengkap</th>
                                                <th>NIK</th>
                                                <th>Alamat</th>
                                                <th>Nomor HP</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Input</th>
                                                <th>Opsi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($datas as $key => $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{!! $item->nama !!}</td>
                                                <td>{!! $item->nik ?? '' !!}</td>
                                                <td>{!! $item->alamat ?? '' !!}</td>
                                                <td>{!! $item->no_hp ?? '' !!}</td>
                                                <td>{{ $item->tempat_lahir ? $item->tempat_lahir . ',' : '' }} {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                                                <td>{!! $item->jenis_kelamin ?? '' !!}</td>
                                                <td>{!! $item->tanggal_input ?? '' !!}</td>
                                                <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ auth()->user()->hasRole('admin') ? route('client.show', $item->id) : route('client.show', $item->id) }}" class="btn btn-sm btn-dark text-primary d-flex align-items-center gap-2" title="Detail">
                                                        <i class="fa fa-eye"></i> Detail
                                                    </a>

                                                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('advokasi'))
                                                    <a href="{{ route('client.edit', $item->id) }}" class="btn btn-sm text-muted" title="Ubah">
                                                        <i class="fa fa-edit"></i> 
                                                    </a>

                                                    <!-- Tombol Hapus -->
                                                    <a href="#" class="btn btn-sm text-muted" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $item->id }}" title="Hapus Permanen">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    @endif

                                                </div>
                                                </td>
                                            </tr>

                                            <x-force-delete-modal 
                                                :id="$item->id" 
                                                :nama="$item->nama" 
                                                :route="route('client.forceDelete', $item->id)" 
                                            />

                                            @empty 
                                            <p>Tidak ada data</p>
                                            @endforelse
                                            </tbody>
                                        </table>

                                    <div>
                                        {{ $datas->links('pagination::bootstrap-5') }}
                                    </div>

                                    </div>
                                    <!-- table-responsieve end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .row end -->

                </div>

            </div>
            <!-- end page-inner -->
        </div>
        <!-- end container -->

@stop

@push('scripts')



@endpush
