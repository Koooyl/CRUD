<div class="grid grid-cols-1 gap-6">

    {{-- SPECIAL SKILLS --}}
    <div class="rounded-xl border bg-white p-5 shadow-sm">
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Special Skills and Hobbies
        </label>

        <textarea name="special_skills"
                  rows="3"
                  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-800
                         placeholder-gray-400
                         focus:border-blue-500 focus:bg-white
                         focus:outline-none focus:ring-2 focus:ring-blue-200
                         transition resize-none"
                  placeholder="e.g. Computer Programming, Public Speaking, Graphic Design">{{ optional($personalInfo->otherInformation)->special_skills }}</textarea>
    </div>

    {{-- NON-ACADEMIC DISTINCTIONS --}}
    <div class="rounded-xl border bg-white p-5 shadow-sm">
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Non-Academic Distinctions / Recognition
        </label>

        <textarea name="non_academic_distinctions"
                  rows="3"
                  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-800
                         placeholder-gray-400
                         focus:border-blue-500 focus:bg-white
                         focus:outline-none focus:ring-2 focus:ring-blue-200
                         transition resize-none"
                  placeholder="e.g. Outstanding Employee Award, Community Leadership Award">{{ optional($personalInfo->otherInformation)->non_academic_distinctions }}</textarea>
    </div>

    {{-- MEMBERSHIP IN ASSOCIATIONS --}}
    <div class="rounded-xl border bg-white p-5 shadow-sm">
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Membership in Associations / Organizations
        </label>

        <textarea name="membership_in_associations"
                  rows="3"
                  class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-800
                         placeholder-gray-400
                         focus:border-blue-500 focus:bg-white
                         focus:outline-none focus:ring-2 focus:ring-blue-200
                         transition resize-none"
                  placeholder="e.g. Professional Associations, Civic Organizations">{{ optional($personalInfo->otherInformation)->membership_in_associations }}</textarea>
    </div>

</div>
