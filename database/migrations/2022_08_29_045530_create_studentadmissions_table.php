<?php

use App\Models\Educlass;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentadmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentadmissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class)->constrained();
            $table->string('id_number')->nullable();
            $table->string('admission_no')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('roll')->nullable();
            $table->string('registration_no')->nullable();
            $table->foreignId('group_id')->constrained((new Group())->getTable());
            $table->string('class_grade')->nullable();
            $table->string('b_certificate')->nullable();
            $table->string('immu_record')->nullable();
            $table->string('proof_address')->nullable();
            $table->string('physical_health')->nullable();
            $table->string('mrrcfps')->nullable();
            $table->string('hsral')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('balance_transaction')->nullable();
            $table->string('currency')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('study_status')->default(1);
            $table->string('course_status')->default(0);
            $table->boolean('status');
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
        Schema::dropIfExists('studentadmissions');
    }
}
