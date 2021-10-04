<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationCaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verification_caises', function (Blueprint $table) {
            $table->id();
            $table->integer('a5')->default(0);
            $table->integer('a10')->default(0);
            $table->integer('a20')->default(0);
            $table->integer('a50')->default(0);
            $table->integer('a100')->default(0);
            $table->integer('a200')->default(0);
            $table->integer('a500')->default(0);
            $table->integer('a1000')->default(0);
            $table->integer('a2000')->default(0);
            $table->integer('total')->default(0);
            $table->integer('decalage');
            $table->integer('caise_reel');
            $table->foreignId('caise')->nullable()->constrained();
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
        Schema::dropIfExists('verification_caises');
    }
}
