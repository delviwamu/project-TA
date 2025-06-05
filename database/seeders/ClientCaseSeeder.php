<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClientCase;
use Carbon\Carbon;

class ClientCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data client_case
        $datas = [
            [
                'client_id' => 1,
                'judul_kasus' => 'Kasus Pencurian Barang',
                'jenis_kasus' => 'pidana',
                'kronologi' => 'Kronologi kasus pencurian barang di pasar tradisional...',
                'status' => 'berjalan',
                'pengacara_id' => 2,
                'kepala_advokasi_id' => 5,
                'tanggal_mulai' => Carbon::now()->subDays(10)->format('Y-m-d'),
                'tanggal_selesai' => null,
            ],
            [
                'client_id' => 2,
                'judul_kasus' => 'Sengketa Warisan Keluarga',
                'jenis_kasus' => 'perdata',
                'kronologi' => 'Sengketa warisan antar saudara yang berujung ke pengadilan...',
                'status' => 'baru',
                'pengacara_id' => 4,
                'kepala_advokasi_id' => 5,
                'tanggal_mulai' => Carbon::now()->format('Y-m-d'),
                'tanggal_selesai' => null,
            ],
            [
                'client_id' => 3,
                'judul_kasus' => 'Perceraian dan Hak Asuh Anak',
                'jenis_kasus' => 'keluarga',
                'kronologi' => 'Perceraian dengan sengketa hak asuh anak di pengadilan agama...',
                'status' => 'selesai',
                'pengacara_id' => 2,
                'kepala_advokasi_id' => 5,
                'tanggal_mulai' => Carbon::now()->subMonths(2)->format('Y-m-d'),
                'tanggal_selesai' => Carbon::now()->subMonth()->format('Y-m-d'),
            ],
            [
                'client_id' => 4,
                'judul_kasus' => 'Kasus Penipuan Online',
                'jenis_kasus' => 'pidana',
                'kronologi' => 'Korban mengalami penipuan pembelian barang secara online...',
                'status' => 'berjalan',
                'pengacara_id' => 4,
                'kepala_advokasi_id' => 5,
                'tanggal_mulai' => Carbon::now()->subWeeks(3)->format('Y-m-d'),
                'tanggal_selesai' => null,
            ],
            [
                'client_id' => 5,
                'judul_kasus' => 'Lainnya - Perselisihan Kontrak Kerja',
                'jenis_kasus' => 'lainnya',
                'kronologi' => 'Perselisihan terkait kontrak kerja dan PHK sepihak...',
                'status' => 'ditolak',
                'pengacara_id' => 5,
                'kepala_advokasi_id' => 5,
                'tanggal_mulai' => Carbon::now()->subMonths(1)->format('Y-m-d'),
                'tanggal_selesai' => null,
            ],
        ];

        foreach ($datas as $data) {
            ClientCase::create($data);
        }
    }
}
