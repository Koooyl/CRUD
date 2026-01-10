{{-- TABLE HEADER (DESKTOP ONLY) --}}
<div class="hidden md:grid grid-cols-12 gap-4 mb-2 text-xs font-semibold text-gray-600">
    <div class="col-span-3">Position Title</div>
    <div class="col-span-3">Company / Office</div>
    <div class="col-span-2">Monthly Salary</div>
    <div class="col-span-1">SG</div>
    <div class="col-span-1">Status</div>
    <div class="col-span-1">Gov’t</div>
    <div class="col-span-1">From</div>
    <div class="col-span-1">To</div>
</div>

@forelse($personalInfo->workExperiences ?? [] as $i => $work)

    <div class="grid grid-cols-12 gap-4 items-center mb-3">

        {{-- ID --}}
        <input type="hidden"
               name="work_experiences[{{ $i }}][id]"
               value="{{ $work->id }}">

        {{-- POSITION TITLE --}}
        <div class="col-span-12 md:col-span-3">
            <input name="work_experiences[{{ $i }}][position_title]"
                   value="{{ $work->position_title }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Position Title">
        </div>

        {{-- COMPANY --}}
        <div class="col-span-12 md:col-span-3">
            <input name="work_experiences[{{ $i }}][company_name]"
                   value="{{ $work->company_name }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Company / Office">
        </div>

        {{-- MONTHLY SALARY --}}
        <div class="col-span-12 md:col-span-2">
            <input name="work_experiences[{{ $i }}][monthly_salary]"
                   value="{{ $work->monthly_salary }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Monthly Salary">
        </div>

        {{-- SALARY GRADE --}}
        <div class="col-span-12 md:col-span-1">
            <input name="work_experiences[{{ $i }}][salary_grade]"
                   value="{{ $work->salary_grade }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="SG">
        </div>

        {{-- APPOINTMENT STATUS --}}
        <div class="col-span-12 md:col-span-1">
            <input name="work_experiences[{{ $i }}][appointment_status]"
                   value="{{ $work->appointment_status }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Status">
        </div>

        {{-- GOVERNMENT SERVICE --}}
        <div class="col-span-12 md:col-span-1">
            <input name="work_experiences[{{ $i }}][government_service]"
                   value="{{ $work->government_service }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Y / N">
        </div>

        {{-- DATE FROM --}}
        <div class="col-span-6 md:col-span-1">
            <input type="date"
                   name="work_experiences[{{ $i }}][date_from]"
                   value="{{ $work->date_from }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition">
        </div>

        {{-- DATE TO --}}
        <div class="col-span-6 md:col-span-1">
            <input type="date"
                   name="work_experiences[{{ $i }}][date_to]"
                   value="{{ $work->date_to }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition">
        </div>

    </div>

@empty
    <p class="text-sm text-gray-500">
        No work experience records found.
    </p>
@endforelse