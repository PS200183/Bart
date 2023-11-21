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

        Schema::create('clock_times', function (Blueprint $table) {

            $table->id();
            $table->foreignId('emp_id')->references('id')->on('employees')->cascadeOnDelete();

            $table->date('Date');
            $table->time('time_in');
            $table->time('time_out')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
