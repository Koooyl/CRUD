{{-- ================= SPOUSE INFORMATION ================= --}}
<div class="mb-12">

    {{-- SPOUSE N/A --}}
    <div class="flex items-center gap-3 mb-6">
        <input type="checkbox"
               name="spouse_not_applicable"
               value="1"
               @checked(optional($personalInfo->familyBackground)->spouse_not_applicable)
               class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500">

        <span class="text-sm font-medium text-gray-700">
            Spouse Not Applicable
        </span>
    </div>

    {{-- SPOUSE INFO --}}
    <div class="grid grid-cols-12 gap-4">
        <label class="col-span-12 md:col-span-4 text-sm font-medium text-gray-700">
            Spouse’s Information
        </label>

        <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-4 gap-4">
            <input name="spouse_surname"
                   value="{{ optional($personalInfo->familyBackground)->spouse_surname }}"
                   placeholder="Surname"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="spouse_first_name"
                   value="{{ optional($personalInfo->familyBackground)->spouse_first_name }}"
                   placeholder="First Name"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="spouse_middle_name"
                   value="{{ optional($personalInfo->familyBackground)->spouse_middle_name }}"
                   placeholder="Middle Name"
                  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="spouse_name_extension"
                   value="{{ optional($personalInfo->familyBackground)->spouse_name_extension }}"
                   placeholder="Ext. (Jr, III)"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="spouse_occupation"
                   value="{{ optional($personalInfo->familyBackground)->spouse_occupation }}"
                   placeholder="Occupation"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="spouse_employer"
                   value="{{ optional($personalInfo->familyBackground)->spouse_employer }}"
                   placeholder="Employer"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="spouse_business_address"
                   value="{{ optional($personalInfo->familyBackground)->spouse_business_address }}"
                   placeholder="Business Address"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="spouse_telephone"
                   value="{{ optional($personalInfo->familyBackground)->spouse_telephone }}"
                   placeholder="Telephone No"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
        </div>
    </div>
</div>

{{-- ================= PARENTS ================= --}}
<div class="mb-12">
    <h3 class="text-sm font-semibold text-gray-600 mb-4">
        Parents
    </h3>

    {{-- FATHER --}}
    <div class="grid grid-cols-12 gap-4 mb-6">
        <label class="col-span-12 md:col-span-4 text-sm font-medium text-gray-700">
            Father’s Name
        </label>

        <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-4 gap-4">
            <input name="father_surname"
                   value="{{ optional($personalInfo->familyBackground)->father_surname }}"
                   placeholder="Surname"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="father_first_name"
                   value="{{ optional($personalInfo->familyBackground)->father_first_name }}"
                   placeholder="First Name"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="father_middle_name"
                   value="{{ optional($personalInfo->familyBackground)->father_middle_name }}"
                   placeholder="Middle Name"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="father_name_extension"
                   value="{{ optional($personalInfo->familyBackground)->father_name_extension }}"
                   placeholder="Ext. (Jr, III)"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
        </div>
    </div>

    {{-- MOTHER --}}
    <div class="grid grid-cols-12 gap-4">
        <label class="col-span-12 md:col-span-4 text-sm font-medium text-gray-700">
            Mother’s Maiden Name
        </label>

        <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <input name="mother_maiden_surname"
                   value="{{ optional($personalInfo->familyBackground)->mother_maiden_surname }}"
                   placeholder="Maiden Surname"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="mother_first_name"
                   value="{{ optional($personalInfo->familyBackground)->mother_first_name }}"
                   placeholder="First Name"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >

            <input name="mother_middle_name"
                   value="{{ optional($personalInfo->familyBackground)->mother_middle_name }}"
                   placeholder="Middle Name"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
        </div>
    </div>
</div>
