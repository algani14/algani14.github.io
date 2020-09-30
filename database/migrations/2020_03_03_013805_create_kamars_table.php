<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_kamar')->unique();
            $table->string('nama_kamar');
            $table->unsignedBigInteger('type_kamar');
            $table->foreign('type_kamar')->references('id')->on('type_kamars')->onDelete('cascade');
    
            $table->double('harga_kamar');
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
        Schema::dropIfExists('kamars');
    }
}
