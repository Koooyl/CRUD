<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = [
        'personal_info_id',
        'position_title',
        'company_name',
        'monthly_salary',
        'salary_grade',
        'appointment_status',
        'government_service',
        'date_from',
        'date_to',
    ];

    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class);
    }
}
