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


        // teks untuk judul dan deskripsi halaman
        $pageTitle = 'Dasbor Advokasi';
        $pageDescription = 'Halaman utama sistem informasi ketika pengguna berhasil login. Menampilkan berbagai rekapan data hasil pengelolaan pada sistem informasi.';
    
        return view('advokasi.index', compact(
            'pageTitle',
            'pageDescription',
        ));
    }



}
