<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('visi');
            $table->string('misi');
            $table->string('front_image');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('twitter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('visi');
            $table->dropColumn('misi');
            $table->dropColumn('front_image');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('youtube');
            $table->dropColumn('twitter');
        });
    }
}
