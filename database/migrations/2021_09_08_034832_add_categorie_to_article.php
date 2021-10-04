<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategorieToArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->foreignId('categorie_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('articles_categorie_id_foreign');

            // $table->dropForeign(['user_id']);
       
               $table->dropIndex('articles_categorie_id_foreign');
       
            // $table->dropIndex(['user_id']);
       
            $table->dropColumn('categorie_id');
        });
    }
}
