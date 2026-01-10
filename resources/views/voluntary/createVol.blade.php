@extends('layouts.app')

@section('header') Voluntary Organizations @endsection

@section('content')
<form method="POST" action="{{ route('voluntary.store') }}">
@csrf
<input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

<div id="org-wrapper">
    <div class="org-row border p-4 mb-4">
        <input name="organizations[0][organization_name]" placeholder="Organization" required>
        <input name="organizations[0][position]" placeholder="Position">
        <input type="date" name="organizations[0][from_date]">
        <input type="date" name="organizations[0][to_date]">
        <input name="organizations[0][number_of_hours]" placeholder="Hours">
        <button type="button" onclick="removeRow(this)">Remove</button>
    </div>
</div>

<div class="flex justify-between mt-6">
    <button
        type="button"
        onclick="addOrg()"
        class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
        + Add Organization
    </button>

    <button
        type="submit"
        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
        Save & Next
    </button>
</div>

</form>

<script>
let index = 1;
function addOrg() {
    document.getElementById('org-wrapper').insertAdjacentHTML('beforeend', `
    <div class="org-row border p-4 mb-4">
        <input name="organizations[${index}][organization_name]" placeholder="Organization" required>
        <input name="organizations[${index}][position]" placeholder="Position">
        <input type="date" name="organizations[${index}][from_date]">
        <input type="date" name="organizations[${index}][to_date]">
        <input name="organizations[${index}][number_of_hours]" placeholder="Hours">
        <button type="button" onclick="removeRow(this)">Remove</button>
    </div>`);
    index++;
}
function removeRow(btn){ btn.parentElement.remove(); }
</script>
@endsection
