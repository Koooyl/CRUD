@extends('layouts.app')

@section('header')
<div class="flex flex-col gap-1">
    <h1 class="text-2xl font-semibold text-gray-800">Voluntary Organizations</h1>
    <p class="text-sm text-gray-500">
        Include voluntary work or civic organizations you were involved in
    </p>
</div>
@endsection

@section('content')
<form method="POST"
      action="{{ route('voluntary.store') }}"
      class="max-w-5xl mx-auto space-y-8">
    @csrf

    <input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 space-y-6">



    
        {{-- ORGANIZATION ROWS --}}
        <div id="org-wrapper" class="space-y-4">

            <div class="org-row grid grid-cols-1 md:grid-cols-6 gap-4 items-end
                        border rounded-lg p-4 bg-gray-50">
                <div class="md:col-span-2">
                    <label class="form-label">Organization Name</label>
                    <input
                        name="organizations[0][organization_name]"
                        class="form-input"
                        placeholder="Organization"
                        required
                    >
                </div>

                <div>
                    <label class="form-label">Position</label>
                    <input
                        name="organizations[0][position]"
                        class="form-input"
                        placeholder="Position"
                    >
                </div>

                <div>
                    <label class="form-label">From</label>
                    <input
                        type="date"
                        name="organizations[0][from_date]"
                        class="form-input"
                    >
                </div>

                <div>
                    <label class="form-label">To</label>
                    <input
                        type="date"
                        name="organizations[0][to_date]"
                        class="form-input"
                    >
                </div>

                <div>
                    <label class="form-label">Hours</label>
                    <input
                        name="organizations[0][number_of_hours]"
                        class="form-input"
                        placeholder="No. of Hours"
                    >
                </div>

                <div class="flex items-center">
                    <button
                        type="button"
                        onclick="removeRow(this)"
                        class="text-red-600 text-sm hover:underline"
                    >
                        Remove
                    </button>
                </div>
            </div>

        </div>

        {{-- ACTIONS --}}
        <div class="flex justify-between pt-6 border-t">
            <button
                type="button"
                onclick="addOrg()"
                class="inline-flex items-center gap-2
                       bg-gray-100 text-gray-700
                       px-4 py-2 rounded-lg
                       hover:bg-gray-200 transition"
            >
                + Add Organization
            </button>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 transition
                       text-white px-8 py-2.5 rounded-lg
                       font-medium shadow-sm"
            >
                Save & Next
            </button>
        </div>

    </div>
</form>

{{-- SCRIPT --}}
<script>
let index = 1;

function addOrg() {
    document.getElementById('org-wrapper').insertAdjacentHTML('beforeend', `
        <div class="org-row grid grid-cols-1 md:grid-cols-6 gap-4 items-end
                    border rounded-lg p-4 bg-gray-50">
            <div class="md:col-span-2">
                <label class="form-label">Organization Name</label>
                <input
                    name="organizations[${index}][organization_name]"
                    class="form-input"
                    placeholder="Organization"
                    required
                >
            </div>

            <div>
                <label class="form-label">Position</label>
                <input
                    name="organizations[${index}][position]"
                    class="form-input"
                    placeholder="Position"
                >
            </div>

            <div>
                <label class="form-label">From</label>
                <input
                    type="date"
                    name="organizations[${index}][from_date]"
                    class="form-input"
                >
            </div>

            <div>
                <label class="form-label">To</label>
                <input
                    type="date"
                    name="organizations[${index}][to_date]"
                    class="form-input"
                >
            </div>

            <div>
                <label class="form-label">Hours</label>
                <input
                    name="organizations[${index}][number_of_hours]"
                    class="form-input"
                    placeholder="No. of Hours"
                >
            </div>

            <div class="flex items-center">
                <button
                    type="button"
                    onclick="removeRow(this)"
                    class="text-red-600 text-sm hover:underline"
                >
                    Remove
                </button>
            </div>
        </div>
    `);
    index++;
}

function removeRow(btn) {
    btn.closest('.org-row').remove();
}
</script>
@endsection
