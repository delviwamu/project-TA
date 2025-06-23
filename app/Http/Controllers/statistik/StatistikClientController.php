<?php

namespace App\Http\Controllers\statistik;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// models
use App\Models\Client;

class StatistikClientController extends Controller
{
      
    // index
    public function index()
    {
        $pageTitle = 'Statistik Klien';
        $pageDescription = 'Rekapan statistik klien yang sudah ditambahkan. Menampilkan grafik jumlah klien berdasarkan bulan di tahun ini.';

        return view('statistik.client.index', compact(
            'pageTitle',
            'pageDescription',
        ));
    }

    // statistik client berdasarkan bulan di tahun ini
    public function statistikClientBerdasarkanBulan()
    {
        $tahun = date('Y');
        $bulan = date('m');

        // ambil data client berdasarkan bulan dan tahun
        $dataClient = Client::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->whereYear('created_at', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // inisialisasi array untuk menyimpan data
        $statistikClient = [];
        for ($i = 1; $i <= 12; $i++) {
            $statistikClient[$i] = 0; // set default value
        }

        // isi data statistik client
        foreach ($dataClient as $data) {
            $statistikClient[$data->bulan] = $data->total;
        }

        return response()->json($statistikClient);
    }


}
