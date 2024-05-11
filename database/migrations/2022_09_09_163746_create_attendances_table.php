<?php

use App\Models\Educlass;
use App\Models\Group;
use App\Models\Studentadmission;
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
            $table->foreignId('admission_id')->constrained((new Studentadmission())->getTable());
            $table->string('attendence_status');
            $table->foreignId('group_id')->constrained((new Group())->getTable());
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
