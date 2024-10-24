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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('package')->nullable();
            $table->string('type')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('payable_amount')->nullable();
            $table->string('discount')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('pay_mode')->nullable();
            $table->string('balance_amount')->nullable();
            $table->string('join_date')->nullable();
            $table->string('due_date')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('membership_status')->default(1)->comment('0 = expired, 1 = Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
