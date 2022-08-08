<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiTietHoaDonXuatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ct_hoa_don_xuat', function (Blueprint $table) {
            $table->id();
            $table->integer('hoa_don_xuat_id');
            $table->integer('san_pham_diem_ban_id')->nullable();
            $table->bigInteger('so_luong')->default(0);
            $table->decimal('gia',20,2)->default(0);
            $table->decimal('khuyen_mai',20,2)->nullable()->default(0);
            $table->decimal('thanh_tien',20,2)->default(0);
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
        Schema::dropIfExists('ct_hoa_don_xuat');
    }
}
