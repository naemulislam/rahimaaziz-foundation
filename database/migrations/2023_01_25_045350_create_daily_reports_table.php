<?php

use App\Models\Group;
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
            $table->foreignId('group_id')->constrained((new Group())->getTable());
            $table->string('report_name');
            $table->string('juz_number');
            $table->string('page');
            $table->string('line_number');
            $table->longText('description')->nullable();
            $table->string('teacher_review')->default(0);
            $table->string('report_status')->default(0);
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
