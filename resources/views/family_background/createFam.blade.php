@extends('layouts.app')

@section('header')
<div class="flex flex-col gap-1">
    <h1 class="text-2xl font-semibold text-gray-800">Family Background</h1>
    <p class="text-sm text-gray-500">Provide spouse and parent information</p>
</div>
@endsection

@section('content')
<form method="POST" action="{{ route('family_background.store') }}" class="max-w-5xl mx-auto space-y-10">
    @csrf

    {{-- LINK TO PERSONAL INFO --}}
    <input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

    {{-- CARD --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 space-y-10">

        {{-- SPOUSE INFORMATION --}}
        <div>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Spouse Information</h2>

                <p class="text-sm text-gray-600 italic">
                    If not applicable, kindly type <strong>N/A</strong> in the input field.
                </p>

            </div>

            <div id="spouse_fields" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-input name="spouse_surname" placeholder="Surname" />
                <x-input name="spouse_first_name" placeholder="First Name" />
                <x-input name="spouse_middle_name" placeholder="Middle Name" />

                <x-input name="spouse_name_extension" placeholder="Name Extension (Jr., III)" />
                <x-input name="spouse_occupation" placeholder="Occupation" />
                <x-input name="spouse_employer" placeholder="Employer / Business Name" />

                <x-input
                    name="spouse_business_address"
                    placeholder="Business Address"
                    class="md:col-span-2"
                />
                <x-input name="spouse_telephone" placeholder="Telephone No." />
            </div>
        </div>

        {{-- FATHER --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Father's Information</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-input name="father_surname" placeholder="Surname" />
                <x-input name="father_first_name" placeholder="First Name" />
                <x-input name="father_middle_name" placeholder="Middle Name" />
                <x-input name="father_name_extension" placeholder="Name Extension" />
            </div>
        </div>

        {{-- MOTHER --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Mother's Information</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-input name="mother_maiden_surname" placeholder="Maiden Surname" />
                <x-input name="mother_first_name" placeholder="First Name" />
                <x-input name="mother_middle_name" placeholder="Middle Name" />
            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="flex items-center justify-between pt-6 border-t">
            <a href="/personal-info"
               class="text-sm text-gray-500 hover:text-gray-700 underline">
                ← Back
            </a>

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 transition text-white px-8 py-2.5 rounded-lg font-medium shadow-sm"
            >
                Next
            </button>
        </div>

    </div>
</form>

{{-- SCRIPT --}}
<script>
function toggleSpouse() {
    const checked = document.getElementById('spouse_na').checked;
    const spouseFields = document.querySelectorAll('#spouse_fields input');

    spouseFields.forEach(input => {
        input.disabled = checked;
        input.classList.toggle('bg-gray-100', checked);
        input.classList.toggle('cursor-not-allowed', checked);
        if (checked) input.value = '';
    });
}
</script>
@endsection
