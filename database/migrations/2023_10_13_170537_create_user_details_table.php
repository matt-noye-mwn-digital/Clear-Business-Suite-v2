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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('default_language')->default('English')->nullable();
            $table->string('address_line_one')->nullable();
            $table->string('address_line_two')->nullable();
            $table->string('town_city')->nullable();
            $table->string('zip_postcode')->nullable();
            $table->string('state_county')->nullable();
            $table->string('country')->nullable();
            $table->string('landline_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('website')->nullable();
            $table->string('default_payment_method')->default('Bank Transfer')->nullable();
            $table->text('description')->nullable();
            $table->string('lead_status')->nullable();
            $table->string('lead_source')->nullable();
            $table->unsignedBigInteger('lead_assignee_id')->nullable();
            $table->decimal('lead_value')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lead_assignee_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
