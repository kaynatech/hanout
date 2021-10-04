<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_achats', function (Blueprint $table) {
            $table->id();
            $table->integer('total')->nullable();
            $table->integer('valide')->default(0);
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('fournisseur_id')->nullable()->constrained();
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
        Schema::dropIfExists('facture_achats');
    }
}
