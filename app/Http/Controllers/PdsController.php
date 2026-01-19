<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

public function export($id)
{
    $info = PersonalInfo::with('children')->findOrFail($id);
    $info = PersonalInfo::with([
        'children',
        'familyBackground',
        'educationalBackgrounds'
    ])->findOrFail($id);


    $templatePath = storage_path('app/templates/CSC_PDS.xlsx');

    if (!file_exists($templatePath)) {
        dd('TEMPLATE NOT FOUND', $templatePath);
    }

    // Load CSC template
    $spreadsheet = IOFactory::load($templatePath);
    $sheet = $spreadsheet->getSheetByName('C1');
    

        if (!$sheet) {
            dd('C1 sheet not found');
        }

    

    // ======================
    // PERSONAL INFORMATION
    // ======================

    $sheet->setCellValue('D10', $info->surname);
    $sheet->setCellValue('D11', $info->first_name);
    $sheet->setCellValue('D12', $info->middle_name);
    $sheet->setCellValue('D15', $info->place_of_birth);
    $sheet->setCellValue('L11', $info->name_extension);
    $sheet->setCellValue('D13', \Carbon\Carbon::parse($info->birth_date)->format('d/m/Y'));
    $sheet->setCellValue('D16', $info->sex_at_birth);
    $sheet->setCellValue('D17', $info->civil_status);
    $sheet->setCellValue('D22', $info->height_m);
    $sheet->setCellValue('D24', $info->weight_kg);
    $sheet->setCellValue('D25', $info->blood_type);
    $sheet->setCellValue('D27', $info->umid_no);
    $sheet->setCellValue('D29', $info->pagibig_no);
    $sheet->setCellValue('D31', $info->philhealth_no);
    $sheet->setCellValue('D32', $info->philsys_no);
    $sheet->setCellValue('D33', $info->tin_no);
    $sheet->setCellValue('D34', $info->agency_employee_no);




    $sheet->setCellValue('I17', $info->res_house_no);
    $sheet->setCellValue('L17', $info->res_street);
    $sheet->setCellValue('I19', $info->res_subdivision);
    $sheet->setCellValue('L19', $info->res_barangay);
    $sheet->setCellValue('I22', $info->res_city);
    $sheet->setCellValue('L22', $info->res_province);

    $sheet->setCellValue('I25', $info->perm_house_no);
    $sheet->setCellValue('L25', $info->perm_street);
    $sheet->setCellValue('I27', $info->perm_subdivision);
    $sheet->setCellValue('L27', $info->perm_barangay);
    $sheet->setCellValue('I29', $info->perm_city);
    $sheet->setCellValue('L29', $info->perm_province);
    
    $sheet->setCellValue('J13', $info->citizenship);
    $sheet->setCellValue('L31', $info->telephone_no);       
    $sheet->setCellValue('L33', $info->mobile_no);
    $sheet->setCellValue('L34', $info->email);




    // ======================
    // FAMILY BACKGROUND
    // ======================
    $fb = $info->familyBackground;

    $sheet->setCellValue('D36', optional($fb)->spouse_surname);
    $sheet->setCellValue('D37', optional($fb)->spouse_first_name);
    $sheet->setCellValue('D38', optional($fb)->spouse_middle_name);
    $sheet->setCellValue('G37', optional($fb)->spouse_name_extension);
    $sheet->setCellValue('D39', optional($fb)->spouse_occupation);
    $sheet->setCellValue('D40', optional($fb)->spouse_employer);
    $sheet->setCellValue('D41', optional($fb)->spouse_business_address);
    $sheet->setCellValue('D42', optional($fb)->spouse_telephone);

    $sheet->setCellValue('D43', optional($fb)->father_surname);
    $sheet->setCellValue('D44', optional($fb)->father_first_name);
    $sheet->setCellValue('D45', optional($fb)->father_middle_name);
    $sheet->setCellValue('G44', optional($fb)->father_name_extension);

    $sheet->setCellValue('D47', optional($fb)->mother_maiden_surname);
    $sheet->setCellValue('D48', optional($fb)->mother_first_name);
    $sheet->setCellValue('D49', optional($fb)->mother_middle_name);


    /*======================
    CHILDREN (PER ROW)
    ====================== */

$startRow = 37;

foreach ($info->children->take(7) as $i => $child) {
    $row = $startRow + $i;

    // merged I–L
    $sheet->setCellValue("I{$row}", $child->full_name);

    // merged M–N
    $sheet->setCellValue(
        "M{$row}",
        \Carbon\Carbon::parse($child->date_of_birth)->format('m/d/Y')
    );
}



    // ======================
    // EDUCATIONAL BACKGROUND
    // ======================

    $elementary = $info->educationalBackgrounds
    ->firstWhere('level', 'ELEMENTARY');

$sheet->setCellValue('D54', optional($elementary)->school_name);
$sheet->setCellValue('G54', optional($elementary)->degree_course);
$sheet->setCellValue('J54', optional($elementary)->period_from ?? 'N/A');
$sheet->setCellValue('K54', optional($elementary)->period_to ?? 'N/A');
$sheet->setCellValue('L54', optional($elementary)->highest_level_units);
$sheet->setCellValue('M54', optional($elementary)->year_graduated ?? 'N/A');
$sheet->setCellValue('N54', optional($elementary)->honors_received);


$secondary = $info->educationalBackgrounds
    ->firstWhere('level', 'SECONDARY');

$sheet->setCellValue('D55', optional($secondary)->school_name);
$sheet->setCellValue('G55', optional($secondary)->degree_course);
$sheet->setCellValue('J55', optional($secondary)->period_from ?? 'N/A');
$sheet->setCellValue('K55', optional($secondary)->period_to ?? 'N/A');
$sheet->setCellValue('L55', optional($secondary)->highest_level_units);
$sheet->setCellValue('M55', optional($secondary)->year_graduated ?? 'N/A');
$sheet->setCellValue('N55', optional($secondary)->honors_received);


$vocation = $info->educationalBackgrounds
    ->firstWhere('level', 'VOCATIONAL / TRADE COURSE');

$sheet->setCellValue('D56', optional($vocation)->school_name);
$sheet->setCellValue('G56', optional($vocation)->degree_course);
$sheet->setCellValue('J56', optional($vocation)->period_from ?? 'N/A');
$sheet->setCellValue('K56', optional($vocation)->period_to ?? 'N/A');
$sheet->setCellValue('L56', optional($vocation)->highest_level_units);
$sheet->setCellValue('M56', optional($vocation)->year_graduated ?? 'N/A');
$sheet->setCellValue('N56', optional($vocation)->honors_received);



$college = $info->educationalBackgrounds
    ->firstWhere('level', 'COLLEGE');

$sheet->setCellValue('D57', optional($college)->school_name);
    $sheet->setCellValue('G57', optional($college)->degree_course);
    $sheet->setCellValue('J57', optional($college)->period_from ?? 'N/A');
    $sheet->setCellValue('K57', optional($college)->period_to ?? 'N/A');
    $sheet->setCellValue('L57', optional($college)->highest_level_units);
    $sheet->setCellValue('M57', optional($college)->year_graduated ?? 'N/A');
    $sheet->setCellValue('N57', optional($college)->honors_received);



$graduate = $info->educationalBackgrounds
    ->firstWhere('level', 'GRADUATE STUDIES');

    $sheet->setCellValue('D58', optional($graduate)->school_name);
    $sheet->setCellValue('G58', optional($graduate)->degree_course);
    $sheet->setCellValue('J58', optional($graduate)->period_from ?? 'N/A');
    $sheet->setCellValue('K58', optional($graduate)->period_to ?? 'N/A');
    $sheet->setCellValue('L58', optional($graduate)->highest_level_units);
    $sheet->setCellValue('M58', optional($graduate)->year_graduated ?? 'N/A');
    $sheet->setCellValue('N58', optional($graduate)->honors_received);




    




    $sheet = $spreadsheet->getSheetByName('C2');    

    if (!$sheet) {
        dd('C2 sheet not found');
    }

    // ======================
    // ELIGIBILITIES
    // ======================


    foreach ($info->eligibilities as $index => $eligibility) {
        $row = 5 + $index;

        $sheet->setCellValue("A{$row}", $eligibility->eligibility_type);
        $sheet->setCellValue("F{$row}", $eligibility->rating);
        $sheet->setCellValue("G{$row}", $eligibility->date_of_exam ? \Carbon\Carbon::parse($eligibility->date_of_exam)->format('d/m/Y') : '');
        $sheet->setCellValue("I{$row}", $eligibility->place_of_exam);
        $sheet->setCellValue("J{$row}", $eligibility->license_number);
        $sheet->setCellValue("K{$row}", $eligibility->license_validity ? \Carbon\Carbon::parse($eligibility->license_validity)->format('d/m/Y') : '');
    }


    //=======================
    // WORK EXPERIENCES
    //=======================

    foreach ($info->workExperiences as $index => $work) {
        $row = 18 + $index;

        $sheet->setCellValue("D{$row}", $work->position_title);
        $sheet->setCellValue("G{$row}", $work->company_name);
        $sheet->setCellValue("J{$row}", $work->appointment_status);
        $sheet->setCellValue("K{$row}", $work->government_service ? : '');
        $sheet->setCellValue("A{$row}", $work->date_from ? \Carbon\Carbon::parse($work->date_from)->format('d/m/Y') : '');
        $sheet->setCellValue("C{$row}", $work->date_to ? \Carbon\Carbon::parse($work->date_to)->format('d/m/Y') : '');
    }


    //========================
    // VOLUNTARY ORGANIZATIONS
    //========================

    $sheet = $spreadsheet->getSheetByName('C3');    

   
    if (!$sheet) {
        dd('C3 sheet not found');
    }

    foreach ($info->voluntaryOrganizations as $index => $voluntary) {
        $row = 6 + $index;

        $sheet->setCellValue("A{$row}", $voluntary->organization_name);
        $sheet->setCellValue("E{$row}", $voluntary->from_date ? \Carbon\Carbon::parse($voluntary->from_date)->format('d/m/Y') : '');
        $sheet->setCellValue("F{$row}", $voluntary->to_date ? \Carbon\Carbon::parse($voluntary->to_date)->format('d/m/Y') : '');
        $sheet->setCellValue("G{$row}", $voluntary->number_of_hours);
        $sheet->setCellValue("H{$row}", $voluntary->position);
    }

    //========================
    // TRAININGS
    //========================

    foreach ($info->trainings as $index => $training) {
        $row = 18 + $index;

        $sheet->setCellValue("A{$row}", $training->title);
        $sheet->setCellValue("E{$row}", $training->from_date ? \Carbon\Carbon::parse($training->from_date)->format('d/m/Y') : '');
        $sheet->setCellValue("F{$row}", $training->to_date ? \Carbon\Carbon::parse($training->to_date)->format('d/m/Y') : '');
        $sheet->setCellValue("G{$row}", $training->number_of_hours);
        $sheet->setCellValue("H{$row}", $training->conducted_by);
    }



    // ======================
    // DOWNLOAD RESPONSE
    // ======================

    return new StreamedResponse(function () use ($spreadsheet) {
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }, 200, [
        'Content-Type'        => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'Content-Disposition' => 'attachment;filename="PDS.xlsx"',
        'Cache-Control'       => 'max-age=0',
    ]);
}


}

