<?php

namespace App\Http\Controllers;

use App\Models\FamilyBackground;
use Illuminate\Http\Request;

class FamilyBackgroundController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'personal_info_id' => 'required|exists:personal_infos,id',

            // Spouse
            'spouse_surname' => 'nullable|string|max:255',
            'spouse_first_name' => 'nullable|string|max:255',
            'spouse_middle_name' => 'nullable|string|max:255',
            'spouse_name_extension' => 'nullable|string|max:50',
            'spouse_occupation' => 'nullable|string|max:255',
            'spouse_employer' => 'nullable|string|max:255',
            'spouse_business_address' => 'nullable|string|max:255',
            'spouse_telephone_no' => 'nullable|string|max:50',

            // Father
            'father_surname' => 'required|string|max:255',
            'father_first_name' => 'required|string|max:255',
            'father_middle_name' => 'nullable|string|max:255',
            'father_name_extension' => 'nullable|string|max:50',

            // Mother
            'mother_maiden_surname' => 'required|string|max:255',
            'mother_first_name' => 'required|string|max:255',
            'mother_middle_name' => 'nullable|string|max:255',
        ]);

        $family = FamilyBackground::create($validated);

        return response()->json([
            'message' => 'Family background saved',
            'family_background_id' => $family->id,
        ], 201);
    }
}
