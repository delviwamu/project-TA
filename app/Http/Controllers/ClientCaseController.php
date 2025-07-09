<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ClientCase;
use App\Models\User;
use App\Models\Client;

use Spatie\Permission\Models\Role;

class ClientCaseController extends Controller
{
    public function index(Request $request)
    {
        $pageTitle = 'Data Kasus Klien';
        $pageDescription = 'Menampilkan daftar kasus yang ditangani.';

        $search = $request->query('search');

        $datas = ClientCase::with('client')
            ->when($search, function ($query, $search) {
                return $query->where('judul_kasus', 'like', "%{$search}%");
            })
            ->orderBy('id','desc')
            ->paginate(5)
            ->withQueryString();

        return view('client-case.index', compact(
            'pageTitle',
            'pageDescription',
            'datas',
        ));
    }

    // print
    public function print(Request $request)
    {
        $pageTitle = 'Cetak Data Kasus Klien';
        $pageDescription = 'Cetaj daftar kasus yang ditangani.';

        $search = $request->query('search');

        $datas = ClientCase::with('client')
            ->when($search, function ($query, $search) {
                return $query->where('judul_kasus', 'like', "%{$search}%");
            })
            ->orderBy('id','desc')
            ->paginate(100)
            ->withQueryString();

        return view('client-case.print', compact(
            'pageTitle',
            'pageDescription',
            'datas',
        ));
    }

    public function create()
    {
        $pageTitle = 'Buat Kasus Baru';
        $pageDescription = 'Formulir untuk menambahkan kasus baru.';

        $clients = Client::all();
        $dataKepalaAdvokasi = User::role('advokasi')->get();
        $dataPengacara = User::role('pengacara')->get();

        return view('client-case.form', compact(
            'pageTitle',
            'pageDescription',
            'clients',
            'dataKepalaAdvokasi',
            'dataPengacara',
        ));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'judul_kasus' => 'required|string|max:150',
            'jenis_kasus' => ['required', Rule::in(['pidana', 'perdata', 'keluarga', 'lainnya'])],
            'kronologi' => 'required|string',
            'status' => ['required', Rule::in(['baru', 'berjalan', 'selesai', 'ditolak'])],
            'pengacara_id' => 'required|exists:users,id',
            'kepala_advokasi_id' => 'required|exists:users,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'bukti_kasus' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:5120',
        ]);

        if ($request->hasFile('bukti_kasus')) {
            $file = $request->file('bukti_kasus');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('bukti_kasus', $filename, 'public');

            $validated['bukti_kasus'] = $path;
        }

        ClientCase::create($validated);

        return redirect()->route('clientCase.index')->with('success', 'Kasus berhasil ditambahkan.');
    }


    public function show($id)
    {
        $pageTitle = 'Detail Kasus';
        $pageDescription = 'Informasi detail kasus klien.';

        $data = ClientCase::with('client')->findOrFail($id);

        return view('client-case.show', compact(
            'pageTitle',
            'pageDescription',
            'data',
        ));
    }

    public function edit($id)
    {
        $pageTitle = 'Ubah Data Kasus';
        $pageDescription = 'Formulir ubah data kasus.';

        $data = ClientCase::findOrFail($id);

        $clients = Client::all();
        $dataKepalaAdvokasi = User::role('advokasi')->get();
        $dataPengacara = User::role('pengacara')->get();

        return view('client-case.form', compact(
            'pageTitle',
            'pageDescription',
            'data',
            'clients',
            'dataKepalaAdvokasi',
            'dataPengacara',
        ));
    }

    public function update(Request $request, $id)
    {
        $clientCase = ClientCase::findOrFail($id);

        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'judul_kasus' => 'required|string|max:150',
            'jenis_kasus' => ['required', Rule::in(['pidana', 'perdata', 'keluarga', 'lainnya'])],
            'kronologi' => 'required|string',
            'status' => ['required', Rule::in(['baru', 'berjalan', 'selesai', 'ditolak'])],
            'pengacara_id' => 'required|exists:users,id',
            'kepala_advokasi_id' => 'required|exists:users,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'bukti_kasus' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:5120',
        ]);

        if ($request->hasFile('bukti_kasus')) {
            // Hapus file lama (jika ada)
            if ($clientCase->bukti_kasus && \Storage::disk('public')->exists($clientCase->bukti_kasus)) {
                \Storage::disk('public')->delete($clientCase->bukti_kasus);
            }

            // Simpan file baru
            $file = $request->file('bukti_kasus');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('bukti_kasus', $filename, 'public');

            // Masukkan ke dalam data validasi
            $validated['bukti_kasus'] = $path;
        }

        $clientCase->update($validated);

        return redirect()->route('clientCase.show', $clientCase->id)->with('success', 'Data kasus berhasil diperbarui.');
    }

    // YourController.php
    public function updateStatus(Request $request, $id)
    {
        $clientCase = ClientCase::findOrFail($id);

        $validated = $request->validate([
            'status' => ['required', Rule::in(['baru', 'berjalan', 'selesai', 'ditolak'])],
        ]);

        $updateData = [
            'status' => $validated['status'],
            'tanggal_selesai' => $validated['status'] === 'selesai' ? now() : null,
        ];

        $clientCase->update($updateData);

        return redirect()->back()->with('success', 'Status kasus berhasil diperbarui.');
    }

    // forceDelete
    public function forceDelete($id)
    {
        $data = ClientCase::findOrFail($id);
        $data->forceDelete();

        return redirect()->back()->with('success', 'Data berhasil dihapus permanen.');
    }
}
