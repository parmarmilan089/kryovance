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
        Schema::create('product_customer_role_discounts', function (Blueprint $table) {
            $table->id();

            // Foreign keys - defined manually
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_role_id');

            $table->decimal('discount_percentage', 5, 2)->default(0.00);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_customer_role_discounts');
    }
};
