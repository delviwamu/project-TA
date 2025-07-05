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
                                                    <th>Penangungg Jawab Kasus</th>
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
                                                    <td>
                                                        <a href="#" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#statusModal-{{ $item->id }}">
                                                                <span class="badge bg-{{ $item->status == 'selesai' ? 'success' : ($item->status == 'ditolak' ? 'danger' : 'warning') }}">
                                                                    {{ ucfirst($item->status) }}
                                                                </span>
                                                            </a>
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

                                                <div class="modal fade" id="statusModal-{{ $item->id }}" tabindex="-1" aria-labelledby="statusModalLabel-{{ $item->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form method="POST" action="{{ route('clientCase.update.status', $item->id) }}">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="statusModalLabel-{{ $item->id }}">Ubah Status</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Judul Kasus</label>
                                                                        <p>{{ $item->judul_kasus }}</p>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Status</label>
                                                                        <select class="form-select" name="status">
                                                                            <option value="baru" {{ $item->status == 'baru' ? 'selected' : '' }}>Baru</option>
                                                                            <option value="berjalan" {{ $item->status == 'berjalan' ? 'selected' : '' }}>Berjalan</option>
                                                                            <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                                            <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var statusModal = document.getElementById('statusModal');
        statusModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var status = button.getAttribute('data-status');

            document.getElementById('status-id').value = id;
            document.getElementById('status-select').value = status;
        });
    });
</script>

@endpush
