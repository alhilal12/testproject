<?php

namespace App\Http\Controllers;

use App\Models\StudentCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentCertificateController extends Controller
{
    /**
     * Display a listing of the student's certificates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = StudentCertificate::where(
            'student_id', Auth::id()
        )->latest()->get();

        return view('student.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new certificate.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.certificates.create');
    }

    /**
     * Store a newly created certificate in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'certificate_type' => 'required|in:high_school,language,exam_result,other',
            'title' => 'required|string|max:255',
            'issue_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after_or_equal:issue_date',
            'file_path' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'grade_score' => 'nullable|string|max:255',
        ]);

        $filePath = $request->file('file_path')->store('certificates', 'public');

        StudentCertificate::create([
            'student_id' => Auth::id(),
            'certificate_type' => $request->certificate_type,
            'title' => $request->title,
            'issue_date' => $request->issue_date,
            'expiry_date' => $request->expiry_date,
            'file_path' => $filePath,
            'grade_score' => $request->grade_score,
            'is_verified' => false,
        ]);

        return redirect()->route('student.certificates.index')->with('success', 'تم رفع الشهادة بنجاح، وفي انتظار المراجعة.');
    }

    /**
     * Display the specified certificate.
     *
     * @param  \App\Models\StudentCertificate  $studentCertificate
     * @return \Illuminate\Http\Response
     */
    public function show(StudentCertificate $studentCertificate)
    {
        if (Auth::id() !== $studentCertificate->student_id && Auth::user()->role !== 'admin') {
            abort(403);
        }
        return view('student.certificates.show', compact('studentCertificate'));
    }

    // Admin methods for verification could be added here
}
