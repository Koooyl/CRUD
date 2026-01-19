@extends('layouts.app')

@section('header')
<div class="flex flex-col gap-1">
    <h1 class="text-2xl font-semibold text-gray-800">Other Information</h1>
    <p class="text-sm text-gray-500">
        Please provide additional information required for your Personal Data Sheet
    </p>
</div>
@endsection

@section('content')
<form method="POST"
      action="{{ route('other-info.store') }}"
      class="max-w-4xl mx-auto">
    @csrf

    <input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 space-y-8">

        {{-- SPECIAL SKILLS --}}
        <div>
            <label class="form-label">
                Special Skills and Hobbies
            </label>
            <textarea
                name="special_skills"
                rows="4"
                class="form-input"
                placeholder="e.g. Programming, Graphic Design, Public Speaking, Photography"
            ></textarea>
        </div>

        {{-- NON-ACADEMIC DISTINCTIONS --}}
        <div>
            <label class="form-label">
                Non-Academic Distinctions / Recognition
            </label>
            <textarea
                name="non_academic_distinctions"
                rows="4"
                class="form-input"
                placeholder="e.g. Outstanding Employee Award, Leadership Recognition"
            ></textarea>
        </div>

        {{-- MEMBERSHIP --}}
        <div>
            <label class="form-label">
                Membership in Associations / Organizations
            </label>
            <textarea
                name="membership_in_associations"
                rows="4"
                class="form-input"
                placeholder="e.g. Philippine Computer Society, Toastmasters Club"
            ></textarea>
        </div>

        {{-- ACTIONS --}}
        <div class="flex justify-between pt-6 border-t">
            <a
                href="{{ url()->previous() }}"
                class="text-gray-600 hover:underline"
            >
                ← Back
            </a>

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 transition
                       text-white px-10 py-2.5 rounded-lg
                       font-medium shadow-sm"
            >
                Finish
            </button>
        </div>

    </div>
</form>
@endsection
