<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedule_employees', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id')->unsigned();
            $table->integer('shift_id')->unsigned();
            $table->date('Date');
            $table->unique(['Date', 'emp_id', 'shift_id']);
            $table->boolean('isSick')->default(false);
            $table->boolean('isRecoverd')->default(false);
            $table->enum('status', ['Ingeplanned', 'optijd', 'telaat', 'ziek'])->default('Ingeplanned');
            $table->string('sick_reason')->nullable();

            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('shift_id')->references('id')->on('shifts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //  Schema::table('schedule_employees', function (Blueprint $table) {

        //     $table->dropForeign(['shift_id']);
        //     $table->dropForeign(['emp_id']);
        //    });
        //    Schema::dropIfExists('schedule_employees');
    }
};
