<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SanPhamDiemBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('san_pham_diem_ban', function (Blueprint $table) {
            $table->id();
            $table->integer('diem_ban_id');
            $table->integer('san_pham_id');
            $table->decimal('gia_ban')->default(0);
            $table->bigInteger('so_luong')->default(0);
            $table->bigInteger('da_ban')->default(0);
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
        Schema::dropIfExists('san_pham_diem_ban');
    }
}
