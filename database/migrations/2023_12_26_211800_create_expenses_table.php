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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('expense_date');
            $table->decimal('amount', 9, 2);
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('expense_type')->nullable();
            $table->string('receipt')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
