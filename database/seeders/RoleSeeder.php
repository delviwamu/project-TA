<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
            'desc' => 'Akun utama sebagai pengelola sistem secara keseluruhan termasuk mengelola data dasar dan data anggota.',
        ]);

        Role::create([
            'name' => 'staf',
            'guard_name' => 'web',
            'desc' => 'Akun staf yang bertugas melakukan input data dan membantu operasional harian di sistem.',
        ]);

        Role::create([
            'name' => 'pengacara',
            'guard_name' => 'web',
            'desc' => 'Akun untuk pengacara yang menangani kasus hukum dan memiliki akses terhadap data advokasi.',
        ]);

        Role::create([
            'name' => 'advokasi',
            'guard_name' => 'web',
            'desc' => 'Akun pimpinan bagian advokasi yang mengelola dan mengawasi seluruh proses advokasi hukum.',
        ]);

        Role::create([
            'name' => 'lbh',
            'guard_name' => 'web',
            'desc' => 'Akun pimpinan Lembaga Bantuan Hukum (LBH) yang bertanggung jawab atas manajemen dan pengambilan keputusan strategis.',
        ]);

        
    }
}
