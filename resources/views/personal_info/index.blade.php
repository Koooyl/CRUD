@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">
            Personal Data Sheet (PDS)
        </h1>

        <a href="/personal-info/create"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4" />
            </svg>
            Add New
        </a>
    </div>
@endsection

@section('content')


{{-- SEARCH BAR --}}
<div class="mb-4">
    <form method="GET" action="{{ route('personal-info.index') }}">
        <div class="flex items-center gap-2">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by surname or first name..."
                class="w-full md:w-1/3 px-4 py-2 border rounded-lg
                       focus:ring-2 focus:ring-blue-400 focus:outline-none"
            >

            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg
                       hover:bg-blue-700 transition">
                Search
            </button>

            @if(request('search'))
                <a href="{{ route('personal-info.index') }}"
                   class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-100">
                    Clear
                </a>
            @endif
        </div>
    </form>
</div>


<div class="bg-white shadow-lg rounded-lg overflow-hidden">

    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Full Name</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($personalInfos as $info)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $info->id }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">
                                {{ $info->surname }}, {{ $info->first_name }}
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center items-center gap-2">

                                {{-- VIEW --}}
                                <a href="{{ route('pds.show', $info) }}"
                                title="View"
                                class="inline-flex h-8 w-8 items-center justify-center rounded-md
                                        bg-blue-600 text-white hover:bg-blue-700
                                        focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1
                                        transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                        fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5
                                                c4.478 0 8.268 2.943 9.542 7
                                                -1.274 4.057 -5.064 7 -9.542 7
                                                -4.477 0 -8.268 -2.943 -9.542 -7z"/>
                                    </svg>
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('pds.edit', $info) }}"
                                title="Edit"
                                class="inline-flex h-8 w-8 items-center justify-center rounded-md
                                        bg-yellow-500 text-white hover:bg-yellow-600
                                        focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-1
                                        transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                        fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"/>
                                        <path d="M18.586 2.586a2 2 0 112.828 2.828L12 14l-4 1 1-4 9.586-9.414z"/>
                                    </svg>
                                </a>

                                {{-- EXPORT --}}
                                <a href="{{ route('pds.export', $info->id) }}"
                                title="Export Excel"
                                class="inline-flex h-8 w-8 items-center justify-center rounded-md
                                        bg-green-600 text-white hover:bg-green-700
                                        focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-1
                                        transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                        fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M12 3v12"/>
                                        <path d="M8 11l4 4 4-4"/>
                                        <path d="M4 17h16"/>
                                    </svg>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('personal-info.destroy', $info->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            title="Delete"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-md
                                                bg-red-600 text-white hover:bg-red-700
                                                focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-1
                                                transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                            fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                                                    a2 2 0 01-1.995-1.858L5 7"/>
                                            <path d="M10 11v6M14 11v6"/>
                                            <path d="M9 7h6m2 0h-2m-6 0H7m4-3h2a1 1 0 011 1v1h-4V5a1 1 0 011-1z"/>
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </td>



                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                            No Personal Data Sheets found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
