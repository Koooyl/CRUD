<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'personal_info_id',
        'family_background_id',
        'full_name',
        'date_of_birth',
        'is_not_applicable',
    ];

    public function familyBackground()
    {
        return $this->belongsTo(FamilyBackground::class);
    }

    public function personalInfo()
{
    return $this->belongsTo(PersonalInfo::class);
}


    
}
