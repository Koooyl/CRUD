<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdsController extends Controller
{
    public function edit(PersonalInfo $personalInfo)
    {
        $personalInfo->load([
            'familyBackground.children',
            'educationalBackgrounds',
            'eligibilities',
            'workExperiences',
            'voluntaryOrganizations',
            'trainings',
            'otherInformation',
        ]);

        return view('pds.edit', compact('personalInfo'));
    }

    public function update(Request $request, PersonalInfo $personalInfo)
    {
        DB::transaction(function () use ($request, $personalInfo) {

            /* ================= PERSONAL INFO ================= */
            $personalInfo->update($request->only([
                'surname','first_name','middle_name','name_extension',
                'date_of_birth','place_of_birth','sex_at_birth','civil_status',
                'height_m','weight_kg','blood_type','umid_no','pagibig_no',
                'philhealth_no','philsys_no','tin_no','agency_employee_no',
                'citizenship','dual_citizenship_details',
                'telephone_no','mobile_no','email',
                'res_house_no','res_street','res_subdivision','res_barangay',
                'res_city','res_province','res_zip_code',
                'perm_house_no','perm_street','perm_subdivision','perm_barangay',
                'perm_city','perm_province','perm_zip_code',
            ]));

            /* ================= FAMILY BACKGROUND ================= */
            $personalInfo->familyBackground()->updateOrCreate(
                [],
                $request->only([
                    'spouse_surname','spouse_first_name','spouse_middle_name',
                    'spouse_name_extension','spouse_occupation','spouse_employer',
                    'spouse_business_address','spouse_telephone','spouse_not_applicable',
                    'father_surname','father_first_name','father_middle_name','father_name_extension',
                    'mother_maiden_surname','mother_first_name','mother_middle_name',
                ])
            );

            /* ================= CHILDREN ================= */
            if ($request->children) {
                foreach ($request->children ?? [] as $child) {

                $isNotApplicable = $child['is_not_applicable'] ?? false;

                if (
                    !$isNotApplicable &&
                    (empty($child['full_name']) || empty($child['date_of_birth']))
                ) {
                    continue;
                }

                $personalInfo->children()->updateOrCreate(
                    ['id' => $child['id'] ?? null],
                    [
                        'full_name' => $isNotApplicable ? null : $child['full_name'],
                        'date_of_birth' => $isNotApplicable ? null : $child['date_of_birth'],
                        'is_not_applicable' => $isNotApplicable,
                    ]
                );
            }

            return redirect()->route('personal-info.index')
                ->with('success', 'PDS updated successfully.');
        }

            /* ================= EDUCATION ================= */
            foreach ($request->education ?? [] as $edu) {

                $level = $edu['level'] ?? null;
                if (!$level) continue;

                $isNotApplicable = $edu['is_not_applicable'] ?? false;

                $personalInfo->educationalBackgrounds()->updateOrCreate(
                    ['id' => $edu['id'] ?? null],
                    [
                        'level' => $level, // ✅ ALWAYS PRESENT

                        'school_name' => $isNotApplicable ? null : ($edu['school_name'] ?? null),
                        'degree_course' => $isNotApplicable ? null : ($edu['degree_course'] ?? null),
                        'period_from' => $isNotApplicable ? null : ($edu['period_from'] ?? null),
                        'period_to' => $isNotApplicable ? null : ($edu['period_to'] ?? null),
                        'highest_level_units' => $isNotApplicable ? null : ($edu['highest_level_units'] ?? null),
                        'year_graduated' => $isNotApplicable ? null : ($edu['year_graduated'] ?? null),
                        'honors_received' => $isNotApplicable ? null : ($edu['honors_received'] ?? null),

                        'is_not_applicable' => $isNotApplicable,
                    ]
                );
            }




            /* ================= ELIGIBILITY ================= */
            foreach ($request->eligibilities ?? [] as $row) {
                $personalInfo->eligibilities()->updateOrCreate(
                    ['id' => $row['id'] ?? null],
                    $row
                );
            }

            /* ================= WORK EXPERIENCE ================= */
            foreach ($request->work_experiences ?? [] as $row) {
                $personalInfo->workExperiences()->updateOrCreate(
                    ['id' => $row['id'] ?? null],
                    $row
                );
            }

            /* ================= VOLUNTARY ================= */
            foreach ($request->voluntary ?? [] as $row) {
                $personalInfo->voluntaryOrganizations()->updateOrCreate(
                    ['id' => $row['id'] ?? null],
                    $row
                );
            }

            /* ================= TRAININGS ================= */
            foreach ($request->trainings ?? [] as $row) {
                $personalInfo->trainings()->updateOrCreate(
                    ['id' => $row['id'] ?? null],
                    $row
                );
            }

            /* ================= OTHER INFO ================= */
            $personalInfo->otherInformation()->updateOrCreate(
                [],
                $request->only([
                    'special_skills',
                    'non_academic_distinctions',
                    'membership_in_associations',
                ])
            );
        });

         return redirect()
        ->route('personal-info.index')
        ->with('success', 'PDS updated successfully.');
    }

    public function show(PersonalInfo $personalInfo)
{
    $personalInfo->load([
            'familyBackground.children',
            'educationalBackgrounds',
            'eligibilities',
            'workExperiences',
            'voluntaryOrganizations',
            'trainings',
            'otherInformation',
    ]);

    return view('pds.show', compact('personalInfo'));
}

}

