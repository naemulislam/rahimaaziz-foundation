<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_logs', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('group_id');
            $table->string('roll')->nullable();
            $table->string('total_marks')->nullable();
            $table->string('gpa')->nullable();
            $table->string('session_year')->nullable();
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
        Schema::dropIfExists('student_logs');
    }
}
