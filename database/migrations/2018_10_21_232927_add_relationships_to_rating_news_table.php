<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToRatingNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rating_news', function (Blueprint $table) {
            $table->integer('posting')->unsigned()->change();
            $table->foreign('posting')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

                $table->integer('news_id')->unsigned()->change();
            $table->foreign('news_id')->references('id')->on('news')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rating_news', function(Blueprint $table) {
            $table->dropForeign('rating_news_posting_foreign');
            $table->dropForeign('rating_news_rating_id_foreign');
        });

        Schema::table('rating_historicals', function(Blueprint $table) {
            $table->dropIndex('rating_news_posting_foreign');
             $table->dropIndex('rating_news_news_id_foreign');
        });

        Schema::table('rating_news', function(Blueprint $table) {
            $table->integer('posting')->change();
            $table->integer('news_id')->change();
        });
    }
}
