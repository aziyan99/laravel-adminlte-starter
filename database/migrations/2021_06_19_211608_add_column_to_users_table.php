<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['male', 'female']);
            $table->string('birth_place')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nik');
            $table->dropColumn('gender');
            $table->dropColumn('birth_place');
            $table->dropColumn('birth_date');
            $table->dropColumn('address');
            $table->dropColumn('phone_number');
            $table->dropColumn('image');
        });
    }
}
