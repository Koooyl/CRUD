{{-- ================= I. PERSONAL INFORMATION ================= --}}

{{-- ================= NAME ================= --}}
<div class="mb-10">
    <h3 class="text-sm font-semibold text-gray-600 mb-4">Name</h3>

    <div class="grid grid-cols-12 gap-4">
        <label class="col-span-12 md:col-span-4 text-sm font-medium text-gray-700">
            Complete Name
        </label>

        <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-4 gap-4">
            <input name="surname" value="{{ $personalInfo->surname }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm text-gray-800
                          placeholder-gray-400 focus:border-blue-500 focus:bg-white
                          focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Surname">

            <input name="first_name" value="{{ $personalInfo->first_name }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm text-gray-800
                          placeholder-gray-400 focus:border-blue-500 focus:bg-white
                          focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="First Name">

            <input name="middle_name" value="{{ $personalInfo->middle_name }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm text-gray-800
                          placeholder-gray-400 focus:border-blue-500 focus:bg-white
                          focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Middle Name">

            <input name="name_extension" value="{{ $personalInfo->name_extension }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm text-gray-800
                          placeholder-gray-400 focus:border-blue-500 focus:bg-white
                          focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Ext. (Jr, III)">
        </div>
    </div>
</div>

{{-- ================= BIRTH DETAILS ================= --}}
<div class="mb-10">
    <h3 class="text-sm font-semibold text-gray-600 mb-4">Birth Details</h3>

    <div class="grid grid-cols-12 gap-4 items-center">
        <label class="col-span-12 md:col-span-4 text-sm font-medium text-gray-700">
            Birth Information
        </label>

        <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <input type="date" name="date_of_birth"
                   value="{{ $personalInfo->date_of_birth }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                          focus:border-blue-500 focus:bg-white focus:outline-none
                          focus:ring-2 focus:ring-blue-200 transition">

            <input name="place_of_birth"
                   value="{{ $personalInfo->place_of_birth }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                          focus:border-blue-500 focus:bg-white focus:outline-none
                          focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Place of Birth">

            <select name="sex_at_birth"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition">
                <option value="">Sex</option>
                <option value="Male" @selected($personalInfo->sex_at_birth=='Male')>Male</option>
                <option value="Female" @selected($personalInfo->sex_at_birth=='Female')>Female</option>
            </select>
        </div>
    </div>
</div>

{{-- ================= PHYSICAL INFORMATION ================= --}}
<div class="mb-10">
    <h3 class="text-sm font-semibold text-gray-600 mb-4">Physical Information</h3>

    <div class="grid grid-cols-12 gap-4 items-center">
        <label class="col-span-12 md:col-span-4 text-sm font-medium text-gray-700">
            Physical Attributes
        </label>

        <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-4 gap-4">
            <input name="height_m" value="{{ $personalInfo->height_m }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                          focus:border-blue-500 focus:bg-white focus:outline-none
                          focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Height (m)">

            <input name="weight_kg" value="{{ $personalInfo->weight_kg }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                          focus:border-blue-500 focus:bg-white focus:outline-none
                          focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Weight (kg)">

            <input name="blood_type" value="{{ $personalInfo->blood_type }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                          focus:border-blue-500 focus:bg-white focus:outline-none
                          focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Blood Type">

            <input name="civil_status" value="{{ $personalInfo->civil_status }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                          focus:border-blue-500 focus:bg-white focus:outline-none
                          focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Civil Status">
        </div>
    </div>
</div>

{{-- ================= GOVERNMENT IDS ================= --}}
<div class="mb-12">
    <h3 class="text-sm font-semibold text-gray-600 mb-4">
        Government Identification Numbers
    </h3>

    <div class="grid grid-cols-12 gap-4">
        <label class="col-span-12 md:col-span-4 text-sm font-medium text-gray-700">
            ID Numbers
        </label>

        <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ([
                'umid_no' => 'UMID No',
                'pagibig_no' => 'Pag-IBIG No',
                'philhealth_no' => 'PhilHealth No',
                'philsys_no' => 'PhilSys No',
                'tin_no' => 'TIN No',
                'agency_employee_no' => 'Agency Employee No',
            ] as $field => $label)
                <input
                    name="{{ $field }}"
                    value="{{ $personalInfo->$field }}"
                    placeholder="{{ $label }}"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            @endforeach
        </div>
    </div>
</div>

{{-- ================= CITIZENSHIP ================= --}}
<div class="mb-12">
    <h3 class="text-sm font-semibold text-gray-600 mb-4">
        Citizenship
    </h3>

    <div class="grid grid-cols-12 gap-4 items-center">
        <label class="col-span-12 md:col-span-4 text-sm font-medium text-gray-700">
            Citizenship Details
        </label>

        <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="citizenship"
                   value="{{ $personalInfo->citizenship }}"
                   placeholder="Citizenship"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="dual_citizenship_details"
                   value="{{ $personalInfo->dual_citizenship_details }}"
                   placeholder="Dual Citizenship (if any)"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                          focus:border-blue-500 focus:bg-white focus:outline-none
                          focus:ring-2 focus:ring-blue-200 transition">
        </div>
    </div>
</div>

{{-- ================= CONTACT ================= --}}
<div class="mb-12">
    <h3 class="text-sm font-semibold text-gray-600 mb-4">
        Contact Information
    </h3>

    <div class="grid grid-cols-12 gap-4 items-center">
        <label class="col-span-12 md:col-span-4 text-sm font-medium text-gray-700">
            Contact Details
        </label>

        <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <input name="telephone_no"
                   value="{{ $personalInfo->telephone_no }}"
                   placeholder="Telephone No"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="mobile_no"
                   value="{{ $personalInfo->mobile_no }}"
                   placeholder="Mobile No"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input type="email"
                   name="email"
                   value="{{ $personalInfo->email }}"
                   placeholder="Email Address"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
        </div>
    </div>
</div>

{{-- ================= RESIDENTIAL ADDRESS ================= --}}
<div class="mb-12">
    <h3 class="text-sm font-semibold text-gray-600 mb-4">
        Residential Address
    </h3>

    <div class="grid grid-cols-12 gap-4">
        <label class="col-span-12 md:col-span-4 text-sm font-medium text-gray-700">
            Address
        </label>

        <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-4 gap-4">
            <input name="res_house_no" value="{{ $personalInfo->res_house_no }}" placeholder="House / Lot No"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="res_street" value="{{ $personalInfo->res_street }}" placeholder="Street"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="res_subdivision" value="{{ $personalInfo->res_subdivision }}" placeholder="Subdivision"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="res_barangay" value="{{ $personalInfo->res_barangay }}" placeholder="Barangay"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="res_city" value="{{ $personalInfo->res_city }}" placeholder="City / Municipality"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="res_province" value="{{ $personalInfo->res_province }}" placeholder="Province"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="res_zip_code" value="{{ $personalInfo->res_zip_code }}" placeholder="ZIP Code"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
        </div>
    </div>
</div>

{{-- ================= PERMANENT ADDRESS ================= --}}
<div class="mb-12">
    <h3 class="text-sm font-semibold text-gray-600 mb-4">
        Permanent Address
    </h3>

    <div class="grid grid-cols-12 gap-4">
        <label class="col-span-12 md:col-span-4 text-sm font-medium text-gray-700">
            Address
        </label>

        <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-4 gap-4">
            <input name="perm_house_no" value="{{ $personalInfo->perm_house_no }}" placeholder="House / Lot No"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="perm_street" value="{{ $personalInfo->perm_street }}" placeholder="Street"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="perm_subdivision" value="{{ $personalInfo->perm_subdivision }}" placeholder="Subdivision"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="perm_barangay" value="{{ $personalInfo->perm_barangay }}" placeholder="Barangay"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="perm_city" value="{{ $personalInfo->perm_city }}" placeholder="City / Municipality"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="perm_province" value="{{ $personalInfo->perm_province }}" placeholder="Province"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            <input name="perm_zip_code" value="{{ $personalInfo->perm_zip_code }}" placeholder="ZIP Code"  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
        </div>
    </div>
</div>

