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
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->timestamp('join_date')->nullable();
            $table->string('join_month')->nullable();
            $table->string('biometric')->nullable();
            $table->string('join_year')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('mobile')->nullable();
            $table->string('alt_mobile')->nullable();
            $table->string('reference')->nullable();
            $table->string('reference_type')->nullable();
            $table->string('refference_id')->nullable();
            $table->string('refference_name')->nullable();
            $table->longText('address')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('pre_booked')->default(0)->comment('0 = No, 1 = Yes');
            $table->integer('status')->default(1)->comment('0 = inactive, 1 = Active');
            $table->integer('current_plan_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};