<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['status' => 'Waiting'],
            ['status' => 'ACC'],
            ['status' => 'Cancel'],
            ['status' => 'Done']
        ];

        DB::table('status')->insert($status);
    }
}
