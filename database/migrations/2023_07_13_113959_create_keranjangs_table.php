<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangsTable extends Migration
{
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->increments('id');
            // Tambahkan kolom lain yang diperlukan
            $table->string('nama');
            $table->decimal('harga', 10, 2);
            $table->integer('jumlah');
            $table->decimal('total', 10, 2);
            $table->integer('no_meja');
            $table->decimal('total_keseluruhan', 8, 2);
            // Kolom dan atribut lainnya
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('keranjangs');
    }
};
