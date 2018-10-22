<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToRatingHistoricalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rating_historicals', function (Blueprint $table) {
            $table->integer('posting')->unsigned()->change();
            $table->foreign('posting')->references('id')->on('users')
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
        Schema::table('rating_historicals', function(Blueprint $table) {
            $table->dropForeign('rating_historicals_posting_foreign');
            $table->dropForeign('rating_historicals_rating_id_foreign');
        });

        Schema::table('rating_historicals', function(Blueprint $table) {
            $table->dropIndex('rating_historicals_posting_foreign');
             $table->dropIndex('rating_historicals_historical_id_foreign');
        });

        Schema::table('rating_historicals', function(Blueprint $table) {
            $table->integer('posting')->change();
            $table->integer('historical_id')->change();
        });
    }
}
