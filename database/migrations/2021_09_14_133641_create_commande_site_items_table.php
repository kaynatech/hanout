<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeSiteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_site_items', function (Blueprint $table) {
            $table->id();
            $table->integer("prix");
            $table->integer("quantity");
            $table->integer("total");
            $table->foreignId('article_id')->nullable()->constrained();
            $table->foreignId('commande_site_id')->nullable()->constrained();
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
        Schema::dropIfExists('commande_site_items');
    }
}
