<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('keranjangs', function (Blueprint $table) {
            $table->dateTime('created_at')->default(null)->change();
        });

        DB::statement("UPDATE keranjangs SET created_at = DATE_FORMAT(created_at, '%Y-%m-%d %H:%i')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keranjangs', function (Blueprint $table) {
            $table->timestamp('created_at')->default(null)->change();
        });
    }
};
