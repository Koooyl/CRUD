@extends('layouts.app')

@section('header')
Family Background
@endsection

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 shadow rounded">

    <form method="POST" action="{{ route('family_background.store') }}" class="space-y-8">
        @csrf

        {{-- LINK TO PERSONAL INFO --}}
        <input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

        {{-- SPOUSE INFORMATION --}}
        <h3 class="font-semibold text-lg border-b pb-1">
                Spouse Information
            </h3>

            <label class="flex items-center gap-2 mb-3">
                <input type="checkbox" id="spouse_na" name="spouse_not_applicable" value="1"
                    onclick="toggleSpouse()">
                <span>Not Applicable</span>
            </label>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <input type="text" name="spouse_surname" placeholder="Surname" class="border p-2">
            <input type="text" name="spouse_first_name" placeholder="First Name" class="border p-2">
            <input type="text" name="spouse_middle_name" placeholder="Middle Name" class="border p-2">

            <input type="text" name="spouse_name_extension" placeholder="Name Extension (Jr., III)" class="border p-2">
            <input type="text" name="spouse_occupation" placeholder="Occupation" class="border p-2">
            <input type="text" name="spouse_employer" placeholder="Employer / Business Name" class="border p-2">

            <input type="text" name="spouse_business_address" placeholder="Business Address" class="border p-2 col-span-2">
            <input type="text" name="spouse_telephone" placeholder="Telephone No." class="border p-2">
        </div>

        {{-- FATHER INFORMATION --}}
        <h3 class="font-semibold text-lg border-b pb-1">Father's Information</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <input type="text" name="father_surname" placeholder="Surname" class="border p-2">
            <input type="text" name="father_first_name" placeholder="First Name" class="border p-2">
            <input type="text" name="father_middle_name" placeholder="Middle Name" class="border p-2">
            <input type="text" name="father_name_extension" placeholder="Name Extension" class="border p-2">
        </div>

        {{-- MOTHER INFORMATION --}}
        <h3 class="font-semibold text-lg border-b pb-1">Mother's Information</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <input type="text" name="mother_maiden_surname" placeholder="Maiden Surname" class="border p-2">
            <input type="text" name="mother_first_name" placeholder="First Name" class="border p-2">
            <input type="text" name="mother_middle_name" placeholder="Middle Name" class="border p-2">
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="flex justify-between pt-6">
            <a href="/personal-info" class="text-gray-600 underline">
                ← Back
            </a>

            <button type="submit"
                class="bg-green-600 text-white px-6 py-2 rounded">
                Next
            </button>
        </div>

    </form>
</div>

<script>
function toggleSpouse() {
    const checked = document.getElementById('spouse_na').checked;
    document.querySelectorAll('#spouse_fields input')
        .forEach(input => {
            input.disabled = checked;
            if (checked) input.value = '';
        });
}
</script>

@endsection
