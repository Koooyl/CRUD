<h2 class="section-title">VII. Voluntary Organizations</h2>

@foreach($personalInfo->voluntaryOrganizations as $i => $org)
<div class="grid grid-cols-5 gap-4 mb-3">
    <input type="hidden" name="voluntary_orgs[{{ $i }}][id]" value="{{ $org->id }}">

    <input name="voluntary_orgs[{{ $i }}][organization_name]"
           value="{{ $org->organization_name }}"
           placeholder="Organization Name">

    <input name="voluntary_orgs[{{ $i }}][position]"
           value="{{ $org->position }}"
           placeholder="Position">

    <input type="date"
           name="voluntary_orgs[{{ $i }}][from_date]"
           value="{{ $org->from_date }}">

    <input type="date"
           name="voluntary_orgs[{{ $i }}][to_date]"
           value="{{ $org->to_date }}">

    <input name="voluntary_orgs[{{ $i }}][number_of_hours]"
           value="{{ $org->number_of_hours }}"
           placeholder="Hours">
</div>
@endforeach
