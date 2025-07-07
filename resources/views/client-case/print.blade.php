<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle ?? 'Cetak Klien' }}</title>

    <style>
        /* Ukuran kertas dan orientasi cetak */
        @page {
            size: A4 landscape;
            margin: 1cm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h1, p {
            text-align: center;
            margin: 0;
        }

        p {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 6px;
            text-align: left;
        }

        /* Hindari memotong tabel saat cetak */
        tr {
            page-break-inside: avoid;
        }
    </style>
</head>
<body onload="window.print()">

    <h1>{{ $pageTitle ?? 'Cetak Klien' }}</h1>
    <p>{{ $pageDescription ?? 'Halaman ini digunakan untuk mencetak data klien.' }}</p>

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
            </tr>
        </thead>
        <tbody>
        @forelse($datas as $key => $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->judul_kasus }}</td>
                <td>{{ ucfirst($item->jenis_kasus) }}</td>
                <td>
                    {{ ucfirst($item->status) }}
                </td>
                <td>{{ $item->client->nama ?? '-' }}</td>
                <td>{{ $item->pengacara->name ?? '-' }}</td>
                <td>{{ $item->kepalaAdvokasi->name ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }}</td>
                <td>{{ $item->tanggal_selesai ? \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') : '-' }}</td>
                
            </tr>

        @empty
            <tr>
                <td colspan="10" class="text-center">Tidak ada data kasus</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</body>
</html>
