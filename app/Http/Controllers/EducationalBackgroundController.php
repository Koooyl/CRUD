<?php

namespace App\Http\Controllers;

use App\Models\EducationalBackground;
use Illuminate\Http\Request;

class EducationalBackgroundController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'personal_info_id' => 'required|exists:personal_infos,id',
            'level' => 'required|string|max:100',
            'school_name' => 'nullable|string|max:255',
            'degree_course' => 'nullable|string|max:255',
            'from_year' => 'nullable|integer',
            'to_year' => 'nullable|integer',
            'highest_level_units' => 'nullable|string|max:255',
            'year_graduated' => 'nullable|integer',
            'honors_received' => 'nullable|string|max:255',
        ]);

        EducationalBackground::create($validated);

        return response()->json([
            'message' => 'Educational background saved',
        ], 201);
    }
}
