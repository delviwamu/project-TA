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

    <table>
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
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $key => $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{!! $item->nama !!}</td>
                <td>{!! $item->nik ?? '' !!}</td>
                <td>{!! $item->alamat ?? '' !!}</td>
                <td>{!! $item->no_hp ?? '' !!}</td>
                <td>{{ $item->tempat_lahir ? $item->tempat_lahir . ',' : '' }} {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{!! $item->jenis_kelamin ?? '' !!}</td>
                <td>{!! $item->tanggal_input ?? '' !!}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center;">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
