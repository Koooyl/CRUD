@extends('layouts.app')

@section('header')
Children Information
@endsection

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 shadow rounded">

    <form method="POST" action="{{ route('children.store') }}">
        @csrf

        <input type="hidden" name="family_background_id" value="{{ $familyBackground->id }}">

        <h3 class="font-semibold text-lg border-b pb-2 mb-4">
            Children Information
        </h3>

        <div id="children-wrapper" class="space-y-4">


        @if($familyBackground->children->isEmpty())
                <em>No children / Not Applicable</em>
            @else
                @foreach($familyBackground->children as $child)
                    {{ $child->full_name }} ({{ $child->date_of_birth }})
                @endforeach
            @endif
            
            <div class="border p-4 rounded bg-gray-50">
                <label class="flex items-center space-x-2">
                    <input
                        type="checkbox"
                        name="children_na"
                        value="1"
                        id="children_na"
                        onchange="toggleChildren(this)"
                    >
                    <span class="font-medium">
                        Not Applicable (No Children)
                    </span>
                </label>
            </div>

            


            {{-- FIRST CHILD --}}
            <div id="children_container">
                    <div class="grid grid-cols-2 gap-4 child-row mb-3">
                        <input type="text" name="children[0][full_name]" class="child-input">
                        <input type="date" name="children[0][date_of_birth]" class="child-input">
                    </div>
                </div>


                <button type="button"
                    class="remove-child text-red-600 underline text-sm">
                    Remove
                </button>
            </div>

        </div>

       <div class="flex justify-between mt-4">
                <button type="button"
                    onclick="addChild()"
                    class="bg-gray-200 px-4 py-2 rounded">
                    + Add Child
                </button>

                <button type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded">
                    Save & Next
                </button>
            </div>

        </div>

    </form>
</div>

<script>
let childIndex = 1;

function addChild() {
    const container = document.getElementById('children_container');

    const row = document.createElement('div');
    row.className = 'grid grid-cols-2 gap-4 child-row mb-3';
    row.innerHTML = `
        <input type="text" name="children[${childIndex}][full_name]"
               placeholder="Full Name" class="border p-2">

        <input type="date" name="children[${childIndex}][date_of_birth]"
               class="border p-2">
    `;

    container.appendChild(row);
    childIndex++;
}

function toggleChildrenNA() {
    const checked = document.getElementById('children_na').checked;

    document.querySelectorAll('#children_container input')
        .forEach(input => {
            input.disabled = checked;
            if (checked) input.value = '';
        });
}
</script>

<script>
function toggleChildren(checkbox) {
    const inputs = document.querySelectorAll('.child-input');
    inputs.forEach(input => {
        input.disabled = checkbox.checked;
        if (checkbox.checked) input.value = '';
    });
}
</script>


@endsection
