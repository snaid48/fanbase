<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToEventParticipatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_participates', function (Blueprint $table) {
            $table->integer('event_id')->unsigned()->change();
            $table->foreign('event_id')->references('id')->on('events')
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
        Schema::table('event_participates', function(Blueprint $table) {
            $table->dropForeign('event_participates_event_id_foreign');
            
        });

        Schema::table('event_participates', function(Blueprint $table) {
            $table->dropIndex('event_participates_event_id_foreign');
            
        });

        Schema::table('event_participates', function(Blueprint $table) {
            $table->integer('event_id')->change();
            
        });
    }
}
