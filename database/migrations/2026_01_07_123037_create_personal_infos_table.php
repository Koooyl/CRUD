<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();

            // Relation
            $table->unsignedBigInteger('applicant_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Name
            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('name_extension')->nullable(); // Jr, Sr

            // Birth details
            $table->date('date_of_birth');
            $table->string('place_of_birth');

            // Personal details
            $table->enum('sex_at_birth', ['Male', 'Female']);
            $table->string('civil_status');

            // Physical attributes
            $table->decimal('height_m', 4, 2)->nullable(); // ex: 1.74
            $table->integer('weight_kg')->nullable();

            // Identification numbers
            $table->string('blood_type')->nullable();
            $table->string('umid_no')->nullable();
            $table->string('pagibig_no')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->string('philsys_no')->nullable(); // PSN
            $table->string('tin_no')->nullable();
            $table->string('agency_employee_no')->nullable();

            // Citizenship
            $table->string('citizenship');
            $table->string('dual_citizenship_details')->nullable();

            // Contact
            $table->string('telephone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();

            // Addresses
            $table->string('res_house_no')->nullable();
            $table->string('res_street')->nullable();
            $table->string('res_subdivision')->nullable();
            $table->string('res_barangay')->nullable();
            $table->string('res_city')->nullable();
            $table->string('res_province')->nullable();
            $table->string('res_zip_code')->nullable();

            $table->string('perm_house_no')->nullable();
            $table->string('perm_street')->nullable();
            $table->string('perm_subdivision')->nullable();
            $table->string('perm_barangay')->nullable();
            $table->string('perm_city')->nullable();
            $table->string('perm_province')->nullable();
            $table->string('perm_zip_code')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_infos');
    }
};
