<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\PersonalInfo;

class PdsExport implements FromView
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        return view('exports.pds', [
            'personalInfo' => PersonalInfo::with([
                'familyBackground.children',
                'educationalBackgrounds',
            ])->findOrFail($this->id),
        ]);
    }
}
