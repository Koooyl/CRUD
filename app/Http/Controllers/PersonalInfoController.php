<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'applicant_id' => 'required|integer|unique:personal_infos,applicant_id',
            'surname' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'name_extension' => 'nullable|string|max:50',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'sex_at_birth' => 'required|string|max:20',
            'civil_status' => 'required|string|max:50',
            'citizenship' => 'required|string|max:100',
        ]);

        $personalInfo = PersonalInfo::create($validated);

        return response()->json([
            'message' => 'Personal info saved',
            'personal_info_id' => $personalInfo->id,
        ], 201);
    }


    public function create()
{
    return view('personal_info.create');
}

public function storeWeb(Request $request)
{
    $personalInfo = PersonalInfo::create(
        $request->only(['surname', 'first_name'])
    );

    return redirect('/personal-info');
}

public function index()
{
    $personalInfos = PersonalInfo::latest()->get();
    return view('personal_info.index', compact('personalInfos'));
}

}
