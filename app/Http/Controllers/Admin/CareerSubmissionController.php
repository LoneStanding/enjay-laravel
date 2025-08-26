<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerSubmission;
use Illuminate\Http\Request;

class CareerSubmissionController extends Controller
{
    public function index()
    {
        $careerSubmissions = CareerSubmission::all();
        return view('admin.career_submission.index', compact('careerSubmissions'));
    }

    public function show($id)
    {
        $submission = CareerSubmission::findOrFail($id);
        return view('admin.career_submission.show', compact('submission'));
    }

    public function destroy(CareerSubmission $careerSubmission)
    {
        $careerSubmission->delete();
        return redirect()->route('careerSubmissions.index')->with('success', 'Customer deleted successfully!');
    }
}
