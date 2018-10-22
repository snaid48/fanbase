<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToCommentHistoricalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comment_historicals', function (Blueprint $table) {
            $table->integer('author')->unsigned()->change();
            $table->foreign('author')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

                $table->integer('historical_id')->unsigned()->change();
            $table->foreign('historical_id')->references('id')->on('historicals')
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
        Schema::table('comment_historicals', function(Blueprint $table) {
            $table->dropForeign('comment_historical_posting_foreign');
            $table->dropForeign('comment_historical_historical_id_foreign');
        });

        Schema::table('comment_historicals', function(Blueprint $table) {
            $table->dropIndex('comment_historical_posting_foreign');
            $table->dropIndex('comment_historical_historical_id_foreign');
        });

        Schema::table('comment_historicals', function(Blueprint $table) {
            $table->integer('author')->change();
            $table->integer('historical_id')->change();
        });
    }
}
