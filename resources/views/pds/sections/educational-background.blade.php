<h2 class="section-title">IV. Educational Background</h2>

@foreach($personalInfo->educationalBackgrounds as $i => $edu)
<div class="border p-3 mb-3">
    <strong>{{ strtoupper($edu->level) }}</strong>
    <input type="hidden" name="education[{{ $i }}][id]" value="{{ $edu->id }}">

    <label>
        <input type="checkbox" name="education[{{ $i }}][is_not_applicable]" value="1"
            @checked($edu->is_not_applicable)>
        Not Applicable
    </label>

    <input name="education[{{ $i }}][school_name]" value="{{ $edu->school_name }}" placeholder="School">
    <input name="education[{{ $i }}][degree_course]" value="{{ $edu->degree_course }}" placeholder="Degree">
    <input name="education[{{ $i }}][period_from]" value="{{ $edu->period_from }}" placeholder="From">
    <input name="education[{{ $i }}][period_to]" value="{{ $edu->period_to }}" placeholder="To">
    <input name="education[{{ $i }}][highest_level_units]" value="{{ $edu->highest_level_units }}" placeholder="Units">
    <input name="education[{{ $i }}][year_graduated]" value="{{ $edu->year_graduated }}" placeholder="Year Graduated">
    <input name="education[{{ $i }}][honors_received]" value="{{ $edu->honors_received }}" placeholder="Honors">
</div>
@endforeach
