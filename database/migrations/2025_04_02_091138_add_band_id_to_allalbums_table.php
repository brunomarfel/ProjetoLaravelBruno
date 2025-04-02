<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBandIdToAllalbumsTable extends Migration
{
    public function up()
    {

        Schema::table('allalbums', function (Blueprint $table) {
            $table->foreignId('band_id')->constrained('allbands')->onDelete('cascade'); // Adiciona a chave estrangeira
        });
    }

    public function down()
    {
        
        Schema::table('allalbums', function (Blueprint $table) {
            $table->dropColumn('band_id');
        });
    }
}
