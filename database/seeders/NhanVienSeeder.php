<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nhan_vien')->insert([
            'user_id' => 1,
            'ma_nv' => 'QTV',
            'ten' => 'Quản Trị Viên',
            'gioi_tinh' => 1,
            'ngay_sinh' => \Carbon\Carbon::now(),
            'dia_chi' => 'Thanh Xuân, Hà Nội',
            'sdt' => '0888888888',
            'cccd' => '0348888888888',
            'trang_thai' => 'Đang làm việc',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('nhan_vien')->insert([
            'user_id' => 2,
            'diem_ban_id' => 1,
            'ma_nv' => 'QL2',
            'ten' => 'Quản Lý Bán Hàng',
            'gioi_tinh' => 1,
            'ngay_sinh' => \Carbon\Carbon::now(),
            'dia_chi' => 'Đống Đa, Hà Nội',
            'sdt' => '0199999999',
            'cccd' => '0349999999999',
            'trang_thai' => 'Đang làm việc',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('nhan_vien')->insert([
            'user_id' => 3,
            
            'ma_nv' => 'QL3',
            'ten' => 'Trưởng Phòng Tài Chính',
            'gioi_tinh' => 0,
            'ngay_sinh' => \Carbon\Carbon::now(),
            'dia_chi' => 'Ba Đình, Hà Nội',
            'sdt' => '0123666666',
            'cccd' => '0346666666666',
            'trang_thai' => 'Đang làm việc',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('nhan_vien')->insert([
            'user_id' => 4,
            'diem_ban_id' => 1,
            
            'ma_nv' => 'QL4',
            'ten' => 'Quản Lý Kho',
            'gioi_tinh' => 1,
            'ngay_sinh' => \Carbon\Carbon::now(),
            'dia_chi' => 'Thái Bình',
            'sdt' => '0123523423',
            'cccd' => '034345241324',
            'trang_thai' => 'Đang làm việc',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
       
        DB::table('nhan_vien')->insert([
            'user_id' => 5,
            'ma_nv' => 'QL6',
            'ten' => 'Quản Lý Quan Hệ Khách Hàng',
            'gioi_tinh' => 1,
            'ngay_sinh' => \Carbon\Carbon::now(),
            'dia_chi' => 'Thanh Hoá',
            'sdt' => '012345234',
            'cccd' => '032523425234',
            'trang_thai' => 'Đang làm việc',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
       
    }
}
