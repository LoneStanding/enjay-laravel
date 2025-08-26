<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('icon_path')) {
            $path = $request->file('icon_path')->store('services', 'public');
        }

        Service::create([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'icon_path' => $path,
        ]);

        return redirect()->route('services.index')->with('success', 'Service added successfully');
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $path = $service->icon_path;
        if ($request->hasFile('icon_path')) {
            $path = $request->file('icon_path')->store('services', 'public');
        }

        $service->update([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'icon_path' => $path,
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully');
    }
}
