<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTableAppSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appSettings', function (Blueprint $table) {
            $table->text('video_sdk_client_id')->nullable();
            $table->text('video_sdk_client_secret')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appSettings', function (Blueprint $table) {
            $table->dropColumn(['video_sdk_client_id', 'video_sdk_client_secret']);
        });
    }
}
