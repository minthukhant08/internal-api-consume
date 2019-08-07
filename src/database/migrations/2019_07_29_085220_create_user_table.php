<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('gender');
            $table->string('phone_no');
            $table->string('nrc_no');
            $table->text('address');
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('user_type');
            $table->string('grade')->nullable();
            $table->string('company')->nullable();
            $table->string('job')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('course_id')
                  ->references('id')->on('course')
                  ->onDelete('cascade');
            $table->foreign('batch_id')
                  ->references('id')->on('batch')
                  ->onDelete('cascade');
        });
        DB::statement("ALTER TABLE user ADD image MEDIUMBLOB null");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
