<?php

use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained((new Student())->getTable());
            $table->string('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('blood')->nullable();
            $table->string('student_type')->nullable();
            $table->longText('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_call')->nullable();
            $table->string('father_email')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_call')->nullable();
            $table->string('e_name')->nullable();
            $table->string('e_call')->nullable();
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
        Schema::dropIfExists('student_infos');
    }
}
