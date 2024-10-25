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
        Schema::create('enrollments', function (Blueprint $table) { 
            $table->id();
            $table->string('enroll_no')->unique(); 
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('student_id');
            $table->date('join_date');
            $table->double('fee', 8, 2); 
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            // Indexes (optional, for performance optimization)
            $table->index('batch_id');
            $table->index('student_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
