<?php

namespace App\Http\Controllers;

use App\Models\StudentDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * عرض صفحة المستندات
     */
    public function index()
    {
        $documents = StudentDocument::where('user_id', Auth::id())->get();
        return view('documents.index', compact('documents'));
    }

    /**
     * رفع مستند جديد
     */
    public function upload(Request $request)
    {
        $request->validate([
            'type' => 'required|in:photo,passport,high_school_certificate,transcript,language_certificate,cv,motivation_letter,recommendation',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        
        // تخزين الملف
        $path = $file->store('documents/' . Auth::id(), 'public');

        // حذف الملف القديم إذا وجد (اختياري: حسب رغبتك)
        $existing = StudentDocument::where('user_id', Auth::id())
                                   ->where('type', $request->type)
                                   ->first();
        if ($existing) {
            Storage::disk('public')->delete($existing->file_path);
            $existing->delete();
        }

        // إنشاء سجل جديد
        StudentDocument::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'file_path' => $path,
            'original_name' => $originalName,
            'is_verified' => false,
        ]);

        return response()->json(['message' => 'تم رفع المستند بنجاح']);
    }

    /**
     * حذف مستند
     */
    public function destroy($id)
    {
        $document = StudentDocument::where('user_id', Auth::id())
                                   ->where('id', $id)
                                   ->firstOrFail();
        
        // حذف الملف من التخزين
        Storage::disk('public')->delete($document->file_path);
        
        // حذف السجل
        $document->delete();

        return response()->json(['message' => 'تم حذف المستند بنجاح']);
    }
}