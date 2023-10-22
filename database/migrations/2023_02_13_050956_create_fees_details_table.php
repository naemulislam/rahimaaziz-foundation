<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fees_id')->constrained('fees')->onDelete('cascade');
            $table->foreignId('admission_id')->constrained('studentadmissions')->onDelete('cascade');
            $table->string('month');
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
        Schema::dropIfExists('fees_details');
    }
}
