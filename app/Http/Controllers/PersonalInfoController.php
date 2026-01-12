<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PdsExport;

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


public function index(Request $request)
{
    $query = PersonalInfo::query();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('surname', 'like', "%{$search}%")
              ->orWhere('first_name', 'like', "%{$search}%");
        });
    }

    $personalInfos = $query->latest()->get();

    return view('personal_info.index', compact('personalInfos'));
}





public function exportPds($id)
{
    return Excel::download(
        new PdsExport($id),
        'PDS_CS_Form_212.xlsx'
    );
}


public function destroy($id)
{
    $personalInfo = PersonalInfo::findOrFail($id);

    // OPTIONAL: delete related records if needed
    // $personalInfo->familyBackground()->delete();
    // $personalInfo->children()->delete();
    // $personalInfo->educationalBackgrounds()->delete();

    $personalInfo->delete();

    return redirect()
        ->route('personal-info.index')
        ->with('success', 'Personal Data Sheet deleted successfully.');
}




}
