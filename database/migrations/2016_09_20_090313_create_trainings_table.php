<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('organisation');
            $table->integer('categoryId')->unsigned();
            $table->timestamp('date');
            $table->string('venue');
            $table->string('phoneNumber');
            $table->string('contactName');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('categoryId')
                ->references('id')
                ->on('category')
                ->update('cascade')
                ->delete('cascade');
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
        Schema::dropIfExists('trainings');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
