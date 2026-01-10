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
    Schema::create('voluntary_organizations', function (Blueprint $table) {

    $table->id();
    $table->foreignId('personal_info_id')->constrained()->cascadeOnDelete();

    $table->string('organization_name');
    $table->date('from_date')->nullable();
    $table->date('to_date')->nullable();
    $table->integer('number_of_hours')->nullable();
    $table->string('position')->nullable();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voluntary_organizations');
    }
};
