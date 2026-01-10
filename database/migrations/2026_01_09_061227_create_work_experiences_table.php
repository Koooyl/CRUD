<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('position_title');
            $table->string('company_name');
            $table->decimal('monthly_salary', 10, 2)->nullable();
            $table->string('salary_grade')->nullable();
            $table->string('appointment_status')->nullable();
            $table->string('government_service')->nullable(); // Yes / No

            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_experiences');
    }
};
