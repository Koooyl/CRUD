<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    use HasFactory;

    protected $fillable = [
        'personal_info_id',
        'level',
        'school_name',
        'degree_course',
        'period_from',
        'period_to',
        'highest_level_units',
        'year_graduated',
        'scholarship_honors',
    ];

    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class);
    }
}
