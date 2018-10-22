<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->integer('province_id')->unsigned()->change();
            $table->foreign('province_id')->references('id')->on('province')
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
            $table->dropForeign('news_province_id_foreign');
        });

        Schema::table('news', function(Blueprint $table) {
            $table->dropIndex('news_province_id_foreign');
        });

        Schema::table('news', function(Blueprint $table) {
            $table->integer('province_id')->change();
        });
    }
}
