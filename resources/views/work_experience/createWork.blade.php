@extends('layouts.app')

@section('header')
Work Experience
@endsection

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 shadow rounded">

    <form method="POST" action="{{ route('work_experience.store') }}" class="space-y-6">
        @csrf

        <input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

        <div>
            <label class="block text-sm font-medium mb-1">Position Title</label>
            <input type="text" name="position_title"
                class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Company / Agency</label>
            <input type="text" name="company_name"
                class="w-full border p-2 rounded" required>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <input type="number" step="0.01" name="monthly_salary"
                placeholder="Monthly Salary"
                class="border p-2 rounded">

            <input type="text" name="salary_grade"
                placeholder="Salary Grade"
                class="border p-2 rounded">

            <input type="text" name="appointment_status"
                placeholder="Appointment Status"
                class="border p-2 rounded">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <input type="date" name="date_from" class="border p-2 rounded">
            <input type="date" name="date_to" class="border p-2 rounded">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Government Service</label>
            <select name="government_service" class="border p-2 rounded w-full">
                <option value="">-- Select --</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ url()->previous() }}" class="text-gray-600 underline">
                ← Back
            </a>

            <button type="submit"
                class="bg-green-600 text-white px-6 py-2 rounded">
                Save and Next
            </button>
        </div>

    </form>
</div>
@endsection
