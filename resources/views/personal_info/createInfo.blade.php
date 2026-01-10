@extends('layouts.app')

@section('header')
Create Personal Information
@endsection

@section('content')
<form method="POST" action="/personal-info/store" class="space-y-6">
    @csrf

    {{-- NAME --}}
    <div class="grid grid-cols-3 gap-4">
        <div>
            <label>Surname</label>
            <input type="text" name="surname" class="border p-2 w-full">
        </div>

        <div>
            <label>First Name</label>
            <input type="text" name="first_name" class="border p-2 w-full">
        </div>

        <div>
            <label>Middle Name</label>
            <input type="text" name="middle_name" class="border p-2 w-full">
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div>
            <label>Name Extension</label>
            <input type="text" name="name_extension" class="border p-2 w-full">
        </div>

        <div>
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" class="border p-2 w-full">
        </div>

        <div>
            <label>Place of Birth</label>
            <input type="text" name="place_of_birth" class="border p-2 w-full">
        </div>
    </div>

    {{-- BASIC INFO --}}
    <div class="grid grid-cols-3 gap-4">
        <div>
            <label>Sex</label>
            <select name="sex_at_birth" class="border p-2 w-full">
                <option value="">-- Select --</option>
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>

        <div>
            <label>Civil Status</label>
            <input type="text" name="civil_status" class="border p-2 w-full">
        </div>

        <div>
            <label>Citizenship</label>
            <input type="text" name="citizenship" class="border p-2 w-full">
        </div>
    </div>

    {{-- PHYSICAL --}}
    <div class="grid grid-cols-3 gap-4">
        <div>
            <label>Height (m)</label>
            <input type="number" step="0.01" name="height_m" class="border p-2 w-full">
        </div>

        <div>
            <label>Weight (kg)</label>
            <input type="number" name="weight_kg" class="border p-2 w-full">
        </div>

        <div>
            <label>Blood Type</label>
            <input type="text" name="blood_type" class="border p-2 w-full">
        </div>
    </div>

    {{-- GOVERNMENT IDS --}}
    <div class="grid grid-cols-3 gap-4">
        <div>
            <label>UMID No</label>
            <input type="text" name="umid_no" class="border p-2 w-full">
        </div>

        <div>
            <label>PAG-IBIG No</label>
            <input type="text" name="pagibig_no" class="border p-2 w-full">
        </div>

        <div>
            <label>PhilHealth No</label>
            <input type="text" name="philhealth_no" class="border p-2 w-full">
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div>
            <label>PhilSys No</label>
            <input type="text" name="philsys_no" class="border p-2 w-full">
        </div>

        <div>
            <label>TIN No</label>
            <input type="text" name="tin_no" class="border p-2 w-full">
        </div>

        <div>
            <label>Agency Employee No</label>
            <input type="text" name="agency_employee_no" class="border p-2 w-full">
        </div>
    </div>

    {{-- CONTACT --}}
    <div class="grid grid-cols-3 gap-4">
        <div>
            <label>Telephone No</label>
            <input type="text" name="telephone_no" class="border p-2 w-full">
        </div>

        <div>
            <label>Mobile No</label>
            <input type="text" name="mobile_no" class="border p-2 w-full">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" class="border p-2 w-full">
        </div>
    </div>

    {{-- RESIDENTIAL ADDRESS --}}
    <h3 class="font-semibold">Residential Address</h3>
    <div class="grid grid-cols-3 gap-4">
        <input placeholder="House No" name="res_house_no" class="border p-2">
        <input placeholder="Street" name="res_street" class="border p-2">
        <input placeholder="Subdivision" name="res_subdivision" class="border p-2">
        <input placeholder="Barangay" name="res_barangay" class="border p-2">
        <input placeholder="City" name="res_city" class="border p-2">
        <input placeholder="Province" name="res_province" class="border p-2">
        <input placeholder="Zip Code" name="res_zip_code" class="border p-2">
    </div>

    {{-- PERMANENT ADDRESS --}}
    <h3 class="font-semibold">Permanent Address</h3>
    <div class="grid grid-cols-3 gap-4">
        <input placeholder="House No" name="perm_house_no" class="border p-2">
        <input placeholder="Street" name="perm_street" class="border p-2">
        <input placeholder="Subdivision" name="perm_subdivision" class="border p-2">
        <input placeholder="Barangay" name="perm_barangay" class="border p-2">
        <input placeholder="City" name="perm_city" class="border p-2">
        <input placeholder="Province" name="perm_province" class="border p-2">
        <input placeholder="Zip Code" name="perm_zip_code" class="border p-2">
    </div>

    {{-- SUBMIT --}}
    <div>
        <button
    type="submit"
    class="bg-blue-600 text-white px-6 py-2 rounded"
>
    Next
</button>

    </div>
</form>
@endsection
