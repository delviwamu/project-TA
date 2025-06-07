<?php

namespace App\Http\Controllers;

use App\Models\CourtSession;
use Illuminate\Http\Request;
use App\Models\ClientCase;
use App\Models\User;
use App\Models\Client;

class CourtSessionController extends Controller
{
    public function index(Request $request)
    {
        $pageTitle = 'Daftar Sidang';
        $pageDescription = 'Menampilkan daftar sidang pengadilan untuk setiap kasus.';

        $search = $request->query('search');

        $datas = CourtSession::with('case.client')
            ->when($search, function ($query, $search) {
                return $query->where('nomor_perkara', 'like', "%{$search}%")
                             ->orWhereHas('case', function ($q) use ($search) {
                                 $q->where('judul_kasus', 'like', "%{$search}%");
                             });
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('court-session.index', compact('pageTitle', 'pageDescription', 'datas'));
    }

    public function create()
    {
        $pageTitle = 'Buat Jadwal Sidang';
        $pageDescription = 'Formulir untuk menambahkan jadwal sidang baru.';

        $clients = Client::all();
        $dataKasus  = ClientCase ::all();
        $dataKepalaAdvokasi = User::role('advokasi')->get();
        $dataPengacara = User::role('pengacara')->get();

        $cases = ClientCase::all();

        return view('court-session.form', compact(
            'pageTitle', 
            'pageDescription', 
            'cases',
            'clients',
            'dataKasus',
            'dataKepalaAdvokasi',
            'dataPengacara',
        ));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'case_id' => 'required|exists:client_cases,id',
            'tanggal_sidang' => 'required|date',
            'lokasi' => 'required|string|max:150',
            'nomor_perkara' => 'required|string|max:100',
            'hasil_sidang' => 'required|string',
            'catatan' => 'nullable|string',
        ], [
            'case_id.required' => 'Kasus wajib dipilih.',
            'case_id.exists' => 'Kasus tidak ditemukan.',
            'tanggal_sidang.required' => 'Tanggal sidang wajib diisi.',
            'tanggal_sidang.date' => 'Format tanggal sidang tidak valid.',
            'lokasi.required' => 'Lokasi sidang wajib diisi.',
            'lokasi.max' => 'Lokasi maksimal 150 karakter.',
            'nomor_perkara.required' => 'Nomor perkara wajib diisi.',
            'nomor_perkara.max' => 'Nomor perkara maksimal 100 karakter.',
            'hasil_sidang.required' => 'Hasil sidang wajib diisi.',
            'catatan.string' => 'Catatan harus berupa teks.',
        ]);

        // Simpan ke database
        CourtSession::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('courtSession.index')->with('success', 'Data sidang berhasil disimpan.');
    }

    public function show($id)
    {
        $pageTitle = 'Detail Sidang';
        $pageDescription = 'Informasi detail sidang pengadilan.';

        $data = CourtSession::with('case.client')->findOrFail($id);
        $dataKasus  = ClientCase ::all();

        return view('court-session.show', compact(
            'pageTitle', 
            'pageDescription', 
            'data', 
            'dataKasus'
        ));
    }

    public function edit($id)
    {
        $pageTitle = 'Ubah Jadwal Sidang';
        $pageDescription = 'Formulir untuk mengubah data sidang.';

        $data = CourtSession::findOrFail($id);
        $dataKasus  = ClientCase ::all();

        return view('court-session.form', compact(
            'pageTitle', 
            'pageDescription', 
            'data', 
            'dataKasus',
        ));
    }

    public function update(Request $request, $id)
    {
        // Cari data berdasarkan ID
        $courtSession = CourtSession::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'case_id' => 'required|exists:client_cases,id',
            'tanggal_sidang' => 'required|date',
            'lokasi' => 'required|string|max:150',
            'nomor_perkara' => 'required|string|max:100',
            'hasil_sidang' => 'required|string',
            'catatan' => 'nullable|string',
        ], [
            'case_id.required' => 'Kasus wajib dipilih.',
            'case_id.exists' => 'Kasus tidak ditemukan.',
            'tanggal_sidang.required' => 'Tanggal sidang wajib diisi.',
            'tanggal_sidang.date' => 'Format tanggal sidang tidak valid.',
            'lokasi.required' => 'Lokasi sidang wajib diisi.',
            'lokasi.max' => 'Lokasi maksimal 150 karakter.',
            'nomor_perkara.required' => 'Nomor perkara wajib diisi.',
            'nomor_perkara.max' => 'Nomor perkara maksimal 100 karakter.',
            'hasil_sidang.required' => 'Hasil sidang wajib diisi.',
            'catatan.string' => 'Catatan harus berupa teks.',
        ]);

        // Update data
        $courtSession->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('courtSession.show', $courtSession->id)->with('success', 'Data sidang berhasil diperbarui.');
    }


    // forceDelete
    public function forceDelete($id)
    {
        $data = CourtSession::findOrFail($id);
        $data->forceDelete();

        return redirect()->back()->with('success', 'Data berhasil dihapus permanen.');
    }
}
