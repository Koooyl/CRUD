<h2 class="section-title">VI. Work Experience</h2>

@foreach($personalInfo->workExperiences as $i => $work)
<div class="border p-3 mb-3">
    <input type="hidden" name="work_experiences[{{ $i }}][id]" value="{{ $work->id }}">

    <div class="grid grid-cols-4 gap-4">
        <input name="work_experiences[{{ $i }}][position_title]"
               value="{{ $work->position_title }}"
               placeholder="Position Title">

        <input name="work_experiences[{{ $i }}][company_name]"
               value="{{ $work->company_name }}"
               placeholder="Company">

        <input name="work_experiences[{{ $i }}][monthly_salary]"
               value="{{ $work->monthly_salary }}"
               placeholder="Monthly Salary">

        <input name="work_experiences[{{ $i }}][salary_grade]"
               value="{{ $work->salary_grade }}"
               placeholder="Salary Grade">

        <input name="work_experiences[{{ $i }}][appointment_status]"
               value="{{ $work->appointment_status }}"
               placeholder="Appointment Status">

        <input name="work_experiences[{{ $i }}][government_service]"
               value="{{ $work->government_service }}"
               placeholder="Gov't Service (Y/N)">

        <input type="date"
               name="work_experiences[{{ $i }}][date_from]"
               value="{{ $work->date_from }}">

        <input type="date"
               name="work_experiences[{{ $i }}][date_to]"
               value="{{ $work->date_to }}">
    </div>
</div>
@endforeach
