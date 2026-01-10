<h2 class="section-title">VIII. Training Programs Attended</h2>

@foreach($personalInfo->trainings as $i => $training)
<div class="grid grid-cols-5 gap-4 mb-3">
    <input type="hidden" name="trainings[{{ $i }}][id]" value="{{ $training->id }}">

    <input name="trainings[{{ $i }}][title]"
           value="{{ $training->title }}"
           placeholder="Training Title">

    <input type="date"
           name="trainings[{{ $i }}][from_date]"
           value="{{ $training->from_date }}">

    <input type="date"
           name="trainings[{{ $i }}][to_date]"
           value="{{ $training->to_date }}">

    <input name="trainings[{{ $i }}][number_of_hours]"
           value="{{ $training->number_of_hours }}"
           placeholder="Hours">

    <input name="trainings[{{ $i }}][conducted_by]"
           value="{{ $training->conducted_by }}"
           placeholder="Conducted By">
</div>
@endforeach
