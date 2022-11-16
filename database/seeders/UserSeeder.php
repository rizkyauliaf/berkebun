<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'pengunjung',
            'tempat_lahir' => 'California',
            'tanggal_lahir' => '1999-01-01',
            'jenis_kelamin' => 'L',
            'no_hp' => '08237394738474',
            'alamat' => 'Pinggir Jalan Besar, Kota Malang',
            'email' => 'pengunjung@gmail.com',
            'password' => Hash::make('passwordpengunjung'),
            'role' => 'pengunjung',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'petugas',
            'tempat_lahir' => 'California',
            'tanggal_lahir' => '1999-01-01',
            'jenis_kelamin' => 'P',
            'no_hp' => '08237394738474',
            'alamat' => 'Pinggir Jalan Besar, Kota Malang',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('passwordpetugas'),
            'role' => 'petugas',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'tempat_lahir' => 'California',
            'tanggal_lahir' => '1999-01-01',
            'jenis_kelamin' => 'P',
            'no_hp' => '08237394738474',
            'alamat' => 'Pinggir Jalan Besar, Kota Malang',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('passwordadmin'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
