@extends('layouts.app')

@section('header')
<div class="flex flex-col gap-1">
    <h1 class="text-2xl font-semibold text-gray-800">Educational Background</h1>
    <p class="text-sm text-gray-500">Provide your complete educational history</p>
</div>
@endsection

@section('content')
<form method="POST" action="{{ route('educational_background.store') }}"
      class="max-w-6xl mx-auto space-y-6">
    @csrf

    <input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        {{-- TABLE WRAPPER --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-sm">
                <thead class="bg-gray-100">
                    <tr class="text-gray-700 text-xs uppercase tracking-wide">
                        <th class="table-th">Level</th>
                        <th class="table-th">Name of School</th>
                        <th class="table-th">Basic Education / Degree</th>
                        <th class="table-th">From</th>
                        <th class="table-th">To</th>
                        <th class="table-th">Highest Level / Units</th>
                        <th class="table-th">Year Graduated</th>
                        <th class="table-th">Honors</th>
                        <th class="table-th text-center">N/A</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($levels as $index => $level)
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="table-td font-medium text-gray-700">
                            {{ $level }}
                            <input type="hidden"
                                   name="education[{{ $index }}][level]"
                                   value="{{ $level }}">
                        </td>

                        <td class="table-td">
                            <input
                                name="education[{{ $index }}][school_name]"
                                class="table-input"
                                placeholder="School Name"
                            >
                        </td>

                        <td class="table-td">
                            <input
                                name="education[{{ $index }}][degree_course]"
                                class="table-input"
                                placeholder="Degree / Course"
                            >
                        </td>

                        <td class="table-td">
                            <input
                                name="education[{{ $index }}][period_from]"
                                class="table-input text-center"
                                placeholder="YYYY"
                                maxlength="4"
                            >
                        </td>

                        <td class="table-td">
                            <input
                                name="education[{{ $index }}][period_to]"
                                class="table-input text-center"
                                placeholder="YYYY"
                                maxlength="4"
                            >
                        </td>

                        <td class="table-td">
                            <input
                                name="education[{{ $index }}][highest_level_units]"
                                class="table-input"
                                placeholder="Units / Level"
                            >
                        </td>

                        <td class="table-td">
                            <input
                                name="education[{{ $index }}][year_graduated]"
                                class="table-input text-center"
                                placeholder="YYYY"
                                maxlength="4"
                            >
                        </td>

                        <td class="table-td">
                            <input
                                name="education[{{ $index }}][honors_received]"
                                class="table-input"
                                placeholder="Honors"
                            >
                        </td>

                        <td class="table-td text-center">
                            <input
                                type="checkbox"
                                name="education[{{ $index }}][is_not_applicable]"
                                value="1"
                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                onchange="toggleRow(this)"
                            >
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- ACTIONS --}}
        <div class="flex justify-end mt-6 pt-4 border-t">
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
function toggleRow(checkbox) {
    const row = checkbox.closest('tr');

    const inputs = row.querySelectorAll(
        'input:not([type=checkbox]):not([type=hidden])'
    );

    inputs.forEach(input => {
        if (checkbox.checked) {
            input.value = 'N/A';
            input.classList.add('bg-gray-100', 'italic');
        } else {
            input.value = '';
            input.classList.remove('bg-gray-100', 'italic');
        }
    });
}
</script>


<script>
function toggleRow(checkbox) {
    const row = checkbox.closest('tr');

    const inputs = row.querySelectorAll(
        'input:not([type=checkbox]):not([type=hidden])'
    );

    inputs.forEach(input => {
        if (checkbox.checked) {
            input.value = 'N/A';
            input.disabled = true;
            input.classList.add('bg-gray-100', 'cursor-not-allowed');
        } else {
            input.value = '';
            input.disabled = false;
            input.classList.remove('bg-gray-100', 'cursor-not-allowed');
        }
    });
}
</script>

@endsection
