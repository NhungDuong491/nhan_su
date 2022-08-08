<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiTietPhieuXuatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ct_phieu_xuat', function (Blueprint $table) {
            $table->id();
            $table->integer('phieu_xuat_id');
            $table->integer('san_pham_id')->nullable();
            $table->bigInteger('so_luong')->default(0);
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
        Schema::dropIfExists('ct_phieu_xuat');
    }
}
