<h2 class="section-title">II. Family Background</h2>

<label>
    <input type="checkbox" name="spouse_not_applicable" value="1"
        @checked(optional($personalInfo->familyBackground)->spouse_not_applicable)>
    Spouse Not Applicable
</label>

<div class="grid grid-cols-4 gap-4 mt-2">
    <input name="spouse_surname" value="{{ optional($personalInfo->familyBackground)->spouse_surname }}" placeholder="Spouse Surname">
    <input name="spouse_first_name" value="{{ optional($personalInfo->familyBackground)->spouse_first_name }}" placeholder="Spouse First Name">
    <input name="spouse_middle_name" value="{{ optional($personalInfo->familyBackground)->spouse_middle_name }}" placeholder="Spouse Middle Name">
    <input name="spouse_name_extension" value="{{ optional($personalInfo->familyBackground)->spouse_name_extension }}" placeholder="Ext">
    <input name="spouse_occupation" value="{{ optional($personalInfo->familyBackground)->spouse_occupation }}" placeholder="Occupation">
    <input name="spouse_employer" value="{{ optional($personalInfo->familyBackground)->spouse_employer }}" placeholder="Employer">
    <input name="spouse_business_address" value="{{ optional($personalInfo->familyBackground)->spouse_business_address }}" placeholder="Business Address">
    <input name="spouse_telephone" value="{{ optional($personalInfo->familyBackground)->spouse_telephone }}" placeholder="Telephone">
</div>

<h3 class="mt-4 font-semibold">Parents</h3>
<div class="grid grid-cols-4 gap-4">
    <input name="father_surname" value="{{ optional($personalInfo->familyBackground)->father_surname }}" placeholder="Father Surname">
    <input name="father_first_name" value="{{ optional($personalInfo->familyBackground)->father_first_name }}" placeholder="Father First Name">
    <input name="father_middle_name" value="{{ optional($personalInfo->familyBackground)->father_middle_name }}" placeholder="Father Middle Name">
    <input name="father_name_extension" value="{{ optional($personalInfo->familyBackground)->father_name_extension }}" placeholder="Ext">

    <input name="mother_maiden_surname" value="{{ optional($personalInfo->familyBackground)->mother_maiden_surname }}" placeholder="Mother Maiden Name">
    <input name="mother_first_name" value="{{ optional($personalInfo->familyBackground)->mother_first_name }}" placeholder="Mother First Name">
    <input name="mother_middle_name" value="{{ optional($personalInfo->familyBackground)->mother_middle_name }}" placeholder="Mother Middle Name">
</div>
