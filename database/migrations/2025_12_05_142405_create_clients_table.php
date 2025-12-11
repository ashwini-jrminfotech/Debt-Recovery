<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            // Section 1
            $table->string('full_name');
            $table->string('contact_number');
            $table->string('email');
            $table->string('alt_mobile')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');

            // Section 2
            $table->enum('client_type', ['individual','business']);
            $table->enum('source', ['direct','agent','website','referral']);
            $table->string('agent')->nullable();
            $table->string('gst_number')->nullable();

            // Section 3
            $table->string('case_category');
            $table->decimal('expected_amount', 12,2);
            $table->text('case_description');
            $table->enum('preferred_method', ['Legal','Soft Recovery','Both']);
            $table->enum('urgency_level', ['Low','Medium','High']);

            // Section 4
            $table->json('documents')->nullable();

            // Section 5
            $table->string('assigned_to');
            $table->enum('case_stage', ['New','Under Review','Approved']);
            $table->text('internal_remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
