<?php

namespace App\Http\Controllers\statistik;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// models
use App\Models\CourtSession;

class StatistikCourtController extends Controller
{
      
    // index
    public function index()
    {
        $pageTitle = 'Statistik Sidang';
        $pageDescription = 'Rekapan statistik sidang yang sudah ditambahkan. Menampilkan grafik jumlah sidang berdasarkan bulan di tahun ini.';

        return view('statistik.courtSession.index', compact(
            'pageTitle',
            'pageDescription',
        ));
    }

    // statistik kasus berdasarkan bulan di tahun ini
    public function statistikCourtBerdasarkanBulan()
    {
        $tahun = date('Y');
        $bulan = date('m');

        // ambil data sidang berdasarkan bulan dan tahun
        $dataCourt = CourtSession::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->whereYear('created_at', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // inisialisasi array untuk menyimpan data
        $statistikCourt = [];
        for ($i = 1; $i <= 12; $i++) {
            $statistikCourt[$i] = 0; // set default value
        }

        // isi data statistik sidang
        foreach ($dataCourt as $data) {
            $statistikCourt[$data->bulan] = $data->total;
        }

        return response()->json($statistikCourt);
    }



}
