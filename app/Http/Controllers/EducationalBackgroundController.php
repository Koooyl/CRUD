<?php

namespace App\Http\Controllers;

use App\Models\EducationalBackground;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class EducationalBackgroundController extends Controller
{
    /**
     * STEP 4 FORM
     */
    public function create(PersonalInfo $personalInfo)
    {
        $levels = [
            'ELEMENTARY',
            'SECONDARY',
            'VOCATIONAL / TRADE COURSE',
            'COLLEGE',
            'GRADUATE STUDIES',
];

return view('educational_background.createBack', compact('personalInfo', 'levels'));

    }

    /**
     * STORE EDUCATIONAL BACKGROUND
     */
    public function store(Request $request)
{
    foreach ($request->education as $row) {

        EducationalBackground::updateOrCreate(
            [
                'personal_info_id' => $request->personal_info_id,
                'level' => $row['level'],
            ],
            [
                'school_name' => $row['school_name'] ?? null,
                'degree_course' => $row['degree_course'] ?? null,
                'period_from' => $row['period_from'] ?? null,
                'period_to' => $row['period_to'] ?? null,
                'highest_level_units' => $row['highest_level_units'] ?? null,
                'year_graduated' => $row['year_graduated'] ?? null,
                'honors_received' => $row['honors_received'] ?? null,
                'is_not_applicable' => isset($row['is_not_applicable']),
            ]
        );
    }

    return redirect()
        ->route('eligibility.create', $request->personal_info_id);
}


}
