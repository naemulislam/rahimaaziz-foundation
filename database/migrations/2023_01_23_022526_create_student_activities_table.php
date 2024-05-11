<?php

use App\Models\Group;
use App\Models\Student;
use App\Models\Studentadmission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained((new Student())->getTable());
            $table->foreignId('group_id')->constrained((new Group())->getTable());
            $table->string('activity_date');
            $table->string('edurating');
            $table->string('educomment')->nullable();
            $table->string('biharating');
            $table->string('bihacomment')->nullable();
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
        Schema::dropIfExists('student_activities');
    }
}
