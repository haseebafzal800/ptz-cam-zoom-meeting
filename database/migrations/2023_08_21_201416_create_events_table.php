<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('start');
            $table->date('end');
            $table->string('host_email');
            $table->string('host_id');
            $table->string('zoom_meeting_id');
            $table->string('zoom_meeting_duration');
            $table->text('meeting_start_url');
            $table->text('meeting_join_url');
            $table->string('meeting_password');
            $table->string('meeting_timezone');
            $table->integer('client_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
