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

                                    <a href="{{ route('courtSession.print') }}" target="_blank" class="btn">
                                        <i class="fas fa-print me-2"></i>
                                        Cetak Laporan Semua Data Sidang
                                    </a>

                                    <!-- toolbar -->
                                    <x-toolbar 
                                    :btnCreate="route('courtSession.create')"
                                    :formAction="Request::segment(3) == 'trash' 
                                        ? route('courtSession.trash') 
                                        : route('courtSession.index')"
                                    />


                                    <!-- table-responsieve start -->
                                    <div class="table-responsive">
                                        
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nomor Perkara</th>
                                                    <th>Tanggal Sidang</th>
                                                    <th>Judul Kasus</th>
                                                    <th>Nama Klien</th>
                                                    <th>Lokasi</th>
                                                    <th>Hasil Sidang</th>
                                                    <th>Catatan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($datas as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->nomor_perkara }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_sidang)->format('d-m-Y') }}</td>
                                                        <td>{{ $item->case->judul_kasus ?? '-' }}</td>
                                                        <td>{{ $item->case->client->nama ?? '-' }}</td>
                                                        <td>{{ $item->lokasi }}</td>
                                                        <td>{{ $item->hasil_sidang }}</td>
                                                        <td>{{ $item->catatan ?? '-' }}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="{{ route('courtSession.show', $item->id) }}" class="btn btn-sm btn-dark text-primary d-flex align-items-center gap-2" title="Detail">
                                                                    <i class="fa fa-eye"></i> Detail
                                                                </a>

                                                                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('advokasi'))
                                                                    <a href="{{ route('courtSession.edit', $item->id) }}" class="btn btn-sm text-muted" title="Ubah">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>

                                                                    <a href="#" class="btn btn-sm text-muted" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $item->id }}" title="Hapus Permanen">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <x-force-delete-modal 
                                                        :id="$item->id" 
                                                        :nama="$item->nomor_perkara" 
                                                        :route="route('courtSession.forceDelete', $item->id)" 
                                                    />
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center">Tidak ada data sidang</td>
                                                    </tr>
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
