<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->integer('student_code');
            $table->boolean('must_set_password')->default(1);
            $table->string('email')->unique();
            $table->integer('entry_year');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('advisor_id');
            $table->foreign('advisor_id')->references('id')->on('advisors')->onDelete('cascade');
            $table->bigInteger('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');


            $table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}
