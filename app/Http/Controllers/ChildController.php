<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\FamilyBackground;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    /**
     * STEP 3 FORM – CHILDREN
     */
    public function create(FamilyBackground $familyBackground)
    {
        return view('children.createChild', compact('familyBackground'));
    }

    /**
     * STORE CHILDREN
     */
    public function store(Request $request)
{
    $request->validate([
        'family_background_id' => 'required|exists:family_backgrounds,id',
        'children.*.full_name' => 'nullable|string|max:255',
        'children.*.date_of_birth' => 'nullable|date',
        'children.*.is_not_applicable' => 'nullable|boolean',
        'children_na' => 'nullable|boolean',
    ]);

    $familyBackground = FamilyBackground::findOrFail(
        $request->family_background_id
    );

    // ✅ IF NOT APPLICABLE → SKIP CHILDREN
    if ($request->boolean('children_na')) {
        return redirect()->route(
            'educational_background.create',
            $familyBackground->personalInfo->id
        );
    }

    // ✅ STORE CHILDREN
    foreach ($request->children ?? [] as $child) {

        $isNotApplicable = $child['is_not_applicable'] ?? false;

        // Skip empty rows unless NA is checked
        if (
            !$isNotApplicable &&
            (empty($child['full_name']) || empty($child['date_of_birth']))
        ) {
            continue;
        }

        Child::create([
            'personal_info_id' => $familyBackground->personal_info_id,
            'family_background_id' => $familyBackground->id,
            'full_name' => $isNotApplicable ? null : $child['full_name'],
            'date_of_birth' => $isNotApplicable ? null : $child['date_of_birth'],
            'is_not_applicable' => $isNotApplicable,
        ]);
    }

    return redirect()->route(
        'educational_background.create',
        $familyBackground->personalInfo->id
    );
}





}
