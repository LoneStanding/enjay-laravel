<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\CareerSubmission;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->get();
        $categories = Career::select('category')->distinct()->pluck('category');
        return view('career', compact('careers', 'categories'));
    }

    public function filter(Request $request)
    {
        $query = Career::query();

        if ($request->category && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $careers = $query->latest()->get();

        return view('partials.career_cards', compact('careers'))->render();
    }

    public function show($id)
    {
        $career = Career::findOrFail($id);
        return view('careerdetails', compact('career'));
    }

    public function apply($id)
    {
        $career = Career::findOrFail($id);
        return view('applycareer', compact('career'));
    }

    public function submit(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        $validated = $request->validate([
            'referal_name' => 'nullable|string|max:255',
            'gender' => 'required|string',
            'name' => 'required|string|max:255',
            'nationality' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'experience' => 'required|string|max:255',
            'current_salary' => 'nullable|string|max:255',
            'expected_salary' => 'nullable|string|max:255',
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Handle CV upload
        $cvPath = $request->file('cv')->store('cvs', 'public');

        CareerSubmission::create([
            'referal_name'   => $validated['referal_name'] ?? null,
            'gender'         => $validated['gender'],
            'name'           => $validated['name'],
            'nationality'    => $validated['nationality'],
            'job_title'      => $career->job_title,
            'email'          => $validated['email'],
            'phone'          => $validated['phone'],
            'experience'     => $validated['experience'],
            'current_salary' => $validated['current_salary'] ?? '',
            'expected_salary'=> $validated['expected_salary'] ?? '',
            'path_to_cv'     => $cvPath,
        ]);

        return redirect()->route('careers.show', $career->id)->with('success', 'Your application has been submitted!');
    }
}
