<?php

namespace App\Http\Controllers;

use App\Models\FamilyBackground;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class FamilyBackgroundController extends Controller
{
    /**
     * STEP 2 FORM
     */
    public function create(PersonalInfo $personalInfo)
    {
        return view('family_background.createFam', compact('personalInfo'));
    }

    /**
     * STORE FAMILY BACKGROUND
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'personal_info_id' => 'required|exists:personal_infos,id',

        'spouse_not_applicable' => 'nullable|boolean',  

        'spouse_surname' => 'nullable|string|max:255',
        'spouse_first_name' => 'nullable|string|max:255',
        'spouse_middle_name' => 'nullable|string|max:255',
        'spouse_name_extension' => 'nullable|string|max:50',
        'spouse_occupation' => 'nullable|string|max:255',
        'spouse_employer' => 'nullable|string|max:255',
        'spouse_business_address' => 'nullable|string|max:255',
        'spouse_telephone' => 'nullable|string|max:50',

        'father_surname' => 'required|string|max:255',
        'father_first_name' => 'required|string|max:255',
        'father_middle_name' => 'nullable|string|max:255',
        'father_name_extension' => 'nullable|string|max:50',

        'mother_maiden_surname' => 'required|string|max:255',
        'mother_first_name' => 'required|string|max:255',
        'mother_middle_name' => 'nullable|string|max:255',
    ]);

    $familyBackground = FamilyBackground::create($validated);

    // ✅ REDIRECT TO STEP 3 (CHILDREN)
    return redirect()->route('children.createChild', $familyBackground->id);
}


}
