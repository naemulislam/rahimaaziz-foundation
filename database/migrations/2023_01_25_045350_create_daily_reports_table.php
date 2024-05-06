<?php

use App\Models\Educlass;
use App\Models\Studentadmission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admission_id')->constrained((new Studentadmission())->getTable());
            $table->foreignId('class_id')->constrained((new Educlass())->getTable());
            $table->string('subject_name');
            $table->string('page');
            $table->string('para');
            $table->longText('description')->nullable();
            $table->string('teacher_review')->default(0)->comment('1=done,0=report');
            $table->string('report')->default(0)->comment('1=report,0=done');
            $table->string('report_date')->nullable();
            $table->string('image')->nullable();
            $table->string('report_type')->nullable();
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
        Schema::dropIfExists('daily_reports');
    }
}
