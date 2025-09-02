<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policies as Policy;
use Illuminate\Support\Facades\Storage;

class PoliciesController extends Controller
{
    public function index()
    {
        $policies = Policy::latest()->get();
        return view('admin.policy.index', compact('policies'));
    }

    public function create()
    {
        return view('admin.policy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'content' => 'required|string',
            'img_path'=> 'nullable|image|max:2048',
        ]);

        $path = $request->file('img_path')?->store('policies', 'public');

        Policy::create([
            'name'     => $request->name,
            'content'  => $request->content,
            'img_path' => $path,
        ]);

        return redirect()->route('policies.index')->with('success', 'Policy created successfully.');
    }

    public function edit(Policy $policy)
    {
        return view('admin.policy.edit', compact('policy'));
    }

    public function update(Request $request, Policy $policy)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'content' => 'required|string',
            'img_path'=> 'nullable|image|max:2048',
        ]);

        $path = $policy->img_path;
        if ($request->hasFile('img_path')) {
            if ($policy->img_path && Storage::disk('public')->exists($policy->img_path)) {
                Storage::disk('public')->delete($policy->img_path);
            }
            $path = $request->file('img_path')->store('policies', 'public');
        }

        $policy->update([
            'name'     => $request->name,
            'content'  => $request->content,
            'img_path' => $path,
        ]);

        return redirect()->route('policies.index')->with('success', 'Policy updated successfully.');
    }

    public function destroy(Policy $policy)
    {
        if ($policy->img_path && Storage::disk('public')->exists($policy->img_path)) {
            Storage::disk('public')->delete($policy->img_path);
        }

        $policy->delete();
        return redirect()->route('policies.index')->with('success', 'Policy deleted successfully.');
    }
}
