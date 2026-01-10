@forelse($personalInfo->educationalBackgrounds ?? [] as $i => $edu)

    <div class="border rounded-lg p-5 mb-6 bg-white">

        {{-- LEVEL HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
            <strong class="text-sm text-gray-800 uppercase">
                {{ $edu->level }}
            </strong>

            <div class="flex items-center gap-2 mt-2 md:mt-0">
                <input type="checkbox"
                       name="education[{{ $i }}][is_not_applicable]"
                       value="1"
                       class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                       @checked($edu->is_not_applicable)>

                <span class="text-sm text-gray-700">
                    Not Applicable
                </span>
            </div>
        </div>

        <input type="hidden"
               name="education[{{ $i }}][id]"
               value="{{ $edu->id }}">

        {{-- SCHOOL NAME --}}
        <div class="grid grid-cols-12 gap-4 mb-3">
            <label class="col-span-12 md:col-span-4 form-label">
                Name of School
            </label>

            <div class="col-span-12 md:col-span-8">
                <input name="education[{{ $i }}][school_name]"
                       value="{{ $edu->school_name }}"
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                       placeholder="Name of School">
            </div>
        </div>

        {{-- DEGREE / COURSE --}}
        <div class="grid grid-cols-12 gap-4 mb-3">
            <label class="col-span-12 md:col-span-4 form-label">
                Degree / Course
            </label>

            <div class="col-span-12 md:col-span-8">
                <input name="education[{{ $i }}][degree_course]"
                       value="{{ $edu->degree_course }}"
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                       placeholder="Degree / Course">
            </div>
        </div>

        {{-- PERIOD ATTENDED --}}
        <div class="grid grid-cols-12 gap-4 mb-3">
            <label class="col-span-12 md:col-span-4 form-label">
                Period Attended
            </label>

            <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                <input name="education[{{ $i }}][period_from]"
                       value="{{ $edu->period_from }}"
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                       placeholder="From">

                <input name="education[{{ $i }}][period_to]"
                       value="{{ $edu->period_to }}"
                      class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                       placeholder="To">
            </div>
        </div>

        {{-- UNITS / YEAR / HONORS --}}
        <div class="grid grid-cols-12 gap-4">
            <label class="col-span-12 md:col-span-4 form-label">
                Additional Details
            </label>

            <div class="col-span-12 md:col-span-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                <input name="education[{{ $i }}][highest_level_units]"
                       value="{{ $edu->highest_level_units }}"
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                       placeholder="Highest Level / Units Earned">

                <input name="education[{{ $i }}][year_graduated]"
                       value="{{ $edu->year_graduated }}"
                      class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                       placeholder="Year Graduated">

                <input name="education[{{ $i }}][honors_received]"
                       value="{{ $edu->honors_received }}"
                       placeholder="Honors Received"
                       class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
            </div>
        </div>

    </div>

@empty
    <p class="text-sm text-gray-500">
        No educational background records found.
    </p>
@endforelse