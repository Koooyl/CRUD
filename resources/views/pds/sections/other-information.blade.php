<h2 class="section-title">IX. Other Information</h2>

<div class="grid grid-cols-1 gap-4">
    <textarea name="special_skills"
              rows="3"
              placeholder="Special Skills">
        {{ optional($personalInfo->otherInformation)->special_skills }}
    </textarea>

    <textarea name="non_academic_distinctions"
              rows="3"
              placeholder="Non-Academic Distinctions">
        {{ optional($personalInfo->otherInformation)->non_academic_distinctions }}
    </textarea>

    <textarea name="membership_in_associations"
              rows="3"
              placeholder="Membership in Associations">
        {{ optional($personalInfo->otherInformation)->membership_in_associations }}
    </textarea>
</div>
