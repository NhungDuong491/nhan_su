<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'email' => 'qtv@admin.admin',
            'password' => md5('12345678'),
            'chuc_vu_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'email' => 'banhang_1@gmail.com',
            'password' => md5('12345678'),
            'phong_ban_id' => 4,
            'chuc_vu_id' => 5,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'email' => 'taichinh_1@gmail.com',
            'password' => md5('12345678'),
            'phong_ban_id' => 1,
            'chuc_vu_id' => 4,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'email' => 'kho_1@gmail.com',
            'password' => md5('12345678'),
            'phong_ban_id' => 3,
            'chuc_vu_id' => 5,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'email' => 'qhkh_1@gmail.com',
            'password' => md5('12345678'),
            'phong_ban_id' => 5,
            'chuc_vu_id' => 5,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'email' => 'khachhang_1@gmail.com',
            'password' => md5('12345678'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
