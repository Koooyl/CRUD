<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('educational_backgrounds', function (Blueprint $table) {
            $table->id();

            // FK to personal_infos
            $table->foreignId('personal_info_id')
                  ->constrained('personal_infos')
                  ->cascadeOnDelete();

            // EDUCATION DETAILS
            $table->enum('level', [
                'Elementary',
                'Secondary',
                'Vocational',
                'College',
                'Graduate'
            ]);

            $table->string('school_name')->nullable();
            $table->string('degree_course')->nullable();

            $table->year('period_from')->nullable();
            $table->year('period_to')->nullable();

            $table->string('highest_level_units')->nullable();
            $table->year('year_graduated')->nullable();
            $table->string('scholarship_honors')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educational_backgrounds');
    }
};

