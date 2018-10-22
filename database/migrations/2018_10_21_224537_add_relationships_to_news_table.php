<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->integer('author')->unsigned()->change();
            $table->foreign('author')->references('id')->on('users')
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
        Schema::table('news', function(Blueprint $table) {
            $table->dropForeign('news_author_foreign');
        });

        Schema::table('news', function(Blueprint $table) {
            $table->dropIndex('news_author_foreign');
        });

        Schema::table('news', function(Blueprint $table) {
            $table->integer('author')->change();
        });
    }
}
