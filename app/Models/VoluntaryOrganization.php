<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoluntaryOrganization extends Model
{
    use HasFactory;

    protected $fillable = [
        'personal_info_id',
        'organization_name',
        'position',
        'from_date',
        'to_date',
        'number_of_hours',
    ];

    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class);
    }
}
