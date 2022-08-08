<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->integer('loai_san_pham_id');
            $table->integer('nha_cung_cap_id');
            $table->string('ten');
            $table->string('ten_khong_dau')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->string('hinh_anh_driver')->nullable();
            $table->decimal('gia_nhap',20,2)->default(0);
            $table->bigInteger('so_luong')->default(0);
            $table->string('don_vi_tinh')->nullable();
            $table->date('nsx')->nullable();
            $table->date('hsd')->nullable();
            $table->string('trang_thai')->nullable();
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
        Schema::dropIfExists('san_pham');
    }
}
