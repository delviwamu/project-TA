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

         // user role: staf
        $staf = User::create([
            'name' => 'Mayus Marsel Pigai',
            'username' => 'staf1',
            'email' => 'staf1@mail.com',
            'password' => bcrypt('staf1@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $staf->assignRole('staf');

        // user role: staf
        $staf = User::create([
            'name' => 'Fredi Wamu, S.H',
            'username' => 'staf2',
            'email' => 'staf2@mail.com',
            'password' => bcrypt('staf2@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $staf->assignRole('staf');

        // user role: staf
        $staf = User::create([
            'name' => 'Yabet Lukas Degei, S.H',
            'username' => 'staf3',
            'email' => 'staf3@mail.com',
            'password' => bcrypt('staf3@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $staf->assignRole('staf');

        // user role: staf
        $staf = User::create([
            'name' => 'Reinhard Kmur, S.H',
            'username' => 'staf4',
            'email' => 'staf4@mail.com',
            'password' => bcrypt('staf4@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $staf->assignRole('staf');

        // user role: staf
        $staf = User::create([
            'name' => 'Desi Elsa Mangaprow',
            'username' => 'staf5',
            'email' => 'staf5@mail.com',
            'password' => bcrypt('staf5@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $staf->assignRole('staf');

        // user role: staf
        $staf = User::create([
            'name' => 'Sihan',
            'username' => 'staf6',
            'email' => 'staf6@mail.com',
            'password' => bcrypt('staf6@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $staf->assignRole('staf');

        // user role: staf
        $staf = User::create([
            'name' => 'Novita Opki, S.Par',
            'username' => 'staf7',
            'email' => 'staf7@mail.com',
            'password' => bcrypt('staf7@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $staf->assignRole('staf');

        // user role: staf
        $staf = User::create([
            'name' => 'Imanus Komba, S.H',
            'username' => 'staf8',
            'email' => 'staf8@mail.com',
            'password' => bcrypt('staf8@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $staf->assignRole('staf');

        // user role: staf
        $staf = User::create([
            'name' => 'Novita Waroboy',
            'username' => 'staf9',
            'email' => 'staf9@mail.com',
            'password' => bcrypt('staf9@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $staf->assignRole('staf');

        // user role: pengacara
        $pengacara = User::create([
            'name' => 'Pengacara Hukum',
            'username' => 'pengacara',
            'email' => 'pengacara@mail.com',
            'password' => bcrypt('pengacara@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $pengacara->assignRole('pengacara');

        // user role: pengacara
        $pengacara = User::create([
            'name' => 'Pengacara Hukum 2',
            'username' => 'pengacaraa2',
            'email' => 'pengacaraa2@mail.com',
            'password' => bcrypt('pengacaraa2@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $pengacara->assignRole('pengacara');


        // user role: pengacara
        $pengacara = User::create([
            'name' => 'Emanuel Gobay, S.H M.H',
            'username' => 'pengacara1',
            'email' => 'pengacara1@mail.com',
            'password' => bcrypt('pengacara1@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $pengacara->assignRole('pengacara');

        // user role: pengacara
        $pengacara = User::create([
            'name' => 'Festus Ngoranmelo, Sh',
            'username' => 'pengacara2',
            'email' => 'pengacara2@mail.com',
            'password' => bcrypt('pengacara2@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $pengacara->assignRole('pengacara');

        // user role: pengacara
        $pengacara = User::create([
            'name' => 'Arpi Asso, S.H',
            'username' => 'pengacara3',
            'email' => 'pengacara3@mail.com',
            'password' => bcrypt('pengacara3@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $pengacara->assignRole('pengacara');

        // user role: pengacara
        $pengacara = User::create([
            'name' => 'Rosdiana Basorante, S.H M.H',
            'username' => 'pengacara4',
            'email' => 'pengacara4@mail.com',
            'password' => bcrypt('pengacara4@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $pengacara->assignRole('pengacara');

        // user role: pengacara
        $pengacara = User::create([
            'name' => 'Yustina Haluk, S.H',
            'username' => 'pengacara5',
            'email' => 'pengacara5@mail.com',
            'password' => bcrypt('pengacara5@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $pengacara->assignRole('pengacara');

        // user role: pengacara
        $pengacara = User::create([
            'name' => 'Gilbert Sefnat Romaimsi, S. H M.H',
            'username' => 'pengacara6',
            'email' => 'pengacara6@mail.com',
            'password' => bcrypt('pengacara6@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $pengacara->assignRole('pengacara');

        // user role: pengacara
        $pengacara = User::create([
            'name' => 'Aris Fernando Howay, S.H',
            'username' => 'pengacara7',
            'email' => 'pengacara7@mail.com',
            'password' => bcrypt('pengacara7@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $pengacara->assignRole('pengacara');




        // user role: kepala_advokasi
        $kepalaAdvokasi = User::create([
            'name' => 'Kepala Bidang Advokasi',
            'username' => 'advokasi',
            'email' => 'advokasi@mail.com',
            'password' => bcrypt('advokasi@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $kepalaAdvokasi->assignRole('advokasi');

        // user role: lbh
        $kepalaLBH = User::create([
            'name' => 'Direktur LBH',
            'username' => 'lbh',
            'email' => 'lbh@mail.com',
            'password' => bcrypt('lbh@mail.com'),
            'avatar' => 'assets/img/avatars/avatar-1-men.jpeg',
        ]);
        $kepalaLBH->assignRole('lbh');


    }


}
