<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admission_id')->constrained('studentadmissions')->onDelete('cascade');
            $table->string('p_a')->default(0)->comment('1=present,0=absent');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('class_id')->constrained('educlasses')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade')->nullable();
            $table->date('attendance_date');
            $table->time('attendance_time');
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
        Schema::dropIfExists('attendances');
    }
}
