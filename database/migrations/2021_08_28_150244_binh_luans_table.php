<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BinhLuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('binh_luan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('san_pham_id');
            $table->integer('nguon_binh_luan');
            $table->text('noi_dung');
            $table->date('ngay_gui');   
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
        Schema::dropIfExists('binh_luan');
    }
}
