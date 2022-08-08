<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiTietHoaDonNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ct_hoa_don_nhap', function (Blueprint $table) {
            $table->id();
            $table->integer('hoa_don_nhap_id');
            $table->integer('nha_cung_cap_id')->nullable();
            $table->integer('san_pham_id')->nullable();
            $table->bigInteger('so_luong')->default(0);
            $table->decimal('gia',20,2)->default(0);
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
        Schema::dropIfExists('ct_hoa_don_nhap');
    }
}
