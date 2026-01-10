<h2 class="section-title">I. Personal Information</h2>

<div class="grid grid-cols-4 gap-4">
    <input name="surname" value="{{ $personalInfo->surname }}" placeholder="Surname">
    <input name="first_name" value="{{ $personalInfo->first_name }}" placeholder="First Name">
    <input name="middle_name" value="{{ $personalInfo->middle_name }}" placeholder="Middle Name">
    <input name="name_extension" value="{{ $personalInfo->name_extension }}" placeholder="Ext">

    <input type="date" name="date_of_birth" value="{{ $personalInfo->date_of_birth }}">
    <input name="place_of_birth" value="{{ $personalInfo->place_of_birth }}" placeholder="Place of Birth">

    <select name="sex_at_birth">
        <option value="">Sex</option>
        <option value="Male" @selected($personalInfo->sex_at_birth=='Male')>Male</option>
        <option value="Female" @selected($personalInfo->sex_at_birth=='Female')>Female</option>
    </select>

    <input name="civil_status" value="{{ $personalInfo->civil_status }}" placeholder="Civil Status">

    <input name="height_m" value="{{ $personalInfo->height_m }}" placeholder="Height (m)">
    <input name="weight_kg" value="{{ $personalInfo->weight_kg }}" placeholder="Weight (kg)">
    <input name="blood_type" value="{{ $personalInfo->blood_type }}" placeholder="Blood Type">

    <input name="umid_no" value="{{ $personalInfo->umid_no }}" placeholder="UMID No">
    <input name="pagibig_no" value="{{ $personalInfo->pagibig_no }}" placeholder="Pag-IBIG No">
    <input name="philhealth_no" value="{{ $personalInfo->philhealth_no }}" placeholder="PhilHealth No">
    <input name="philsys_no" value="{{ $personalInfo->philsys_no }}" placeholder="PhilSys No">
    <input name="tin_no" value="{{ $personalInfo->tin_no }}" placeholder="TIN">
    <input name="agency_employee_no" value="{{ $personalInfo->agency_employee_no }}" placeholder="Agency ID">

    <input name="citizenship" value="{{ $personalInfo->citizenship }}" placeholder="Citizenship">
    <input name="dual_citizenship_details" value="{{ $personalInfo->dual_citizenship_details }}" placeholder="Dual Citizenship">

    <input name="telephone_no" value="{{ $personalInfo->telephone_no }}" placeholder="Telephone">
    <input name="mobile_no" value="{{ $personalInfo->mobile_no }}" placeholder="Mobile">
    <input name="email" value="{{ $personalInfo->email }}" placeholder="Email">
</div>

<h3 class="mt-4 font-semibold">Residential Address</h3>
<div class="grid grid-cols-4 gap-4">
    <input name="res_house_no" value="{{ $personalInfo->res_house_no }}" placeholder="House No">
    <input name="res_street" value="{{ $personalInfo->res_street }}" placeholder="Street">
    <input name="res_subdivision" value="{{ $personalInfo->res_subdivision }}" placeholder="Subdivision">
    <input name="res_barangay" value="{{ $personalInfo->res_barangay }}" placeholder="Barangay">
    <input name="res_city" value="{{ $personalInfo->res_city }}" placeholder="City">
    <input name="res_province" value="{{ $personalInfo->res_province }}" placeholder="Province">
    <input name="res_zip_code" value="{{ $personalInfo->res_zip_code }}" placeholder="ZIP">
</div>

<h3 class="mt-4 font-semibold">Permanent Address</h3>
<div class="grid grid-cols-4 gap-4">
    <input name="perm_house_no" value="{{ $personalInfo->perm_house_no }}" placeholder="House No">
    <input name="perm_street" value="{{ $personalInfo->perm_street }}" placeholder="Street">
    <input name="perm_subdivision" value="{{ $personalInfo->perm_subdivision }}" placeholder="Subdivision">
    <input name="perm_barangay" value="{{ $personalInfo->perm_barangay }}" placeholder="Barangay">
    <input name="perm_city" value="{{ $personalInfo->perm_city }}" placeholder="City">
    <input name="perm_province" value="{{ $personalInfo->perm_province }}" placeholder="Province">
    <input name="perm_zip_code" value="{{ $personalInfo->perm_zip_code }}" placeholder="ZIP">
</div>
