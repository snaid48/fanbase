<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToHistoricalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historicals', function (Blueprint $table) {
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
        Schema::table('historicals', function(Blueprint $table) {
            $table->dropForeign('historicals_author_foreign');
        });

        Schema::table('historicals', function(Blueprint $table) {
            $table->dropIndex('historicals_author_foreign');
        });

        Schema::table('historicals', function(Blueprint $table) {
            $table->integer('author')->change();
        });
    }
}
