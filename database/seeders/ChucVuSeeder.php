<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('chuc_vu')->insert([
            'ma_chuc_vu' => 'GD',
            'ten' => 'Giám đốc',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('chuc_vu')->insert([
            'ma_chuc_vu' => 'PGD',
            'ten' => 'Phó giám đốc',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('chuc_vu')->insert([
            'ma_chuc_vu' => 'TP',
            'ten' => 'Trưởng phòng',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('chuc_vu')->insert([
            'ma_chuc_vu' => 'PTP',
            'ten' => 'Phó trưởng phòng',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('chuc_vu')->insert([
            'ma_chuc_vu' => 'QL',
            'ten' => 'Quản lý',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('chuc_vu')->insert([
            'ma_chuc_vu' => 'NV',
            'ten' => 'Nhân viên',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
