<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('luong')->insert([
            'chuc_vu_id' => '1',
            'luong_co_ban' => '7000000',
            'luong_thuong' => '1500000',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
       
    }
}
