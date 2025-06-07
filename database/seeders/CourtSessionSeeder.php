<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\ClientCase;
use App\Models\CourtSession;
use Carbon\Carbon;

class CourtSessionSeeder extends Seeder
{
    public function run(): void
    {
        $datas = [
            [
                'nama' => 'Maria Yuliana',
                'nik' => '9876543210000050',
                'alamat' => 'Jl. Merdeka No. 45, Jayapura',
                'no_hp' => '081234567891',
            ],
            [
                'nama' => 'Andi Kurniawan',
                'nik' => '9876543210000052',
                'alamat' => 'Jl. Ahmad Yani No. 12, Abepura',
                'no_hp' => '082112345678',
            ],
            [
                'nama' => 'Sari Lestari',
                'nik' => '9876543210000053',
                'alamat' => 'Jl. Trikora No. 33, Entrop',
                'no_hp' => '085123456789',
            ],
            [
                'nama' => 'Bambang Sutrisno',
                'nik' => '9876543210000054',
                'alamat' => 'Jl. Percetakan Negara No. 21, Sentani',
                'no_hp' => '087654321123',
            ],
            [
                'nama' => 'Yohana Mote',
                'nik' => '9876543210000055',
                'alamat' => 'Jl. Baru No. 99, Waena',
                'no_hp' => '089876543210',
            ],
        ];

        foreach ($datas as $index => $data) {
            $client = Client::create([
                ...$data,
                'tanggal_input' => Carbon::now()->toDateString(),
                'created_by' => 1,
            ]);

            $case = ClientCase::create([
                'client_id' => $client->id,
                'judul_kasus' => 'Kasus ' . ($index + 1),
                'jenis_kasus' => $index % 2 == 0 ? 'perdata' : 'pidana',
                'status' => 'berjalan',
                'pengacara_id' => 3,
                'kepala_advokasi_id' => 5,
                'tanggal_mulai' => Carbon::now()->subDays(rand(5, 20)),
                'tanggal_selesai' => null,
                'created_by' => 1,
            ]);

            CourtSession::create([
                'case_id' => $case->id,
                'tanggal_sidang' => Carbon::now()->addDays(rand(1, 10)),
                'lokasi' => 'Pengadilan Negeri Jayapura',
                'nomor_perkara' => 'PN-JPR/2025/00' . ($index + 1),
                'hasil_sidang' => 'Sidang ditunda',
                'catatan' => 'Menunggu dokumen tambahan dari pengacara',
            ]);
        }
    }
}
