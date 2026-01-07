@extends('layouts.app')

@section('header')
Create Personal Info
@endsection

@section('content')
<form method="POST" action="/personal-info/store">
    @csrf

    <label>Surname</label>
    <input type="text" name="surname">

    <label>First Name</label>
    <input type="text" name="first_name">

    <button type="submit">Save</button>
</form>
@endsection
