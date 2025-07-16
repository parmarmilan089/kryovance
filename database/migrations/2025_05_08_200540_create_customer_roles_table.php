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
        Schema::create('customer_roles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g. Seller, Distributor
            $table->unsignedTinyInteger('user_type')->default(1); // for categorization if needed
            $table->boolean('is_deleted')->default(false); // soft delete logic
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_roles');
    }
};
