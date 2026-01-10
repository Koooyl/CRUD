<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('eligibilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('eligibility_type');
            $table->string('rating')->nullable();
            $table->date('date_of_exam')->nullable();
            $table->string('place_of_exam')->nullable();
            $table->string('license_number')->nullable();
            $table->date('license_validity')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eligibilities');
    }
};
