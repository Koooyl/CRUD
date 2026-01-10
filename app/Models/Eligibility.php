<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eligibility extends Model
{
    protected $fillable = [
        'personal_info_id',
        'eligibility_type',
        'rating',
        'date_of_exam',
        'place_of_exam',
        'license_number',
        'license_validity',
    ];

    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class);
    }
}
