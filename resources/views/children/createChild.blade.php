@extends('layouts.app')

@section('header')
<div class="flex flex-col gap-1">
    <h1 class="text-2xl font-semibold text-gray-800">Children Information</h1>
    <p class="text-sm text-gray-500">List all children, if applicable</p>
</div>
@endsection

@section('content')
<form method="POST" action="{{ route('children.store') }}" class="max-w-4xl mx-auto space-y-8">
    @csrf

    <input type="hidden" name="family_background_id" value="{{ $familyBackground->id }}">

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 space-y-8">

        {{-- EXISTING CHILDREN --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Recorded Children</h2>

            @if($familyBackground->children->isEmpty())
                <p class="text-sm italic text-gray-500">No children / Not Applicable</p>
            @else
                <ul class="text-sm text-gray-700 space-y-1">
                    @foreach($familyBackground->children as $child)
                        <li>
                            • {{ $child->full_name }}
                            <span class="text-gray-500">
                                ({{ \Carbon\Carbon::parse($child->date_of_birth)->format('F d, Y') }})
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        {{-- NOT APPLICABLE --}}
        <div class="border rounded-lg p-4 bg-gray-50">
            <p class="text-sm text-gray-600 italic">
                If not applicable (no children), kindly type <strong>N/A</strong> in the input field.
            </p>

        </div>

        {{-- CHILD INPUTS --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Add Children</h2>

            <div id="children_container" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 child-row">
                    <input
                        type="text"
                        name="children[0][full_name]"
                        placeholder="Full Name"
                        class="child-input form-input md:col-span-2"
                    >
                    <input
                        type="date"
                        name="children[0][date_of_birth]"
                        class="child-input form-input"
                    >
                </div>
            </div>

            <button
                type="button"
                onclick="addChild()"
                class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-blue-600 hover:text-blue-700"
            >
                + Add Child
            </button>
        </div>

        {{-- ACTIONS --}}
        <div class="flex justify-between pt-6 border-t">
            <a href="{{ url()->previous() }}"
               class="text-sm text-gray-500 hover:text-gray-700 underline">
                ← Back
            </a>

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 transition text-white px-8 py-2.5 rounded-lg font-medium shadow-sm"
            >
                Save & Next
            </button>
        </div>

    </div>
</form>

{{-- SCRIPT --}}
<script>
let childIndex = 1;

function addChild() {
    const container = document.getElementById('children_container');

    const row = document.createElement('div');
    row.className = 'grid grid-cols-1 md:grid-cols-3 gap-4 child-row items-center';

    row.innerHTML = `
        <input
            type="text"
            name="children[${childIndex}][full_name]"
            placeholder="Full Name"
            class="child-input form-input md:col-span-2"
        >
        <div class="flex gap-2">
            <input
                type="date"
                name="children[${childIndex}][date_of_birth]"
                class="child-input form-input"
            >
            <button
                type="button"
                onclick="this.closest('.child-row').remove()"
                class="text-red-600 text-sm hover:underline"
            >
                Remove
            </button>
        </div>
    `;

    container.appendChild(row);
    childIndex++;
}

function toggleChildren() {
    const checked = document.getElementById('children_na').checked;

    document.querySelectorAll('.child-input').forEach(input => {
        input.disabled = checked;
        input.classList.toggle('bg-gray-100', checked);
        input.classList.toggle('cursor-not-allowed', checked);
        if (checked) input.value = '';
    });
}
</script>
@endsection
