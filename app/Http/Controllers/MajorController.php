<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    // Admin methods for managing majors
    public function index()
    {
        $majors = Major::latest()->paginate(10);
        return view("admin.majors.index", compact("majors"));
    }

    public function create()
    {
        return view("admin.majors.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name_ar" => "required|string|max:255|unique:majors,name_ar",
            "name_en" => "required|string|max:255|unique:majors,name_en",
            "category" => "nullable|string|max:255",
        ]);

        Major::create($request->all());

        return redirect()->route("admin.majors.index")->with("success", "تم إضافة التخصص بنجاح.");
    }

    public function edit(Major $major)
    {
        return view("admin.majors.edit", compact("major"));
    }

    public function update(Request $request, Major $major)
    {
        $request->validate([
            "name_ar" => "required|string|max:255|unique:majors,name_ar," . $major->id,
            "name_en" => "required|string|max:255|unique:majors,name_en," . $major->id,
            "category" => "nullable|string|max:255",
        ]);

        $major->update($request->all());

        return redirect()->route("admin.majors.index")->with("success", "تم تحديث التخصص بنجاح.");
    }

    public function destroy(Major $major)
    {
        $major->delete();
        return redirect()->route("admin.majors.index")->with("success", "تم حذف التخصص بنجاح.");
    }
}
