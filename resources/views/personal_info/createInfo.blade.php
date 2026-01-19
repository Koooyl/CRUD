@extends('layouts.app')

@section('header')
<div class="flex flex-col gap-1">
    <h1 class="text-2xl font-semibold text-gray-800">Create Personal Information</h1>
    <p class="text-sm text-gray-500">Please fill out all required personal details</p>
</div>
@endsection

@section('content')
<form method="POST" action="/personal-info/store" class="space-y-10">
    @csrf

    {{-- CARD WRAPPER --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 space-y-8">

        {{-- NAME --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Personal Details</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-input label="Surname" name="surname" />
                <x-input label="First Name" name="first_name" />
                <x-input label="Middle Name" name="middle_name" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                <x-input label="Name Extension" name="name_extension" />
                <x-input label="Date of Birth" name="date_of_birth" type="date" />
                <x-input label="Place of Birth" name="place_of_birth" />
            </div>
        </div>

        {{-- BASIC INFO --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Basic Information</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="form-label">Sex</label>
                    <select name="sex_at_birth" class="form-select">
                        <option value="">Select</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <x-input label="Civil Status" name="civil_status" />
                <x-input label="Citizenship" name="citizenship" />
            </div>
        </div>

        {{-- PHYSICAL --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Physical Attributes</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-input label="Height (m)" name="height_m" type="number" step="0.01" />
                <x-input label="Weight (kg)" name="weight_kg" type="number" />
                <x-input label="Blood Type" name="blood_type" />
            </div>
        </div>

        {{-- GOVERNMENT IDS --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Government IDs</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-input label="UMID No" name="umid_no" />
                <x-input label="PAG-IBIG No" name="pagibig_no" />
                <x-input label="PhilHealth No" name="philhealth_no" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                <x-input label="PhilSys No" name="philsys_no" />
                <x-input label="TIN No" name="tin_no" />
                <x-input label="Agency Employee No" name="agency_employee_no" />
            </div>
        </div>

        {{-- CONTACT --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Contact Information</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-input label="Telephone No" name="telephone_no" />
                <x-input label="Mobile No" name="mobile_no" />
                <x-input label="Email" name="email" type="email" />
            </div>
        </div>

        {{-- RESIDENTIAL ADDRESS --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Residential Address</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-input placeholder="House No" name="res_house_no" />
                <x-input placeholder="Street" name="res_street" />
                <x-input placeholder="Subdivision" name="res_subdivision" />
                <x-input placeholder="Barangay" name="res_barangay" />
                <x-input placeholder="City" name="res_city" />
                <x-input placeholder="Province" name="res_province" />
                <x-input placeholder="Zip Code" name="res_zip_code" />
            </div>
        </div>

        {{-- PERMANENT ADDRESS --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Permanent Address</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-input placeholder="House No" name="perm_house_no" />
                <x-input placeholder="Street" name="perm_street" />
                <x-input placeholder="Subdivision" name="perm_subdivision" />
                <x-input placeholder="Barangay" name="perm_barangay" />
                <x-input placeholder="City" name="perm_city" />
                <x-input placeholder="Province" name="perm_province" />
                <x-input placeholder="Zip Code" name="perm_zip_code" />
            </div>
        </div>

        {{-- SUBMIT --}}
        <div class="flex justify-end pt-6 border-t">
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-2.5 rounded-lg font-medium shadow-sm"
            >
                Next
            </button>
        </div>
    </div>
</form>
@endsection
