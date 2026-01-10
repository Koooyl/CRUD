{{-- TABLE HEADER (DESKTOP ONLY) --}}
<div class="hidden md:grid grid-cols-12 gap-4 mb-2 text-xs font-semibold text-gray-600">
    <div class="col-span-5">Title of Learning & Development Interventions / Trainings</div>
    <div class="col-span-2">From</div>
    <div class="col-span-2">To</div>
    <div class="col-span-1">Hours</div>
    <div class="col-span-2">Conducted / Sponsored By</div>
</div>

@forelse($personalInfo->trainings ?? [] as $i => $training)

    <div class="grid grid-cols-12 gap-4 items-center mb-3">

        {{-- ID --}}
        <input type="hidden"
               name="trainings[{{ $i }}][id]"
               value="{{ $training->id }}">

        {{-- TRAINING TITLE --}}
        <div class="col-span-12 md:col-span-5">
            <input name="trainings[{{ $i }}][title]"
                   value="{{ $training->title }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Training / Seminar / Workshop Title">
        </div>

        {{-- FROM DATE --}}
        <div class="col-span-6 md:col-span-2">
            <input type="date"
                   name="trainings[{{ $i }}][from_date]"
                   value="{{ $training->from_date }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition">
        </div>

        {{-- TO DATE --}}
        <div class="col-span-6 md:col-span-2">
            <input type="date"
                   name="trainings[{{ $i }}][to_date]"
                   value="{{ $training->to_date }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition">
        </div>

        {{-- NUMBER OF HOURS --}}
        <div class="col-span-6 md:col-span-1">
            <input name="trainings[{{ $i }}][number_of_hours]"
                   value="{{ $training->number_of_hours }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Hrs">
        </div>

        {{-- CONDUCTED BY --}}
        <div class="col-span-12 md:col-span-2">
            <input name="trainings[{{ $i }}][conducted_by]"
                   value="{{ $training->conducted_by }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Conducted / Sponsored By">
        </div>

    </div>

@empty
    <p class="text-sm text-gray-500">
        No training records found.
    </p>
@endforelse