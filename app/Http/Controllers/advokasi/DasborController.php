<?php

namespace App\Http\Controllers\advokasi;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// models
use App\Models\User;
use App\Models\Anggota;
use App\Models\Kampus;
use App\Models\Fakultas;
use App\Models\ProgramStudi;

class DasborController extends Controller
{
      
    // index
    public function index()
    {

        // statistik anggota berdasarkan status
        $anggotaTotal = Anggota::count();
        $anggotaBaru = Anggota::where('status', 'Baru')->count();
        $anggotaPindahMasuk = Anggota::where('status', 'Pindah Masuk')->count();
        $anggotaPindahKeluar = Anggota::where('status', 'Pindah Keluar')->count();
        $anggotaAlumni = Anggota::where('status', 'Alumni')->count();
        $anggotaDraft = Anggota::where('status', 'Draft')->count();
        $anggotaAktif = Anggota::where('is_active', 1)->count();

        $totalKampus = Kampus::count();
        $totalFakultas = Fakultas::count();
        $totalProgramStudi = ProgramStudi::count();



        // teks untuk judul dan deskripsi halaman
        $pageTitle = 'Dasbor Advokasi';
        $pageDescription = 'Halaman utama sistem informasi ketika pengguna berhasil login. Menampilkan berbagai rekapan data hasil pengelolaan pada sistem informasi.';
    
        return view('advokasi.index', compact(
            'pageTitle',
            'pageDescription',
            'anggotaTotal',
            'anggotaBaru',
            'anggotaPindahMasuk',
            'anggotaPindahKeluar',
            'anggotaAktif',
            'anggotaAlumni',
            'anggotaDraft',
            'totalKampus',
            'totalFakultas',
            'totalProgramStudi',
        ));
    }



}
