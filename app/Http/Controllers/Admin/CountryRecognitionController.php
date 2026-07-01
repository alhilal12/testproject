<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\CountryRecognition;
use Illuminate\Http\Request;

class CountryRecognitionController extends Controller
{
    public function index($universityId)
    {
        $university = University::with('recognitions')->findOrFail($universityId);
        return view('admin.universities.recognitions', compact('university'));
    }

    public function store(Request $request, $universityId)
    {
        $request->validate([
            'country_code' => 'required|string|max:3',
            'country_name_ar' => 'required|string|max:255',
            'country_name_en' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $university = University::findOrFail($universityId);
        
        CountryRecognition::updateOrCreate(
            [
                'university_id' => $universityId,
                'country_code' => $request->country_code,
            ],
            [
                'country_name_ar' => $request->country_name_ar,
                'country_name_en' => $request->country_name_en,
                'notes' => $request->notes,
                'is_active' => $request->has('is_active'),
            ]
        );

        return redirect()->back()->with('success', 'تم إضافة الاعتراف بنجاح');
    }

    public function destroy($universityId, $recognitionId)
    {
        $recognition = CountryRecognition::where('university_id', $universityId)
            ->where('id', $recognitionId)
            ->firstOrFail();
        $recognition->delete();

        return redirect()->back()->with('success', 'تم حذف الاعتراف بنجاح');
    }
}