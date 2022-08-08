<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MarketingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('marketing', function (Blueprint $table) {
            $table->id();
            $table->integer('nguoi_tao');
            $table->integer('nguoi_phu_trach');
            $table->text('ten');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');   
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
        Schema::dropIfExists('marketing');
    }
}
