@extends('layouts.app')

@section('header')
<div class="flex flex-col gap-1">
    <h1 class="text-2xl font-semibold text-gray-800">Eligibility</h1>
    <p class="text-sm text-gray-500">
        Indicate your civil service or professional eligibility
    </p>
</div>
@endsection

@section('content')
<form method="POST"
      action="{{ route('eligibility.store') }}"
      class="max-w-4xl mx-auto space-y-8">
    @csrf

    <input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 space-y-8">

        {{-- ELIGIBILITY TYPE --}}
        <div>
            <label class="form-label">Eligibility Type</label>
            <input
                type="text"
                name="eligibility_type"
                class="form-input"
                placeholder="e.g. Civil Service Professional"
                required
            >
        </div>

        {{-- RATING & DATE --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="form-label">Rating</label>
                <input
                    type="text"
                    name="rating"
                    class="form-input"
                    placeholder="e.g. 85.40%"
                >
            </div>

            <div>
                <label class="form-label">Date of Examination</label>
                <input
                    type="date"
                    name="date_of_exam"
                    class="form-input"
                >
            </div>
        </div>

        {{-- PLACE --}}
        <div>
            <label class="form-label">Place of Examination</label>
            <input
                type="text"
                name="place_of_exam"
                class="form-input"
                placeholder="City / Province"
            >
        </div>

        {{-- LICENSE --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="form-label">License Number</label>
                <input
                    type="text"
                    name="license_number"
                    class="form-input"
                >
            </div>

            <div>
                <label class="form-label">License Validity</label>
                <input
                    type="date"
                    name="license_validity"
                    class="form-input"
                >
            </div>
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
                class="bg-blue-600 hover:bg-blue-700 transition
                       text-white px-8 py-2.5 rounded-lg
                       font-medium shadow-sm"
            >
                Next →
            </button>
        </div>

    </div>
</form>
@endsection
