<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NhanViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('diem_ban_id')->nullable();
            $table->string('ma_nv')->nullable();
            $table->string('ten');
            $table->text('anh')->nullable();
            $table->integer('gioi_tinh')->default(1);
            $table->date('ngay_sinh');
            $table->text('dia_chi');
            $table->text('sdt');
            $table->text('cccd');
            $table->text('trang_thai')->nullable();
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
        Schema::dropIfExists('nhan_vien');
    }
}
