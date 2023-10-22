<?php

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
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('id_number')->nullable();
            $table->string('admission_no')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('admi_name')->nullable();
            $table->string('roll')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('class_id')->nullable();
            $table->string('admi_phone')->nullable();
            $table->string('admi_photo')->nullable();
            $table->string('b_cirti')->nullable();
            $table->string('immu_record')->nullable();
            $table->string('proof_address')->nullable();
            $table->string('guard_pic')->nullable();
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
            $table->string('study_status')->default(0);
            $table->string('status')->default(0)->comment('0=pending,1=active');
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
