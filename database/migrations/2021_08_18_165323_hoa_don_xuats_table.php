<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HoaDonXuatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hoa_don_xuat', function (Blueprint $table) {
            $table->id();
            $table->integer('diem_ban_id');
            $table->integer('nhan_vien_id');
            $table->integer('khach_hang_id')->nullable();
            $table->decimal('tong_tien',20,2)->default(0);
            $table->date('ngay_xuat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('hoa_don_xuat');
    }
}
