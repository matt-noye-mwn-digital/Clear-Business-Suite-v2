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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->string('invoice_number');
            $table->string('payment_method');
            $table->string('status')->default('draft');
            $table->decimal('invoice_discount', 6,2)->nullable();
            $table->decimal('tax_amount', 6,2)->nullable();
            $table->decimal('sub_total')->nullable();
            $table->decimal('total')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
