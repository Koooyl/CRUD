{{-- TABLE HEADER (DESKTOP ONLY) --}}
<div class="hidden md:grid grid-cols-12 gap-4 mb-2 text-xs font-semibold text-gray-600">
    <div class="col-span-4">Name of Organization</div>
    <div class="col-span-3">Position / Nature of Work</div>
    <div class="col-span-2">From</div>
    <div class="col-span-2">To</div>
    <div class="col-span-1">Hours</div>
</div>

@forelse($personalInfo->voluntaryOrganizations ?? [] as $i => $org)

    <div class="grid grid-cols-12 gap-4 items-center mb-3">

        {{-- ID --}}
        <input type="hidden"
               name="voluntary_orgs[{{ $i }}][id]"
               value="{{ $org->id }}">

        {{-- ORGANIZATION NAME --}}
        <div class="col-span-12 md:col-span-4">
            <input name="voluntary_orgs[{{ $i }}][organization_name]"
                   value="{{ $org->organization_name }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Organization Name">
        </div>

        {{-- POSITION --}}
        <div class="col-span-12 md:col-span-3">
            <input name="voluntary_orgs[{{ $i }}][position]"
                   value="{{ $org->position }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Position / Nature of Work">
        </div>

        {{-- FROM DATE --}}
        <div class="col-span-6 md:col-span-2">
            <input type="date"
                   name="voluntary_orgs[{{ $i }}][from_date]"
                   value="{{ $org->from_date }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition">
        </div>

        {{-- TO DATE --}}
        <div class="col-span-6 md:col-span-2">
            <input type="date"
                   name="voluntary_orgs[{{ $i }}][to_date]"
                   value="{{ $org->to_date }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition">
        </div>

        {{-- NUMBER OF HOURS --}}
        <div class="col-span-12 md:col-span-1">
            <input name="voluntary_orgs[{{ $i }}][number_of_hours]"
                   value="{{ $org->number_of_hours }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   placeholder="Hrs">
        </div>

    </div>

@empty
    <p class="text-sm text-gray-500">
        No voluntary organization records found.
    </p>
@endforelse