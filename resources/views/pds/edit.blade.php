@extends('layouts.app')

@section('header')
Edit Personal Data Sheet (PDS)
@endsection

@section('content')
<div class="max-w-7xl mx-auto bg-white p-6 shadow rounded">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('pds.update', $personalInfo->id) }}">
        @csrf
        @method('PUT')

        {{-- ================= PERSONAL INFO ================= --}}
        @include('pds.sections.personal-info')

        {{-- ================= FAMILY BACKGROUND ================= --}}
        @include('pds.sections.family-background')

        {{-- ================= CHILDREN ================= --}}
        @include('pds.sections.children')

        {{-- ================= EDUCATIONAL BACKGROUND ================= --}}
        @include('pds.sections.educational-background')

        {{-- ================= ELIGIBILITY ================= --}}
        @include('pds.sections.eligibility')

        {{-- ================= WORK EXPERIENCE ================= --}}
        @include('pds.sections.work-experience')

        {{-- ================= VOLUNTARY ORGANIZATIONS ================= --}}
        @include('pds.sections.voluntary-organizations')

        {{-- ================= TRAININGS ================= --}}
        @include('pds.sections.trainings')

        {{-- ================= OTHER INFORMATION ================= --}}
        @include('pds.sections.other-information')

        {{-- ================= ACTION BUTTONS ================= --}}
        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('personal-info.index') }}"
               class="px-6 py-2 border rounded text-gray-700">
                Cancel
            </a>

            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded">
                Update PDS
            </button>
        </div>

    </form>
</div>
@endsection
