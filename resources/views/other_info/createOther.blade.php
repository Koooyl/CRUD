@extends('layouts.app')

@section('header') Other Information @endsection

@section('content')
<form method="POST" action="{{ route('other-info.store') }}">
@csrf
<input type="hidden" name="personal_info_id" value="{{ $personalInfo->id }}">

<textarea name="special_skills" placeholder="Special Skills"></textarea>
<textarea name="non_academic_distinctions" placeholder="Non-academic distinctions"></textarea>
<textarea name="membership_in_associations" placeholder="Membership in associations"></textarea>

<button type="submit">Finish</button>
</form>
@endsection
