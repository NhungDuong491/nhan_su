<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('luong', function (Blueprint $table) {
            $table->id();
            $table->integer('chuc_vu_id');
            $table->decimal('luong_co_ban',20,2)->default(0);
            $table->decimal('luong_thuong',20,2)->default(0);
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
        Schema::dropIfExists('luong');
    }
}
