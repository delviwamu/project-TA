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
                                                    <th>Judul Kasus</th>
                                                    <th>Jenis Kasus</th>
                                                    <th>Status</th>
                                                    <th>Nama Klien</th>
                                                    <th>Pengacara</th>
                                                    <th>Kepala Advokasi</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Selesai</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($datas as $key => $item)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $item->judul_kasus }}</td>
                                                    <td>{{ ucfirst($item->jenis_kasus) }}</td>
                                                    <td><span class="badge bg-{{ $item->status == 'selesai' ? 'success' : ($item->status == 'ditolak' ? 'danger' : 'warning') }}">
                                                        {{ ucfirst($item->status) }}</span>
                                                    </td>
                                                    <td>{{ $item->client->nama ?? '-' }}</td>
                                                    <td>{{ $item->pengacara->name ?? '-' }}</td>
                                                    <td>{{ $item->kepalaAdvokasi->name ?? '-' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }}</td>
                                                    <td>{{ $item->tanggal_selesai ? \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') : '-' }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="{{ route('clientCase.show', $item->id) }}" class="btn btn-sm btn-dark text-primary d-flex align-items-center gap-2" title="Detail">
                                                                <i class="fa fa-eye"></i> Detail
                                                            </a>

                                                            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('advokasi'))
                                                                <a href="{{ route('clientCase.edit', $item->id) }}" class="btn btn-sm text-muted" title="Ubah">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>

                                                                <a href="#" class="btn btn-sm text-muted" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $item->id }}" title="Hapus Permanen">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>

                                                {{-- Modal untuk hapus permanen --}}
                                                <x-force-delete-modal 
                                                    :id="$item->id" 
                                                    :nama="$item->judul_kasus" 
                                                    :route="route('clientCase.forceDelete', $item->id)" 
                                                />
                                            @empty
                                                <tr>
                                                    <td colspan="10" class="text-center">Tidak ada data kasus</td>
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
