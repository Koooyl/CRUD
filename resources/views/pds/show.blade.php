@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-10">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Personal Data Sheet (PDS)</h1>

        <a href="{{ route('personal-info.index') }}"
           class="px-4 py-2 border rounded">
            Back to Index
        </a>
    </div>

    {{-- ================= PERSONAL INFORMATION ================= --}}
    <section class="border rounded p-6">
        <h2 class="font-semibold text-lg mb-4">I. Personal Information</h2>

        <div class="grid grid-cols-3 gap-4 text-sm">
            <div><strong>Surname:</strong> {{ $personalInfo->surname }}</div>
            <div><strong>First Name:</strong> {{ $personalInfo->first_name }}</div>
            <div><strong>Middle Name:</strong> {{ $personalInfo->middle_name }}</div>
            <div><strong>Name Extension:</strong> {{ $personalInfo->name_extension }}</div>
            <div><strong>Date of Birth:</strong> {{ $personalInfo->date_of_birth }}</div>
            <div><strong>Place of Birth:</strong> {{ $personalInfo->place_of_birth }}</div>
            <div><strong>Sex at Birth:</strong> {{ $personalInfo->sex_at_birth }}</div>
            <div><strong>Civil Status:</strong> {{ $personalInfo->civil_status }}</div>
            <div><strong>Height (m):</strong> {{ $personalInfo->height_m }}</div>
            <div><strong>Weight (kg):</strong> {{ $personalInfo->weight_kg }}</div>
            <div><strong>Blood Type:</strong> {{ $personalInfo->blood_type }}</div>
            <div><strong>Citizenship:</strong> {{ $personalInfo->citizenship }}</div>
            <div class="col-span-3"><strong>Dual Citizenship Details:</strong> {{ $personalInfo->dual_citizenship_details }}</div>

            <div><strong>UMID No:</strong> {{ $personalInfo->umid_no }}</div>
            <div><strong>PAG-IBIG No:</strong> {{ $personalInfo->pagibig_no }}</div>
            <div><strong>PhilHealth No:</strong> {{ $personalInfo->philhealth_no }}</div>
            <div><strong>PhilSys No:</strong> {{ $personalInfo->philsys_no }}</div>
            <div><strong>TIN No:</strong> {{ $personalInfo->tin_no }}</div>
            <div><strong>Agency Employee No:</strong> {{ $personalInfo->agency_employee_no }}</div>

            <div><strong>Telephone:</strong> {{ $personalInfo->telephone_no }}</div>
            <div><strong>Mobile:</strong> {{ $personalInfo->mobile_no }}</div>
            <div><strong>Email:</strong> {{ $personalInfo->email }}</div>
        </div>

        <h3 class="font-semibold mt-6">Residential Address</h3>
        <p class="text-sm">
            {{ $personalInfo->res_house_no }} {{ $personalInfo->res_street }},
            {{ $personalInfo->res_subdivision }},
            {{ $personalInfo->res_barangay }},
            {{ $personalInfo->res_city }},
            {{ $personalInfo->res_province }},
            {{ $personalInfo->res_zip_code }}
        </p>

        <h3 class="font-semibold mt-4">Permanent Address</h3>
        <p class="text-sm">
            {{ $personalInfo->perm_house_no }} {{ $personalInfo->perm_street }},
            {{ $personalInfo->perm_subdivision }},
            {{ $personalInfo->perm_barangay }},
            {{ $personalInfo->perm_city }},
            {{ $personalInfo->perm_province }},
            {{ $personalInfo->perm_zip_code }}
        </p>
    </section>

    {{-- ================= FAMILY BACKGROUND ================= --}}
    <section class="border rounded p-6">
        <h2 class="font-semibold text-lg mb-4">II. Family Background</h2>

        @if($personalInfo->familyBackground)
            <div class="grid grid-cols-3 gap-4 text-sm">
                <div><strong>Spouse Surname:</strong> {{ $personalInfo->familyBackground->spouse_surname }}</div>
                <div><strong>First Name:</strong> {{ $personalInfo->familyBackground->spouse_first_name }}</div>
                <div><strong>Middle Name:</strong> {{ $personalInfo->familyBackground->spouse_middle_name }}</div>
                <div><strong>Name Extension:</strong> {{ $personalInfo->familyBackground->spouse_name_extension }}</div>
                <div><strong>Occupation:</strong> {{ $personalInfo->familyBackground->spouse_occupation }}</div>
                <div><strong>Employer:</strong> {{ $personalInfo->familyBackground->spouse_employer }}</div>
                <div class="col-span-3"><strong>Business Address:</strong> {{ $personalInfo->familyBackground->spouse_business_address }}</div>
                <div><strong>Telephone:</strong> {{ $personalInfo->familyBackground->spouse_telephone }}</div>
            </div>

            <hr class="my-4">

            <div class="grid grid-cols-3 gap-4 text-sm">
                <div><strong>Father Surname:</strong> {{ $personalInfo->familyBackground->father_surname }}</div>
                <div><strong>First Name:</strong> {{ $personalInfo->familyBackground->father_first_name }}</div>
                <div><strong>Middle Name:</strong> {{ $personalInfo->familyBackground->father_middle_name }}</div>
                <div><strong>Name Extension:</strong> {{ $personalInfo->familyBackground->father_name_extension }}</div>

                <div><strong>Mother Maiden Surname:</strong> {{ $personalInfo->familyBackground->mother_maiden_surname }}</div>
                <div><strong>First Name:</strong> {{ $personalInfo->familyBackground->mother_first_name }}</div>
                <div><strong>Middle Name:</strong> {{ $personalInfo->familyBackground->mother_middle_name }}</div>
            </div>
        @else
            <p class="text-gray-500">No family background data.</p>
        @endif
    </section>

    {{-- ================= CHILDREN ================= --}}
    <section class="border rounded p-6">
        <h2 class="font-semibold text-lg mb-4">III. Children</h2>

        @forelse($personalInfo->children as $child)
            <div class="border-b py-2 text-sm">
                @if($child->is_not_applicable)
                    <em>Not Applicable</em>
                @else
                    <strong>{{ $child->full_name }}</strong> – {{ $child->date_of_birth }}
                @endif
            </div>
        @empty
            <p class="text-gray-500">No children records.</p>
        @endforelse
    </section>

    {{-- ================= EDUCATIONAL BACKGROUND ================= --}}
    <section class="border rounded p-6">
        <h2 class="font-semibold text-lg mb-4">IV. Educational Background</h2>

        @forelse($personalInfo->educationalBackgrounds as $edu)
            <div class="border-b py-3 text-sm">
                <strong>{{ $edu->level }}</strong>

                @if($edu->is_not_applicable)
                    <div class="italic text-gray-500">Not Applicable</div>
                @else
                    <div>School: {{ $edu->school_name }}</div>
                    <div>Degree: {{ $edu->degree_course }}</div>
                    <div>Period: {{ $edu->period_from }} – {{ $edu->period_to }}</div>
                    <div>Highest Units: {{ $edu->highest_level_units }}</div>
                    <div>Year Graduated: {{ $edu->year_graduated }}</div>
                    <div>Honors: {{ $edu->honors_received }}</div>
                @endif
            </div>
        @empty
            <p class="text-gray-500">No education records.</p>
        @endforelse
    </section>

    {{-- ================= ELIGIBILITY ================= --}}
    <section class="border rounded p-6">
        <h2 class="font-semibold text-lg mb-4">V. Eligibility</h2>

        @forelse($personalInfo->eligibilities as $elig)
            <div class="border-b py-2 text-sm">
                <div>{{ $elig->eligibility_type }}</div>
                <div>Rating: {{ $elig->rating }}</div>
                <div>Date: {{ $elig->date_of_exam }}</div>
                <div>Place: {{ $elig->place_of_exam }}</div>
                <div>License #: {{ $elig->license_number }}</div>
                <div>Validity: {{ $elig->license_validity }}</div>
            </div>
        @empty
            <p class="text-gray-500">No eligibility records.</p>
        @endforelse
    </section>

    {{-- ================= WORK EXPERIENCE ================= --}}
    <section class="border rounded p-6">
        <h2 class="font-semibold text-lg mb-4">VI. Work Experience</h2>

        @forelse($personalInfo->workExperiences as $work)
            <div class="border-b py-2 text-sm">
                <div>{{ $work->position_title }} – {{ $work->company_name }}</div>
                <div>{{ $work->date_from }} to {{ $work->date_to }}</div>
                <div>Salary: {{ $work->monthly_salary }}</div>
            </div>
        @empty
            <p class="text-gray-500">No work experience.</p>
        @endforelse
    </section>

    {{-- ================= VOLUNTARY / TRAINING / OTHER ================= --}}
    <section class="border rounded p-6">
        <h2 class="font-semibold text-lg mb-4">VII. Other Information</h2>

        <p><strong>Special Skills:</strong> {{ $personalInfo->otherInformation->special_skills ?? '' }}</p>
        <p><strong>Non-Academic Distinctions:</strong> {{ $personalInfo->otherInformation->non_academic_distinctions ?? '' }}</p>
        <p><strong>Memberships:</strong> {{ $personalInfo->otherInformation->membership_in_associations ?? '' }}</p>
    </section>

</div>
@endsection
