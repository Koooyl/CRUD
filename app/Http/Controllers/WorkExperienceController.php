<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function create(PersonalInfo $personalInfo)
    {
        return view('work_experience.createWork', compact('personalInfo'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'personal_info_id' => 'required|exists:personal_infos,id',
            'position_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'monthly_salary' => 'nullable|numeric',
            'salary_grade' => 'nullable|string|max:50',
            'appointment_status' => 'nullable|string|max:100',
            'government_service' => 'nullable|string|max:10',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date',
        ]);

        WorkExperience::create($validated);

        // ✅ NEXT STEP → VOLUNTARY ORGANIZATIONS
        return redirect()->route(
            'voluntary.create',
            $validated['personal_info_id']
        )->with('success', 'Work experience saved successfully.');
    }
}
