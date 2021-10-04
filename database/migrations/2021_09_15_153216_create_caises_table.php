<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caises', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('valeur_articles')->default(0);
            $table->integer("valeur")->default(0);
            $table->integer("changement")->default(0);
            $table->foreignId('user_id')->nullable()->constrained();
            $table->unsignedBigInteger('changer_id');
            $table->foreign('changer_id')->references('id')->on('users');
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
        Schema::dropIfExists('caises');
    }
}
