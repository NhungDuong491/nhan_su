<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhieuXuatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phieu_xuat', function (Blueprint $table) {
            $table->id();
            $table->integer('diem_ban_id');
            $table->integer('nhan_vien_id');
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
        Schema::dropIfExists('phieu_xuat');
    }
}
