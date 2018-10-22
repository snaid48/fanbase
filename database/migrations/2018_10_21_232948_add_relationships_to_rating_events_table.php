<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToRatingEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rating_events', function (Blueprint $table) {
            $table->integer('posting')->unsigned()->change();
            $table->foreign('posting')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::table('rating_events', function(Blueprint $table) {
            $table->dropForeign('rating_events_posting_foreign');
            $table->dropForeign('rating_events_rating_id_foreign');
        });

        Schema::table('rating_events', function(Blueprint $table) {
            $table->dropIndex('rating_events_posting_foreign');
             $table->dropIndex('rating_events_event_id_foreign');
        });

        Schema::table('rating_events', function(Blueprint $table) {
            $table->integer('posting')->change();
            $table->integer('event_id')->change();
        });
    }
}
