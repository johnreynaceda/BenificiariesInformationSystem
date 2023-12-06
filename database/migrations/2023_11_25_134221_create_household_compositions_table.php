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
        Schema::create('household_compositions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_application_id');
            $table->string('name');
            $table->string('sex');
            $table->date('birthdate');
            $table->string('age');
            $table->string('civil_status');
            $table->string('relationship');
            $table->string('educational');
            $table->string('occupation');
            $table->string('income');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('household_compositions');
    }
};
