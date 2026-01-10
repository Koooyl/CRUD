@extends('layouts.app')

@section('header') Trainings Attended @endsection

@section('content')
<form method="POST" action="{{ route('training.store') }}">
@csrf
<input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

<div id="training-wrapper">
    <div class="train-row border p-4 mb-4">
        <input name="trainings[0][title]" placeholder="Training Title" required>
        <input type="date" name="trainings[0][from_date]">
        <input type="date" name="trainings[0][to_date]">
        <input name="trainings[0][number_of_hours]" placeholder="Hours">
        <input name="trainings[0][conducted_by]" placeholder="Conducted By">
        <button type="button" onclick="removeRow(this)">Remove</button>
    </div>
</div>

<div class="flex justify-between mt-6">
    <button
        type="button"
        onclick="addTraining()"
        class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
        + Add Training
    </button>

    <button
        type="submit"
        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
        Save & Next
    </button>
</div>

</form>

<script>
let t = 1;
function addTraining() {
    document.getElementById('training-wrapper').insertAdjacentHTML('beforeend', `
    <div class="train-row border p-4 mb-4">
        <input name="trainings[${t}][title]" required>
        <input type="date" name="trainings[${t}][from_date]">
        <input type="date" name="trainings[${t}][to_date]">
        <input name="trainings[${t}][number_of_hours]">
        <input name="trainings[${t}][conducted_by]">
        <button type="button" onclick="removeRow(this)">Remove</button>
    </div>`);
    t++;
}
function removeRow(btn){ btn.parentElement.remove(); }
</script>
@endsection
