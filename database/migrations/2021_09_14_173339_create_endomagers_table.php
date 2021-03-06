<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndomagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endomagers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->integer('quantite');
            $table->integer('etat');
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
        Schema::dropIfExists('endomagers');
    }
}
