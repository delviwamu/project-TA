<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use Carbon\Carbon;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $datas = [
            [
                'nama' => 'Maria Yuliana',
                'nik' => '9876543210000001',
                'alamat' => 'Jl. Merdeka No. 45, Jayapura',
                'no_hp' => '081234567891',
                'tanggal_input' => Carbon::now()->toDateString(),
                'created_by' => 1,
            ],
            [
                'nama' => 'Robert Wanggai',
                'nik' => '9876543210000002',
                'alamat' => 'Jl. Yos Sudarso No. 12, Abepura',
                'no_hp' => '081234567892',
                'tanggal_input' => Carbon::now()->toDateString(),
                'created_by' => 1,
            ],
            [
                'nama' => 'Elisabet Ayorbaba',
                'nik' => '9876543210000003',
                'alamat' => 'Kampung Harapan, Sentani',
                'no_hp' => '081234567893',
                'tanggal_input' => Carbon::now()->toDateString(),
                'created_by' => 1,
            ],
            [
                'nama' => 'Markus Yikwa',
                'nik' => '9876543210000004',
                'alamat' => 'Jl. Raya Waena, Heram',
                'no_hp' => '081234567894',
                'tanggal_input' => Carbon::now()->toDateString(),
                'created_by' => 1,
            ],
            [
                'nama' => 'Fransiska Kayame',
                'nik' => '9876543210000005',
                'alamat' => 'Jl. Baru No. 8, Arso',
                'no_hp' => '081234567895',
                'tanggal_input' => Carbon::now()->toDateString(),
                'created_by' => 1,
            ],
            [
                'nama' => 'Andreas Saroy',
                'nik' => '9876543210000006',
                'alamat' => 'Kompleks BTN Skyline, Jayapura',
                'no_hp' => '081234567896',
                'tanggal_input' => Carbon::now()->toDateString(),
                'created_by' => 1,
            ],
            [
                'nama' => 'Yohana Tabuni',
                'nik' => '9876543210000007',
                'alamat' => 'Jl. Cendrawasih No. 17, Wamena',
                'no_hp' => '081234567897',
                'tanggal_input' => Carbon::now()->toDateString(),
                'created_by' => 1,
            ],
            [
                'nama' => 'Donatus Mote',
                'nik' => '9876543210000008',
                'alamat' => 'Jl. Trans Papua, Dekai',
                'no_hp' => '081234567898',
                'tanggal_input' => Carbon::now()->toDateString(),
                'created_by' => 1,
            ],
            [
                'nama' => 'Siska Wetipo',
                'nik' => '9876543210000009',
                'alamat' => 'Perumnas IV, Abepura',
                'no_hp' => '081234567899',
                'tanggal_input' => Carbon::now()->toDateString(),
                'created_by' => 1,
            ],
            [
                'nama' => 'Melkias Kossay',
                'nik' => '9876543210000010',
                'alamat' => 'Jl. Irian, Nabire',
                'no_hp' => '081234567900',
                'tanggal_input' => Carbon::now()->toDateString(),
                'created_by' => 1,
            ],
        ];

        foreach ($datas as $data) {
            Client::create($data);
        }
    }
}
