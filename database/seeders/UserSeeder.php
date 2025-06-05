<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{

    /*
    | ==========================================
    | Data Admin Master
    |*/

    public function run(): void
    {

        // user role: admin
        $admin = User::create([
            'name' => 'Admin Master',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $admin->assignRole('admin');

        // user role: staf
        $staf = User::create([
            'name' => 'Staf',
            'username' => 'staf',
            'email' => 'staf@mail.com',
            'password' => bcrypt('staf@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $staf->assignRole('staf');

        // user role: pengacara
        $pengacara = User::create([
            'name' => 'Pengacara Hukum',
            'username' => 'pengacara',
            'email' => 'pengacara@mail.com',
            'password' => bcrypt('pengacara@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-2-woman.jpeg',
        ]);
        $pengacara->assignRole('pengacara');

        // user role: pengacara
        $pengacara = User::create([
            'name' => 'Pengacara Hukum 2',
            'username' => 'pengacara2',
            'email' => 'pengacara2@mail.com',
            'password' => bcrypt('pengacara2@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-2-woman.jpeg',
        ]);
        $pengacara->assignRole('pengacara');

        // user role: kepala_advokasi
        $kepalaAdvokasi = User::create([
            'name' => 'Kepala Bidang Advokasi',
            'username' => 'advokasi',
            'email' => 'advokasi@mail.com',
            'password' => bcrypt('advokasi@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-3-men.jpeg',
        ]);
        $kepalaAdvokasi->assignRole('advokasi');

        // user role: lbh
        $kepalaLBH = User::create([
            'name' => 'Direktur LBH',
            'username' => 'lbh',
            'email' => 'lbh@mail.com',
            'password' => bcrypt('lbh@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-4-woman.jpeg',
        ]);
        $kepalaLBH->assignRole('lbh');


    }


}
