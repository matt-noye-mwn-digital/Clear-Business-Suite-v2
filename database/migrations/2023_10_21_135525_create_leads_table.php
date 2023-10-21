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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('lead_status');
            $table->string('lead_source');
            $table->unsignedBigInteger('lead_assignee_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('email');
            $table->string('landline_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('website')->nullable();
            $table->string('address_line_one')->nullable();
            $table->string('address_line_two')->nullable();
            $table->string('town_city')->nullable();
            $table->string('state_county')->nullable();
            $table->string('zip_postcode')->nullable();
            $table->string('country')->nullable();
            $table->decimal('lead_value', 9,2)->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('possible lead')->nullable();
            $table->timestamps();

            $table->foreign('lead_assignee_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
