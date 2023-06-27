<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => 'staff',
            'email' => 'staff@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 3,
            'remember_token' => 'ijRXaXVQBY'
        ]);

        Role::create([
            'role_name' => 'sekre',
        ]);

        Role::create([
            'role_name' => 'kadin',
        ]);

        Role::create([
            'role_name' => 'staff',
        ]);

        Role::create([
            'role_name' => 'bend',
        ]);

        User::factory(4)->create();

        Pegawai::create([
            'nama_pegawai' => 'Pegawai Satu',
            'nip' => '1111111111',
            'jabatan' => 'Bendahara',
            'pangkat' => 'Tingkat I',
            'golongan' => 'i',
        ]);
        Pegawai::create([
            'nama_pegawai' => 'Pegawai Dua',
            'nip' => '2222222222',
            'jabatan' => 'Sekretaris',
            'pangkat' => 'Tingkat II',
            'golongan' => 'ii',
        ]);
        Pegawai::create([
            'nama_pegawai' => 'Pegawai Tiga',
            'nip' => '3333333333',
            'jabatan' => 'Pengawal',
            'pangkat' => 'Tingkat III',
            'golongan' => 'iii',
        ]);

        Pegawai::create([
            'nama_pegawai' => 'Pegawai Empat',
            'nip' => '4444444444',
            'jabatan' => 'Ketua',
            'pangkat' => 'Tingkat IV',
            'golongan' => 'iv',
        ]);

        $path = public_path('sql/sql.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
