<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

// models
use App\Models\User;
use App\Models\Client;

class ClientController extends Controller
{
      
    public function index(Request $request)
    {
        $pageTitle = 'Data Klien';
        $pageDescription = 'Menampilkan semua data klien yang sudah ditambahkan.';

        $search = $request->query('search');

        $datas = Client::when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%");
            })
            ->paginate(5)
            ->withQueryString(); // supaya query string search tetap ada saat paginasi

        return view('client.index', compact(
            'pageTitle',
            'pageDescription',
            'datas',
        ));
    }
    
    // create 
    public function create()
    {
        // teks untuk judul dan deskripsi halaman
        $pageTitle = 'Buat Klien Baru';
        $pageDescription = 'Formulir tambah data klien baru.';
    
        return view('client.form', compact(
            'pageTitle',
            'pageDescription',
        ));
    }

    // store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nik' => ['required', 'digits:16', 'unique:clients,nik'],
            'alamat' => 'required|string',
            'no_hp' => ['required', 'string', 'max:15', 'unique:clients,no_hp'],
            'tanggal_input' => 'required|date',
        ], [
            'nama.required' => 'Nama wajib dilengkapi.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'nik.required' => 'NIK wajib dilengkapi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit angka.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'alamat.required' => 'Alamat wajib dilengkapi.',
            'no_hp.required' => 'Nomor HP wajib dilengkapi.',
            'no_hp.max' => 'Nomor HP maksimal 15 karakter.',
            'no_hp.unique' => 'Nomor HP sudah terdaftar.',
            'tanggal_input.required' => 'Tanggal input wajib dilengkapi.',
            'tanggal_input.date' => 'Format tanggal input tidak valid.',
        ]);

        // Tambahkan ID user yang sedang login
        $validated['created_by'] = auth()->id();

        // Simpan ke database
        Client::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('client.index')->with('success', 'Data klien berhasil disimpan.');
    }

    // edit 
    public function edit($id)
    {
        // teks untuk judul dan deskripsi halaman
        $pageTitle = 'Ubah Data Klien';
        $pageDescription = 'Formulir ubah data klien yang sudah ditambahkan.';

        $data = Client::findOrFail($id);
    
        return view('client.form', compact(
            'pageTitle',
            'pageDescription',
            'data',
        ));
    }

    // update
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nik' => ['required', 'digits:16', Rule::unique('clients')->ignore($client->id)],
            'alamat' => 'required|string',
            'no_hp' => ['required', 'string', 'max:15', Rule::unique('clients')->ignore($client->id)],
            'tanggal_input' => 'required|date',
        ], [
            'nama.required' => 'Nama wajib dilengkapi.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'nik.required' => 'NIK wajib dilengkapi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit angka.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'alamat.required' => 'Alamat wajib dilengkapi.',
            'no_hp.required' => 'Nomor HP wajib dilengkapi.',
            'no_hp.max' => 'Nomor HP maksimal 15 karakter.',
            'no_hp.unique' => 'Nomor HP sudah terdaftar.',
            'tanggal_input.required' => 'Tanggal input wajib dilengkapi.',
            'tanggal_input.date' => 'Format tanggal input tidak valid.',
        ]);

        $client->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    // forceDelete
    public function forceDelete($id)
    {
        $data = Client::findOrFail($id);
        $data->forceDelete();

        return redirect()->back()->with('success', 'Data berhasil dihapus permanen.');
    }

}
