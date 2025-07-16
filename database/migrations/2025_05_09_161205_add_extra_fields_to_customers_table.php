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
        Schema::table('customers', function (Blueprint $table) {
             $table->string('gst_number')->nullable();
            $table->string('pan_number')->nullable();

            // Bank Details
            $table->string('bank_holder_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_name')->nullable();

            // Import/Export Code
            $table->string('import_code')->nullable();
            $table->string('export_code')->nullable();

            // Additional Emails & Phones
            $table->string('email_2')->nullable();
            $table->string('email_3')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('phone_3')->nullable();

            // Address Info
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();

            // Partner Info
            $table->string('partner_name_1')->nullable();
            $table->string('partner_role_1')->nullable();
            $table->string('partner_name_2')->nullable();
            $table->string('partner_role_2')->nullable();

            // Employee Info
            $table->string('employee_name_1')->nullable();
            $table->string('employee_position_1')->nullable();
            $table->string('employee_name_2')->nullable();
            $table->string('employee_position_2')->nullable();

            // Verification Status
            $table->boolean('customer_verification_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn([
                'gst_number', 'pan_number',
                'bank_holder_name', 'bank_account_number', 'ifsc_code', 'bank_name',
                'import_code', 'export_code',
                'email_2', 'email_3', 'phone_2', 'phone_3',
                'state', 'country',
                'partner_name_1', 'partner_role_1',
                'partner_name_2', 'partner_role_2',
                'employee_name_1', 'employee_position_1',
                'employee_name_2', 'employee_position_2',
                'customer_verification_status'
            ]);
        });
    }
};
