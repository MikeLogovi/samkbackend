<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*
        Schema::table('responses, function (Blueprint $table) {
            $table->foreign('messages_id')->references('id')->on('messagess')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('responses', function (Blueprint $table) {
            $table->dropForeign('responses_messages_id_foreign');
        });*/
    }
}
