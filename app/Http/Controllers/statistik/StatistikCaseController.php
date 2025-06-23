<?php

namespace App\Http\Controllers\statistik;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// models
use App\Models\ClientCase;

class StatistikCaseController extends Controller
{
      
    // index
    public function index()
    {
        $pageTitle = 'Statistik Kasus';
        $pageDescription = 'Rekapan statistik kasus yang sudah ditambahkan. Menampilkan grafik jumlah kasus berdasarkan bulan di tahun ini.';

        return view('statistik.clientCase.index', compact(
            'pageTitle',
            'pageDescription',
        ));
    }

    // statistik case berdasarkan bulan di tahun ini
    public function statistikCaseBerdasarkanBulan()
    {
        $tahun = date('Y');
        $bulan = date('m');

        // ambil data kasus berdasarkan bulan dan tahun
        $dataCase = ClientCase::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->whereYear('created_at', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // inisialisasi array untuk menyimpan data
        $statistikCase = [];
        for ($i = 1; $i <= 12; $i++) {
            $statistikCase[$i] = 0; // set default value
        }

        // isi data statistik kasus
        foreach ($dataCase as $data) {
            $statistikCase[$data->bulan] = $data->total;
        }

        return response()->json($statistikCase);
    }

    // // statistik client berdasarkan bulan di tahun ini
    // public function statistikClientBerdasarkanBulan()
    // {
    //     $tahun = date('Y');
    //     $bulan = date('m');

    //     // ambil data client berdasarkan bulan dan tahun
    //     $dataClient = Client::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
    //         ->whereYear('created_at', $tahun)
    //         ->groupBy('bulan')
    //         ->orderBy('bulan')
    //         ->get();

    //     // inisialisasi array untuk menyimpan data
    //     $statistikClient = [];
    //     for ($i = 1; $i <= 12; $i++) {
    //         $statistikClient[$i] = 0; // set default value
    //     }

    //     // isi data statistik client
    //     foreach ($dataClient as $data) {
    //         $statistikClient[$data->bulan] = $data->total;
    //     }

    //     return response()->json($statistikClient);
    // }


}
