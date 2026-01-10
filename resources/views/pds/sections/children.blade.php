<h2 class="section-title">III. Children</h2>

@foreach($personalInfo->familyBackground->children ?? [] as $i => $child)
<div class="grid grid-cols-4 gap-4 mb-2">
    <input type="hidden" name="children[{{ $i }}][id]" value="{{ $child->id }}">
    <input name="children[{{ $i }}][full_name]" value="{{ $child->full_name }}" placeholder="Full Name">
    <input type="date" name="children[{{ $i }}][date_of_birth]" value="{{ $child->date_of_birth }}">
    <label>
        <input type="checkbox" name="children[{{ $i }}][is_not_applicable]" value="1"
            @checked($child->is_not_applicable)>
        N/A
    </label>
</div>
@endforeach
