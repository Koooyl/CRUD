@extends('layouts.app')

@section('header')
Personal Info List
@endsection

@section('content')

<a href="/personal-info/create"
   class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
    + Add New
</a>

<div class="overflow-x-auto">
<table border="1" cellpadding="8" class="w-full">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

    @foreach($personalInfos as $info)
        <tr>
            <td>{{ $info->id }}</td>
            <td>{{ $info->surname }}, {{ $info->first_name }}</td>
           <td class="space-x-2">
            <a href="{{ route('pds.show', $info) }}"
            class="bg-blue-600 text-white px-2 py-1 rounded">View</a>

            <a href="{{ route('pds.edit', $info) }}"
            class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>

            <a href="{{ route('personal-info.export', $info) }}"
            class="bg-green-600 text-white px-2 py-1 rounded">Export</a>

            
</td>

        </tr>
    @endforeach
</table>

</div>

@endsection
