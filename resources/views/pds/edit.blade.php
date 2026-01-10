@extends('layouts.app')

@section('header')
Edit Personal Data Sheet (PDS)
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">

    {{-- PAGE HEADER --}}
    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Edit Personal Data Sheet
            </h1>
            <p class="text-sm text-gray-500">
                Please review and update all required fields before saving.
            </p>
        </div>

        <a href="{{ route('personal-info.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
            ← Back to List
        </a>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg">
            <strong>Success:</strong> {{ session('success') }}
        </div>
    @endif

    {{-- FORM --}}
    <form method="POST"
          action="{{ route('pds.update', $personalInfo->id) }}"
          class="space-y-10">
        @csrf
        @method('PUT')

        {{-- ================= PERSONAL INFO ================= --}}
        <section class="bg-white rounded-xl shadow-sm border">
            <div class="px-6 py-4 border-b font-semibold text-lg">
                I. Personal Information
            </div>
            <div class="p-6">
                @include('pds.sections.personal-info')
            </div>
        </section>

        {{-- ================= FAMILY BACKGROUND ================= --}}
        <section class="bg-white rounded-xl shadow-sm border">
            <div class="px-6 py-4 border-b font-semibold text-lg">
                II. Family Background
            </div>
            <div class="p-6">
                @include('pds.sections.family-background')
            </div>
        </section>

        {{-- ================= CHILDREN ================= --}}
        <section class="bg-white rounded-xl shadow-sm border">
            <div class="px-6 py-4 border-b font-semibold text-lg">
                III. Children
            </div>
            <div class="p-6">
                @include('pds.sections.children')
            </div>
        </section>

        {{-- ================= EDUCATIONAL BACKGROUND ================= --}}
        <section class="bg-white rounded-xl shadow-sm border">
            <div class="px-6 py-4 border-b font-semibold text-lg">
                IV. Educational Background
            </div>
            <div class="p-6">
                @include('pds.sections.educational-background')
            </div>
        </section>

        {{-- ================= ELIGIBILITY ================= --}}
        <section class="bg-white rounded-xl shadow-sm border">
            <div class="px-6 py-4 border-b font-semibold text-lg">
                V. Eligibility
            </div>
            <div class="p-6">
                @include('pds.sections.eligibility')
            </div>
        </section>

        {{-- ================= WORK EXPERIENCE ================= --}}
        <section class="bg-white rounded-xl shadow-sm border">
            <div class="px-6 py-4 border-b font-semibold text-lg">
                VI. Work Experience
            </div>
            <div class="p-6">
                @include('pds.sections.work-experience')
            </div>
        </section>

        {{-- ================= VOLUNTARY ORGANIZATIONS ================= --}}
        <section class="bg-white rounded-xl shadow-sm border">
            <div class="px-6 py-4 border-b font-semibold text-lg">
                VII. Voluntary Organizations
            </div>
            <div class="p-6">
                @include('pds.sections.voluntary-organizations')
            </div>
        </section>

        {{-- ================= TRAININGS ================= --}}
        <section class="bg-white rounded-xl shadow-sm border">
            <div class="px-6 py-4 border-b font-semibold text-lg">
                VIII. Trainings
            </div>
            <div class="p-6">
                @include('pds.sections.trainings')
            </div>
        </section>

        {{-- ================= OTHER INFORMATION ================= --}}
        <section class="bg-white rounded-xl shadow-sm border">
            <div class="px-6 py-4 border-b font-semibold text-lg">
                IX. Other Information
            </div>
            <div class="p-6">
                @include('pds.sections.other-information')
            </div>
        </section>

        {{-- ================= ACTION BUTTONS ================= --}}
        <div class="sticky bottom-0 bg-white border-t pt-4 flex justify-end gap-4">
            <a href="{{ route('personal-info.index') }}"
               class="px-6 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                Update PDS
            </button>
        </div>

    </form>
</div>
@endsection
