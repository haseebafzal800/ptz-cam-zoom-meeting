<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appSettings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('email');
            $table->text('phone');
            $table->text('address');
            $table->text('zoomClientId');
            $table->text('zoomClientSecret');
            $table->text('zoomAccountId');
            $table->text('zoomRedirectUrl');
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
        Schema::dropIfExists('appSettings');
    }
}
