<?php

use App\Models\Educlass;
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
            $table->foreignId('admission_id')->constrained((new Studentadmission())->getTable());
            $table->foreignId('class_id')->constrained((new Educlass())->getTable());
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
