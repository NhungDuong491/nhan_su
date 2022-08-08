<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PhongBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('phong_ban')->insert([
            'ma_phong_ban' => 'PTC',
            'ten' => 'Phòng tài chình',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('phong_ban')->insert([
            'ma_phong_ban' => 'PNS',
            'ten' => 'Phòng nhân sự',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('phong_ban')->insert([
            'ma_phong_ban' => 'KHO',
            'ten' => 'Kho',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('phong_ban')->insert([
            'ma_phong_ban' => 'BH',
            'ten' => 'Bán hàng',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('phong_ban')->insert([
            'ma_phong_ban' => 'QHKH',
            'ten' => 'Quan hệ khách hàng',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
