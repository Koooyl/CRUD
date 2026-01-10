<?php

namespace App\Http\Controllers;

use App\Models\VoluntaryOrganization;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class VoluntaryOrganizationController extends Controller
{
    public function create(PersonalInfo $personalInfo)
    {
        return view('voluntary.createVol', compact('personalInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'personal_info_id' => 'required|exists:personal_infos,id',
            'organizations.*.organization_name' => 'required|string|max:255',
            'organizations.*.position' => 'nullable|string|max:255',
            'organizations.*.from_date' => 'nullable|date',
            'organizations.*.to_date' => 'nullable|date',
            'organizations.*.number_of_hours' => 'nullable|integer',
        ]);

        foreach ($request->organizations as $org) {
            VoluntaryOrganization::create([
                'personal_info_id' => $request->personal_info_id,
                ...$org
            ]);
        }

        return redirect()->route(
            'training.create',
            $request->personal_info_id
        );
    }
}
