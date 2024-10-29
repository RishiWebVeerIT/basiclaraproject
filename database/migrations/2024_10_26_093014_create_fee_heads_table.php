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
        Schema::create('fee_heads', function (Blueprint $table) {
            $table->id();
            $table->string('head')->nullable();
            $table->string('price')->nullable();
            $table->string('description')->nullable();
            $table->string('year')->nullable();
            $table->string('package')->nullable();
            $table->string('membership_type')->nullable();
            $table->integer('is_deleted')->default(0)->comment('0 = active, 1 = Delete');
            $table->integer('created_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_heads');
    }
};