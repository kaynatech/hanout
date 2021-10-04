<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("designiation" , 1023)->nullable();
            $table->string("codebar")->nullable();
            $table->integer("code")->nullable();
            $table->integer("quantite")->nullable();
            $table->integer("prix_vente1")->nullable();
            $table->integer("prix_vente2")->nullable();
            $table->integer("prix_vente3")->nullable();
            $table->integer("seuil1")->nullable();
            $table->integer("seuil2")->nullable();
            $table->integer("seuil3")->nullable();
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
        Schema::dropIfExists('articles');
    }
}
