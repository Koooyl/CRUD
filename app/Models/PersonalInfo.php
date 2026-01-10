<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Child;
use App\Models\FamilyBackground;
use App\Models\EducationalBackground;
use App\Models\Eligibility;
use App\Models\WorkExperience;
use App\Models\VoluntaryOrganization;
use App\Models\Training;
use App\Models\OtherInformation;


class PersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'first_name',
        'middle_name',
        'name_extension',
        'date_of_birth',
        'place_of_birth',
        'sex_at_birth',
        'civil_status',
        'height_m',
        'weight_kg',
        'blood_type',
        'umid_no',
        'pagibig_no',
        'philhealth_no',
        'philsys_no',
        'tin_no',
        'agency_employee_no',
        'citizenship',
        'dual_citizenship_details',
        'telephone_no',
        'mobile_no',
        'email',
        'res_house_no',
        'res_street',
        'res_subdivision',
        'res_barangay',
        'res_city',
        'res_province',
        'res_zip_code',
        'perm_house_no',
        'perm_street',
        'perm_subdivision',
        'perm_barangay',
        'perm_city',
        'perm_province',
        'perm_zip_code',
    ];

    // Relationships
    public function familyBackground()
    {
        return $this->hasOne(FamilyBackground::class);
    }

    public function children()
    {
        return $this->hasMany(Child::class);
    }

    public function educationalBackgrounds()
    {
        return $this->hasMany(EducationalBackground::class);
    }

    public function eligibilities()
{
    return $this->hasMany(Eligibility::class);
}

public function workExperiences()
{
    return $this->hasMany(WorkExperience::class);
}

public function voluntaryOrganizations()
{
    return $this->hasMany(VoluntaryOrganization::class);
}

public function trainings()
{
    return $this->hasMany(Training::class);
}

public function otherInformation()
{
    return $this->hasOne(OtherInformation::class);
}


}
