@extends('layouts.app')

@section('header')
Eligibility
@endsection

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 shadow rounded">

    <form method="POST" action="{{ route('eligibility.store') }}" class="space-y-6">
        @csrf

        <input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

        <div>
            <label class="block text-sm font-medium mb-1">Eligibility Type</label>
            <input type="text" name="eligibility_type"
                class="w-full border p-2 rounded" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Rating</label>
                <input type="text" name="rating"
                    class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Date of Exam</label>
                <input type="date" name="date_of_exam"
                    class="w-full border p-2 rounded">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Place of Exam</label>
            <input type="text" name="place_of_exam"
                class="w-full border p-2 rounded">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">License Number</label>
                <input type="text" name="license_number"
                    class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">License Validity</label>
                <input type="date" name="license_validity"
                    class="w-full border p-2 rounded">
            </div>
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ url()->previous() }}" class="text-gray-600 underline">
                ← Back
            </a>

            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded">
                Next →
            </button>
        </div>

    </form>
</div>
@endsection
