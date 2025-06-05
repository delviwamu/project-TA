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
            ->paginate(5)
            ->withQueryString();

        return view('client-case.index', compact(
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
        // $kepalaAdvokasis = User::all(); // filter jika perlu

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
        ]);

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
        $pengacaras = User::all();
        $kepalaAdvokasis = User::all();

        return view('client-case.form', compact(
            'pageTitle',
            'pageDescription',
            'data',
            'clients',
            'pengacaras',
            'kepalaAdvokasis',
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
        ]);

        $clientCase->update($validated);

        return redirect()->back()->with('success', 'Data kasus berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $clientCase = ClientCase::findOrFail($id);
        $clientCase->delete();

        return redirect()->back()->with('success', 'Data kasus berhasil dihapus.');
    }
}
