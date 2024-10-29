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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('receipt_no')->nullable();
            $table->integer('member_id')->nullable();
            $table->integer('account_id')->nullable();
            $table->string('head')->nullable();
            $table->string('amount')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('outstanding')->nullable();
            $table->integer('generated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};