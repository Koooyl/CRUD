<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'family_background_id' => 'required|exists:family_backgrounds,id',
            'children' => 'required|array',
            'children.*.name' => 'required|string|max:255',
            'children.*.date_of_birth' => 'required|date',
        ]);

        foreach ($validated['children'] as $child) {
            Child::create([
                'family_background_id' => $validated['family_background_id'],
                'name' => $child['name'],
                'date_of_birth' => $child['date_of_birth'],
            ]);
        }

        return response()->json([
            'message' => 'Children saved',
        ], 201);
    }
}
