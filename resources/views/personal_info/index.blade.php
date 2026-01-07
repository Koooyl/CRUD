@extends('layouts.app')

@section('header')
Personal Info List
@endsection

@section('content')
<a href="/personal-info/create">+ Add New</a>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>

    @foreach($personalInfos as $info)
        <tr>
            <td>{{ $info->id }}</td>
            <td>{{ $info->surname }}, {{ $info->first_name }}</td>
        </tr>
    @endforeach
</table>
@endsection
