{{-- TABLE HEADER (DESKTOP ONLY) --}}
<div class="hidden md:grid grid-cols-12 gap-4 mb-2 text-xs font-semibold text-gray-600">
    <div class="col-span-3">Eligibility Type</div>
    <div class="col-span-2">Rating</div>
    <div class="col-span-2">Date of Exam</div>
    <div class="col-span-3">Place of Examination</div>
    <div class="col-span-2">License No / Validity</div>
</div>

@forelse($personalInfo->eligibilities ?? [] as $i => $eligibility)

    <div class="grid grid-cols-12 gap-4 items-center mb-3">

        {{-- ID --}}
        <input type="hidden"
               name="eligibilities[{{ $i }}][id]"
               value="{{ $eligibility->id }}">

        {{-- ELIGIBILITY TYPE --}}
        <div class="col-span-12 md:col-span-3">
            <input name="eligibilities[{{ $i }}][eligibility_type]"
                   value="{{ $eligibility->eligibility_type }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Eligibility Type">
        </div>

        {{-- RATING --}}
        <div class="col-span-12 md:col-span-2">
            <input name="eligibilities[{{ $i }}][rating]"
                   value="{{ $eligibility->rating }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Rating">
        </div>

        {{-- DATE OF EXAM --}}
        <div class="col-span-12 md:col-span-2">
            <input type="date"
                   name="eligibilities[{{ $i }}][date_of_exam]"
                   value="{{ $eligibility->date_of_exam }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition">
        </div>

        {{-- PLACE OF EXAM --}}
        <div class="col-span-12 md:col-span-3">
            <input name="eligibilities[{{ $i }}][place_of_exam]"
                   value="{{ $eligibility->place_of_exam }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Place of Examination">
        </div>

        {{-- LICENSE INFO --}}
        <div class="col-span-12 md:col-span-2 grid grid-cols-1 gap-2">
            <input name="eligibilities[{{ $i }}][license_number]"
                   value="{{ $eligibility->license_number }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="License No">

            <input type="date"
                   name="eligibilities[{{ $i }}][license_validity]"
                   value="{{ $eligibility->license_validity }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition">
        </div>

    </div>

@empty
    <p class="text-sm text-gray-500">
        No eligibility records found.
    </p>
@endforelse