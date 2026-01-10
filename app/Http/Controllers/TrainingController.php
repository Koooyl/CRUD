<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function create(PersonalInfo $personalInfo)
    {
        return view('training.createTraining', compact('personalInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'personal_info_id' => 'required|exists:personal_infos,id',
            'trainings.*.title' => 'required|string|max:255',
            'trainings.*.from_date' => 'nullable|date',
            'trainings.*.to_date' => 'nullable|date',
            'trainings.*.number_of_hours' => 'nullable|integer',
            'trainings.*.conducted_by' => 'nullable|string|max:255',
        ]);

        foreach ($request->trainings as $training) {
            Training::create([
                'personal_info_id' => $request->personal_info_id,
                ...$training
            ]);
        }

        return redirect()->route(
            'other-info.create',
            $request->personal_info_id
        );
    }
}
