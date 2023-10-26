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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->unsignedBigInteger('project_type_id');
            $table->string('project_status');
            $table->decimal('progress')->default(0)->nullable();
            $table->string('billing_type');
            $table->decimal('fixed_rate_price', 9, 2)->nullable();
            $table->decimal('rate_per_hour', 9, 2)->nullable();
            $table->decimal('project_total', 9, 2)->nullable();
            $table->string('estimated_hours')->nullable();
            $table->date('start_date');
            $table->date('due_date')->nullable();
            $table->text('description')->nullable();
            $table->json('files')->nullable();
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('project_notes_id')->nullable();
            $table->unsignedBigInteger('project_tasks_id')->nullable();

            $table->timestamps();

            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
