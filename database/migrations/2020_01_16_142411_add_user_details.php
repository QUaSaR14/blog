<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // dob, phone, address, image
            $table->date('dob');
            $table->bigInteger('phone');
            $table->string('address', 100);
            $table->string('image');
            $table->string('hindi_name');
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
            // drop columns
            $table->dropColumn(['dob', 'phone', 'address', 'image', 'hindi_name']);
        });
    }
}
