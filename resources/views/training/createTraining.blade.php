@extends('layouts.app')

@section('header')
<div class="flex flex-col gap-1">
    <h1 class="text-2xl font-semibold text-gray-800">Trainings Attended</h1>
    <p class="text-sm text-gray-500">
        List seminars, trainings, workshops, or learning programs attended
    </p>
</div>
@endsection

@section('content')
<form method="POST"
      action="{{ route('training.store') }}"
      class="max-w-6xl mx-auto space-y-8">
    @csrf

    <input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 space-y-6">

        {{-- TRAINING ROWS --}}
        <div id="training-wrapper" class="space-y-4">

            <div class="train-row grid grid-cols-1 md:grid-cols-6 gap-4 items-end
                        border rounded-lg p-4 bg-gray-50">
                <div class="md:col-span-2">
                    <label class="form-label">Training Title</label>
                    <input
                        name="trainings[0][title]"
                        class="form-input"
                        placeholder="Training / Seminar Title"
                        required
                    >
                </div>

                <div>
                    <label class="form-label">From</label>
                    <input
                        type="date"
                        name="trainings[0][from_date]"
                        class="form-input"
                    >
                </div>

                <div>
                    <label class="form-label">To</label>
                    <input
                        type="date"
                        name="trainings[0][to_date]"
                        class="form-input"
                    >
                </div>

                <div>
                    <label class="form-label">Hours</label>
                    <input
                        name="trainings[0][number_of_hours]"
                        class="form-input"
                        placeholder="No. of Hours"
                    >
                </div>

                <div>
                    <label class="form-label">Conducted By</label>
                    <input
                        name="trainings[0][conducted_by]"
                        class="form-input"
                        placeholder="Training Provider"
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
                onclick="addTraining()"
                class="inline-flex items-center gap-2
                       bg-gray-100 text-gray-700
                       px-4 py-2 rounded-lg
                       hover:bg-gray-200 transition"
            >
                + Add Training
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
let t = 1;

function addTraining() {
    document.getElementById('training-wrapper').insertAdjacentHTML('beforeend', `
        <div class="train-row grid grid-cols-1 md:grid-cols-6 gap-4 items-end
                    border rounded-lg p-4 bg-gray-50">
            <div class="md:col-span-2">
                <label class="form-label">Training Title</label>
                <input
                    name="trainings[${t}][title]"
                    class="form-input"
                    placeholder="Training / Seminar Title"
                    required
                >
            </div>

            <div>
                <label class="form-label">From</label>
                <input
                    type="date"
                    name="trainings[${t}][from_date]"
                    class="form-input"
                >
            </div>

            <div>
                <label class="form-label">To</label>
                <input
                    type="date"
                    name="trainings[${t}][to_date]"
                    class="form-input"
                >
            </div>

            <div>
                <label class="form-label">Hours</label>
                <input
                    name="trainings[${t}][number_of_hours]"
                    class="form-input"
                    placeholder="No. of Hours"
                >
            </div>

            <div>
                <label class="form-label">Conducted By</label>
                <input
                    name="trainings[${t}][conducted_by]"
                    class="form-input"
                    placeholder="Training Provider"
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
    t++;
}

function removeRow(btn) {
    btn.closest('.train-row').remove();
}
</script>
@endsection
