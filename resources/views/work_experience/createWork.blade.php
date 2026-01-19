@extends('layouts.app')

@section('header')
<div class="flex flex-col gap-1">
    <h1 class="text-2xl font-semibold text-gray-800">Work Experience</h1>
    <p class="text-sm text-gray-500">
        List your most recent work experience
    </p>
</div>
@endsection

@section('content')
<form method="POST"
      action="{{ route('work_experience.store') }}"
      class="max-w-4xl mx-auto space-y-8">
    @csrf

    <input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 space-y-8">

        {{-- POSITION --}}
        <div>
            <label class="form-label">Position Title</label>
            <input
                type="text"
                name="position_title"
                class="form-input"
                placeholder="e.g. Administrative Officer"
                required
            >
        </div>

        {{-- COMPANY --}}
        <div>
            <label class="form-label">Company / Agency</label>
            <input
                type="text"
                name="company_name"
                class="form-input"
                placeholder="Department / Office / Company Name"
                required
            >
        </div>

        {{-- SALARY DETAILS --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="form-label">Monthly Salary</label>
                <input
                    type="number"
                    step="0.01"
                    name="monthly_salary"
                    class="form-input"
                    placeholder="₱"
                >
            </div>

            <div>
                <label class="form-label">Salary Grade</label>
                <input
                    type="text"
                    name="salary_grade"
                    class="form-input"
                    placeholder="SG-11"
                >
            </div>

            <div>
                <label class="form-label">Appointment Status</label>
                <input
                    type="text"
                    name="appointment_status"
                    class="form-input"
                    placeholder="Permanent / Contractual"
                >
            </div>
        </div>

        {{-- DATE RANGE --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="form-label">Date From</label>
                <input
                    type="date"
                    name="date_from"
                    class="form-input"
                >
            </div>

            <div>
                <label class="form-label">Date To</label>
                <input
                    type="date"
                    name="date_to"
                    class="form-input"
                >
            </div>
        </div>

        {{-- GOVERNMENT SERVICE --}}
        <div>
            <label class="form-label">Government Service</label>
            <select
                name="government_service"
                class="form-input"
            >
                <option value="">Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>

        {{-- ACTIONS --}}
        <div class="flex justify-between pt-6 border-t">
            <a
                href="{{ url()->previous() }}"
                class="text-sm text-gray-500 hover:text-gray-700 underline"
            >
                ← Back
            </a>

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 transition
                       text-white px-8 py-2.5 rounded-lg
                       font-medium shadow-sm"
            >
                Save & Next
            </button>
        </div>

    </div>
</form>
@endsection
