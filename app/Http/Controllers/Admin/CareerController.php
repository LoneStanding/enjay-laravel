<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the careers.
     */
    public function index()
    {
        $careers = Career::all();
        return view('admin.career.index', compact('careers'));
    }

    /**
     * Show the form for creating a new career.
     */
    public function create()
    {
        return view('admin.career.create');
    }

    /**
     * Store a newly created career in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title'     => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'experience'    => 'nullable|string|max:255',
            'nationality'   => 'nullable|string|max:255',
            'job_status'    => 'nullable|string|max:255',
            'location'  => 'nullable|string|max:255',
            'job_description'          => 'required|string|max:255',
            'category'   => 'nullable|string|max:255',
        ]);

        Career::create($request->only([
            'job_title',
            'qualification',
            'experience',
            'nationality',
            'job_status',
            'location',
            'job_description',
            'category',
        ]));

        return redirect()->route('career.index')->with('success', 'Career added successfully.');
    }

    /**
     * Show the form for editing the specified career.
     */
    public function edit($id)
    {
        $career = Career::findOrFail($id);
        return view('admin.career.edit', compact('career'));
    }

    /**
     * Update the specified career in storage.
     */
    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        $request->validate([
            'job_title'     => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'experience'    => 'nullable|string|max:255',
            'nationality'   => 'nullable|string|max:255',
            'job_status'    => 'nullable|string|max:255',
            'location'  => 'nullable|string|max:255',
            'job_description'  => 'required|string|max:255',
            'category'   => 'nullable|string|max:255',
        ]);

        $career->update($request->only([
            'job_title',
            'qualification',
            'experience',
            'nationality',
            'job_status',
            'location',
            'job_description',
            'category',
        ]));

        return redirect()->route('career.index')->with('success', 'Career updated successfully.');
    }

    /**
     * Remove the specified career from storage.
     */
    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();

        return redirect()->route('career.index')->with('success', 'Career deleted successfully.');
    }
}
