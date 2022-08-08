<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KhachHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('ma_kh')->nullable();
            $table->string('ten');
            $table->integer('gioi_tinh')->nullable()->default(1);
            $table->date('ngay_sinh')->nullable();
            $table->text('dia_chi')->nullable();
            $table->text('sdt')->nullable();
            $table->decimal('tich_diem',20,2)->nullable()->default(0);
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
        Schema::dropIfExists('khach_hang');
    }
}
