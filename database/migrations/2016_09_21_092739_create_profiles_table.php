<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('region')->nullable();
            $table->string('gender')->nullable();
            $table->string('district')->nullable();
            $table->string('address')->nullable();
            $table->string('skills')->nullable();
            $table->string('phoneNumber', 20)->nullable();//Add a phone number
            $table->string('country')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('profiles');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
