@extends('layouts.app')

@section('header')
Educational Background
@endsection

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 shadow rounded">

   <form method="POST" action="{{ route('educational_background.store') }}">
@csrf

<input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

<table border="1" width="100%" cellpadding="6">
    <thead>
        <tr>
            <th>LEVEL</th>
            <th>NAME OF SCHOOL</th>
            <th>BASIC EDUCATION / DEGREE</th>
            <th>FROM</th>
            <th>TO</th>
            <th>HIGHEST LEVEL / UNITS</th>
            <th>YEAR GRADUATED</th>
            <th>HONORS</th>
            <th>N/A</th>
        </tr>
    </thead>

    <tbody>
    @foreach($levels as $index => $level)
        <tr>
            <td>
                <strong>{{ $level }}</strong>
                <input type="hidden" name="education[{{ $index }}][level]" value="{{ $level }}">
            </td>

            <td><input name="education[{{ $index }}][school_name]"></td>
            <td><input name="education[{{ $index }}][degree_course]"></td>
            <td><input name="education[{{ $index }}][period_from]" size="4"></td>
            <td><input name="education[{{ $index }}][period_to]" size="4"></td>
            <td><input name="education[{{ $index }}][highest_level_units]"></td>
            <td><input name="education[{{ $index }}][year_graduated]" size="4"></td>
            <td><input name="education[{{ $index }}][honors_received]"></td>

            <td style="text-align:center">
                <input type="checkbox"
                       name="education[{{ $index }}][is_not_applicable]"
                       value="1">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div style="margin-top:15px;">
    <button type="submit">Save & Next</button>
</div>
</form>

</div>
@endsection
