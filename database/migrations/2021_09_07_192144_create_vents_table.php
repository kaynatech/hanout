<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vents', function (Blueprint $table) {
            $table->id();
            $table->integer("prix_vente");
            $table->integer("quantite");
            $table->integer("total");
            $table->integer("gain");
            $table->foreignId('article_id')->constrained()->nullable();
            $table->foreignId('user_id')->constrained()->nullable();
            $table->foreignId('facture_vente_id')->constrained()->nullable();
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
        Schema::dropIfExists('vents');
    }
}
