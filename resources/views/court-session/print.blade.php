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

    <h1>{{ $pageTitle ?? 'Cetak Sidang' }}</h1>
    <p>{{ $pageDescription ?? 'Halaman ini digunakan untuk mencetak data sidang.' }}</p>

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
                </tr>

            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data sidang</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
