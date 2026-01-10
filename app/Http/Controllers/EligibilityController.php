<?php

namespace App\Http\Controllers;

use App\Models\Eligibility;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class EligibilityController extends Controller
{
    /**
     * STEP 2 – ELIGIBILITY FORM
     */
    public function create(PersonalInfo $personalInfo)
    {
        return view('eligibility.createEli', compact('personalInfo'));
    }

    /**
     * STORE ELIGIBILITY
     */
    public function store(Request $request)
    {
        $request->validate([
            'personal_info_id' => 'required|exists:personal_infos,id',
            'eligibility_type' => 'required|string|max:255',
            'rating' => 'nullable|string|max:50',
            'date_of_exam' => 'nullable|date',
            'place_of_exam' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:100',
            'license_validity' => 'nullable|date',
        ]);

        Eligibility::create($request->all());

        // NEXT STEP → WORK EXPERIENCE
        return redirect()->route(
            'work_experience.create',
            $request->personal_info_id
        );
    }
}
