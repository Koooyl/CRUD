<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
    return view('personal_info.createInfo');
}

public function storeWeb(Request $request)
{
    $personalInfo = PersonalInfo::create($request->only([
        'surname',
        'first_name',
        'middle_name',
        'name_extension',
        'date_of_birth',
        'place_of_birth',
        'sex_at_birth',
        'civil_status',
        'height_m',
        'weight_kg',
        'blood_type',
        'umid_no',
        'pagibig_no',
        'philhealth_no',
        'philsys_no',
        'tin_no',
        'agency_employee_no',
        'citizenship',
        'telephone_no',
        'mobile_no',
        'email',
        'res_house_no',
        'res_street',
        'res_subdivision',
        'res_barangay',
        'res_city',
        'res_province',
        'res_zip_code',
        'perm_house_no',
        'perm_street',
        'perm_subdivision',
        'perm_barangay',
        'perm_city',
        'perm_province',
        'perm_zip_code',
    ]));

    // ✅ REDIRECT TO STEP 2
    return redirect()->route(
        'family_background.create',
        $personalInfo->id
    );
}


public function index()
{
    $personalInfos = PersonalInfo::latest()->get();
    return view('personal_info.index', compact('personalInfos'));
}



public function exportExcel(PersonalInfo $personalInfo)
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

    $fileName = 'PDS_' . $personalInfo->surname . '.csv';

    $response = new StreamedResponse(function () use ($personalInfo) {
        $handle = fopen('php://output', 'w');

        // ===== HEADER =====
        fputcsv($handle, ['PERSONAL DATA SHEET (PDS)']);

        fputcsv($handle, []);
        fputcsv($handle, ['PERSONAL INFORMATION']);
        fputcsv($handle, ['Surname', $personalInfo->surname]);
        fputcsv($handle, ['First Name', $personalInfo->first_name]);
        fputcsv($handle, ['Date of Birth', $personalInfo->date_of_birth]);
        fputcsv($handle, ['Sex', $personalInfo->sex_at_birth]);
        fputcsv($handle, ['Civil Status', $personalInfo->civil_status]);

        // ===== FAMILY =====
        fputcsv($handle, []);
        fputcsv($handle, ['FAMILY BACKGROUND']);

        if ($personalInfo->familyBackground) {
            fputcsv($handle, ['Father',
                $personalInfo->familyBackground->father_surname,
                $personalInfo->familyBackground->father_first_name
            ]);
            fputcsv($handle, ['Mother',
                $personalInfo->familyBackground->mother_maiden_surname,
                $personalInfo->familyBackground->mother_first_name
            ]);
        }

        // ===== CHILDREN =====
        fputcsv($handle, []);
        fputcsv($handle, ['CHILDREN']);

        if ($personalInfo->familyBackground?->children->isEmpty()) {
            fputcsv($handle, ['Not Applicable']);
        } else {
            foreach ($personalInfo->familyBackground->children as $child) {
                fputcsv($handle, [
                    $child->full_name,
                    $child->date_of_birth
                ]);
            }
        }

        // ===== EDUCATION =====
        fputcsv($handle, []);
        fputcsv($handle, ['EDUCATIONAL BACKGROUND']);

        foreach ($personalInfo->educationalBackgrounds as $edu) {
            fputcsv($handle, [
                $edu->level,
                $edu->school_name,
                $edu->year_graduated
            ]);
        }

        // ===== WORK =====
        fputcsv($handle, []);
        fputcsv($handle, ['WORK EXPERIENCE']);

        foreach ($personalInfo->workExperiences as $work) {
            fputcsv($handle, [
                $work->position_title,
                $work->company_name
            ]);
        }

        // ===== OTHER INFO =====
        fputcsv($handle, []);
        fputcsv($handle, ['OTHER INFORMATION']);

        if ($personalInfo->otherInformation) {
            fputcsv($handle, ['Special Skills', $personalInfo->otherInformation->special_skills]);
            fputcsv($handle, ['Non-Academic Distinctions', $personalInfo->otherInformation->non_academic_distinctions]);
            fputcsv($handle, ['Memberships', $personalInfo->otherInformation->membership_in_associations]);
        }

        fclose($handle);
    });

    $response->headers->set('Content-Type', 'text/csv');
    $response->headers->set(
        'Content-Disposition',
        'attachment; filename="' . $fileName . '"'
    );

    return $response;
}




}
