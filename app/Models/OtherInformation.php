<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherInformation extends Model
{
    use HasFactory;

    // ✅ FIX TABLE NAME
    protected $table = 'other_informations';

    protected $fillable = [
        'personal_info_id',
        'special_skills',
        'non_academic_distinctions',
        'membership_in_associations',
    ];

    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class);
    }
}
