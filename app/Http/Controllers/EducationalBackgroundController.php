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

        $isNA = isset($row['is_not_applicable']);

        EducationalBackground::updateOrCreate(
            [
                'personal_info_id' => $request->personal_info_id,
                'level' => $row['level'],
            ],
            [
                'school_name' => $isNA ? 'N/A' : ($row['school_name'] ?? null),
                'degree_course' => $isNA ? 'N/A' : ($row['degree_course'] ?? null),

                // 🔹 KEEP INT FIELDS NULL WHEN N/A
                'period_from' => $isNA ? null : ($row['period_from'] ?? null),
                'period_to' => $isNA ? null : ($row['period_to'] ?? null),
                'year_graduated' => $isNA ? null : ($row['year_graduated'] ?? null),

                'highest_level_units' => $isNA ? 'N/A' : ($row['highest_level_units'] ?? null),
                'honors_received' => $isNA ? 'N/A' : ($row['honors_received'] ?? null),
                'is_not_applicable' => $isNA,
            ]
        );
    }

    return redirect()->route('eligibility.create', $request->personal_info_id);
}




}
