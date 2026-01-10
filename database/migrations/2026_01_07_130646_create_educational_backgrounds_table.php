<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
       Schema::create('educational_backgrounds', function (Blueprint $table) {
    $table->id();
    $table->foreignId('personal_info_id')->constrained()->cascadeOnDelete();

    $table->string('level');
    $table->string('school_name')->nullable();
    $table->string('degree_course')->nullable();
    $table->year('period_from')->nullable();
    $table->year('period_to')->nullable();
    $table->string('highest_level_units')->nullable();
    $table->year('year_graduated')->nullable();
    $table->string('honors_received')->nullable();

    $table->boolean('is_not_applicable')->default(false);

    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('educational_backgrounds');
    }
};

