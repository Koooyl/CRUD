@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-8 bg-gray-50 text-gray-800">

@php
    function val($v) {
        return $v !== null && $v !== '' ? $v : 'N/A';
    }
@endphp

{{-- HEADER --}}
<div class="flex flex-col md:flex-row justify-between items-center gap-4">
    <h1 class="text-3xl font-bold">Personal Data Sheet (PDS)</h1>

    <div class="flex gap-2">
        <a href="{{ route('personal-info.index') }}"
           class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-100">
            ← Back
        </a>

        <a href="{{ route('pds.export', $personalInfo->id) }}"
           class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
            Export Excel
        </a>
    </div>
</div>

{{-- ================= I. PERSONAL INFORMATION ================= --}}
<section class="bg-white rounded-xl shadow p-6">
    <h2 class="font-semibold text-lg border-b pb-2 mb-4">
        I. Personal Information
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
        <div><strong>Surname:</strong> {{ val($personalInfo->surname) }}</div>
        <div><strong>First Name:</strong> {{ val($personalInfo->first_name) }}</div>
        <div><strong>Middle Name:</strong> {{ val($personalInfo->middle_name) }}</div>

        <div><strong>Name Extension:</strong> {{ val($personalInfo->name_extension) }}</div>
        <div><strong>Date of Birth:</strong> {{ val($personalInfo->date_of_birth) }}</div>
        <div><strong>Place of Birth:</strong> {{ val($personalInfo->place_of_birth) }}</div>

        <div><strong>Sex at Birth:</strong> {{ val($personalInfo->sex_at_birth) }}</div>
        <div><strong>Civil Status:</strong> {{ val($personalInfo->civil_status) }}</div>
        <div><strong>Citizenship:</strong> {{ val($personalInfo->citizenship) }}</div>

        <div><strong>Height (m):</strong> {{ val($personalInfo->height_m) }}</div>
        <div><strong>Weight (kg):</strong> {{ val($personalInfo->weight_kg) }}</div>
        <div><strong>Blood Type:</strong> {{ val($personalInfo->blood_type) }}</div>

        <div><strong>Telephone:</strong> {{ val($personalInfo->telephone_no) }}</div>
        <div><strong>Mobile:</strong> {{ val($personalInfo->mobile_no) }}</div>
        <div><strong>Email:</strong> {{ val($personalInfo->email) }}</div>
    </div>

    <div class="mt-6 text-sm">
        <strong>Residential Address:</strong>
        <p>{{ val($personalInfo->res_house_no) }}, {{ val($personalInfo->res_street) }},
           {{ val($personalInfo->res_barangay) }}, {{ val($personalInfo->res_city) }},
           {{ val($personalInfo->res_province) }}, {{ val($personalInfo->res_zip_code) }}</p>
    </div>

    <div class="mt-3 text-sm">
        <strong>Permanent Address:</strong>
        <p>{{ val($personalInfo->perm_house_no) }}, {{ val($personalInfo->perm_street) }},
           {{ val($personalInfo->perm_barangay) }}, {{ val($personalInfo->perm_city) }},
           {{ val($personalInfo->perm_province) }}, {{ val($personalInfo->perm_zip_code) }}</p>
    </div>
</section>

{{-- ================= II. FAMILY BACKGROUND ================= --}}
<section class="bg-white rounded-xl shadow p-6">
    <h2 class="font-semibold text-lg border-b pb-2 mb-4">
        II. Family Background
    </h2>

    @if($personalInfo->familyBackground)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
            <div><strong>Spouse:</strong> {{ val($personalInfo->familyBackground->spouse_first_name) }}</div>
            <div><strong>Occupation:</strong> {{ val($personalInfo->familyBackground->spouse_occupation) }}</div>
            <div><strong>Employer:</strong> {{ val($personalInfo->familyBackground->spouse_employer) }}</div>

            <div><strong>Father:</strong>
                {{ val($personalInfo->familyBackground->father_first_name) }}
                {{ val($personalInfo->familyBackground->father_surname) }}
            </div>

            <div><strong>Mother:</strong>
                {{ val($personalInfo->familyBackground->mother_first_name) }}
                {{ val($personalInfo->familyBackground->mother_maiden_surname) }}
            </div>
        </div>
    @else
        <p class="italic text-gray-500">No family background data.</p>
    @endif
</section>

{{-- ================= III. CHILDREN ================= --}}
<section class="bg-white rounded-xl shadow p-6">
    <h2 class="font-semibold text-lg border-b pb-2 mb-4">
        III. Children
    </h2>

    @forelse($personalInfo->children as $child)
        <div class="border-b py-2 text-sm">
            @if($child->is_not_applicable)
                <em>Not Applicable</em>
            @else
                <strong>{{ $child->full_name }}</strong> – {{ $child->date_of_birth }}
            @endif
        </div>
    @empty
        <p class="italic text-gray-500">No children records.</p>
    @endforelse
</section>

{{-- ================= IV. EDUCATIONAL BACKGROUND ================= --}}
<section class="bg-white rounded-xl shadow p-6">
    <h2 class="font-semibold text-lg border-b pb-2 mb-4">
        IV. Educational Background
    </h2>

    @forelse($personalInfo->educationalBackgrounds as $edu)
        <div class="border-b py-3 text-sm">
            <strong>{{ $edu->level }}</strong>
            @if($edu->is_not_applicable)
                <div class="italic">Not Applicable</div>
            @else
                <div>School: {{ val($edu->school_name) }}</div>
                <div>Degree: {{ val($edu->degree_course) }}</div>
                <div>Period: {{ val($edu->period_from) }} – {{ val($edu->period_to) }}</div>
                <div>Units: {{ val($edu->highest_level_units) }}</div>
                <div>Year Graduated: {{ val($edu->year_graduated) }}</div>
                <div>Honors: {{ val($edu->honors_received) }}</div>
            @endif
        </div>
    @empty
        <p class="italic text-gray-500">No education records.</p>
    @endforelse
</section>

{{-- ================= V. ELIGIBILITY ================= --}}
<section class="bg-white rounded-xl shadow p-6">
    <h2 class="font-semibold text-lg border-b pb-2 mb-4">
        V. Eligibility
    </h2>

    @forelse($personalInfo->eligibilities as $elig)
        <div class="border-b py-3 text-sm">
            <div><strong>{{ val($elig->eligibility_type) }}</strong></div>
            <div>Rating: {{ val($elig->rating) }}</div>
            <div>Date: {{ val($elig->date_of_exam) }}</div>
            <div>Place: {{ val($elig->place_of_exam) }}</div>
            <div>License #: {{ val($elig->license_number) }}</div>
            <div>Validity: {{ val($elig->license_validity) }}</div>
        </div>
    @empty
        <p class="italic text-gray-500">No eligibility records.</p>
    @endforelse
</section>

{{-- ================= VI. WORK EXPERIENCE ================= --}}
<section class="bg-white rounded-xl shadow p-6">
    <h2 class="font-semibold text-lg border-b pb-2 mb-4">
        VI. Work Experience
    </h2>

    @forelse($personalInfo->workExperiences as $work)
        <div class="border-b py-3 text-sm">
            <strong>{{ val($work->position_title) }}</strong> – {{ val($work->company_name) }}
            <div>{{ val($work->date_from) }} to {{ val($work->date_to) }}</div>
            <div>Monthly Salary: {{ val($work->monthly_salary) }}</div>
        </div>
    @empty
        <p class="italic text-gray-500">No work experience records.</p>
    @endforelse
</section>

{{-- ================= VII. OTHER INFORMATION ================= --}}
<section class="bg-white rounded-xl shadow p-6">
    <h2 class="font-semibold text-lg border-b pb-2 mb-4">
        VII. Other Information
    </h2>

    <p class="text-sm"><strong>Special Skills:</strong> {{ val(optional($personalInfo->otherInformation)->special_skills) }}</p>
    <p class="text-sm"><strong>Non-Academic Distinctions:</strong> {{ val(optional($personalInfo->otherInformation)->non_academic_distinctions) }}</p>
    <p class="text-sm"><strong>Memberships:</strong> {{ val(optional($personalInfo->otherInformation)->membership_in_associations) }}</p>
</section>

</div>
@endsection
