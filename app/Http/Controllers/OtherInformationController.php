<?php

namespace App\Http\Controllers;

use App\Models\OtherInformation;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class OtherInformationController extends Controller
{
    public function create(PersonalInfo $personalInfo)
    {
        return view('other_info.createOther', compact('personalInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'personal_info_id' => 'required|exists:personal_infos,id',
            'special_skills' => 'nullable|string',
            'non_academic_distinctions' => 'nullable|string',
            'membership_in_associations' => 'nullable|string',
        ]);

        OtherInformation::updateOrCreate(
            ['personal_info_id' => $request->personal_info_id],
            $request->only([
                'special_skills',
                'non_academic_distinctions',
                'membership_in_associations'
            ])
        );

        return redirect('/personal-info')
            ->with('success', 'Profile completed successfully 🎉');
    }
}
