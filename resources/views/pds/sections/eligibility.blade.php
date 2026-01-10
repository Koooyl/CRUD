<h2 class="section-title">V. Eligibility</h2>

@foreach($personalInfo->eligibilities as $i => $eligibility)
<div class="grid grid-cols-6 gap-4 mb-3">
    <input type="hidden" name="eligibilities[{{ $i }}][id]" value="{{ $eligibility->id }}">

    <input name="eligibilities[{{ $i }}][eligibility_type]"
           value="{{ $eligibility->eligibility_type }}"
           placeholder="Eligibility Type">

    <input name="eligibilities[{{ $i }}][rating]"
           value="{{ $eligibility->rating }}"
           placeholder="Rating">

    <input type="date"
           name="eligibilities[{{ $i }}][date_of_exam]"
           value="{{ $eligibility->date_of_exam }}">

    <input name="eligibilities[{{ $i }}][place_of_exam]"
           value="{{ $eligibility->place_of_exam }}"
           placeholder="Place of Exam">

    <input name="eligibilities[{{ $i }}][license_number]"
           value="{{ $eligibility->license_number }}"
           placeholder="License No">

    <input type="date"
           name="eligibilities[{{ $i }}][license_validity]"
           value="{{ $eligibility->license_validity }}">
</div>
@endforeach
