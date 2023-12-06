<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('assistance_type');
            $table->string('referral_source');
            $table->foreignId('beneficiary_type_id');
            $table->foreignId('barangay_id');
            $table->string('client_name');
            $table->date('birthdate');
            $table->string('age');
            $table->string('sex');
            $table->string('educational');
            $table->string('civil_status');
            $table->string('relationship');
            $table->string('contact');
            $table->string('address');
            $table->string('occupation');
            $table->string('income');
            $table->string('employment');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_applications');
    }
};
