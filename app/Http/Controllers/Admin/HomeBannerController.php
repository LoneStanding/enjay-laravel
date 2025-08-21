<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HomeBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $banners = HomeBanners::all();
        return view('admin.home_banners.index', compact('banners'));
    }

    public function edit($id)
{
    $banner = HomeBanners::findOrFail($id);
    return view('admin.home_banners.edit', compact('banner'));
}

public function update(Request $request, $id)
    {
        $banner = HomeBanners::findOrFail($id);

        $data = [];

        // If there's a new file
        if ($request->hasFile('media_path')) {
            // Delete old file if exists
            if ($banner->media_path && Storage::disk('public')->exists($banner->media_path)) {
                Storage::disk('public')->delete($banner->media_path);
            }

            // Store new file
            $path = $request->file('media_path')->store('banners', 'public');
            $data['media_path'] = $path;
        }

        // Update database
        $banner->update($data);

        return redirect()->route('home_banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = HomeBanners::findOrFail($id);

        // Delete file from storage if exists
        if ($banner->media_path && Storage::disk('public')->exists($banner->media_path)) {
            Storage::disk('public')->delete($banner->media_path);
        }

        // Delete DB record
        $banner->delete();

        return redirect()->route('home_banners.index')->with('success', 'Banner deleted successfully.');
    }

    public function create()
    {
        return view('admin.home_banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048', // 2MB max
        ]);

        $mediaPath = null;

        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('banners', 'public');
        }

        HomeBanners::create([
            'media_path' => $mediaPath,
        ]);

        return redirect()->route('home_banners.index')->with('success', 'Banner added successfully.');
    }

}
