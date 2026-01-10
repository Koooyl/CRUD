{{-- TABLE HEADER (DESKTOP ONLY) --}}
<div class="hidden md:grid grid-cols-12 gap-4 mb-2 text-xs font-semibold text-gray-600">
    <div class="col-span-6">Full Name</div>
    <div class="col-span-3">Date of Birth</div>
    <div class="col-span-3">Not Applicable</div>
</div>

@forelse($personalInfo->familyBackground->children ?? [] as $i => $child)
    <div class="grid grid-cols-12 gap-4 items-center mb-3">

        {{-- CHILD ID --}}
        <input type="hidden"
               name="children[{{ $i }}][id]"
               value="{{ $child->id }}">

        {{-- FULL NAME --}}
        <div class="col-span-12 md:col-span-6">
            <input type="text"
                   name="children[{{ $i }}][full_name]"
                   value="{{ $child->full_name }}"
                   placeholder="Child’s Full Name"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition">
        </div>

        {{-- DATE OF BIRTH --}}
        <div class="col-span-12 md:col-span-3">
            <input type="date"
                   name="children[{{ $i }}][date_of_birth]"
                   value="{{ $child->date_of_birth }}"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                >
        </div>

        {{-- NOT APPLICABLE --}}
        <div class="col-span-12 md:col-span-3 flex items-center gap-2">
            <input type="checkbox"
                   name="children[{{ $i }}][is_not_applicable]"
                   value="1"
                   class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm
                           focus:border-blue-500 focus:bg-white focus:outline-none
                           focus:ring-2 focus:ring-blue-200 transition"
                   @checked($child->is_not_applicable)>

            <span class="text-sm text-gray-700">
                N/A
            </span>
        </div>

    </div>
@empty
    <p class="text-sm text-gray-500">
        No children records available.
    </p>
@endforelse