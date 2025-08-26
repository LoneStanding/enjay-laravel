<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificate.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pdf_path' => 'required|file|mimes:pdf',
            'img_path' => 'required|image',
        ]);

        $pdfPath = $request->file('pdf_path')->store('certificates/pdfs', 'public');
        $imgPath = $request->file('img_path')->store('certificates/images', 'public');

        Certificate::create([
            'pdf_path' => $pdfPath,
            'img_path' => $imgPath,
        ]);

        return redirect()->route('certificates.index')->with('success', 'Certificate added successfully!');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificate.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'pdf_path' => 'nullable|file|mimes:pdf',
            'img_path' => 'nullable|image',
        ]);

        if ($request->hasFile('pdf_path')) {
            // delete old pdf if exists
            if ($certificate->pdf_path && Storage::disk('public')->exists($certificate->pdf_path)) {
                Storage::disk('public')->delete($certificate->pdf_path);
            }
            $certificate->pdf_path = $request->file('pdf_path')->store('certificates/pdfs', 'public');
        }

        if ($request->hasFile('img_path')) {
            // delete old image if exists
            if ($certificate->img_path && Storage::disk('public')->exists($certificate->img_path)) {
                Storage::disk('public')->delete($certificate->img_path);
            }
            $certificate->img_path = $request->file('img_path')->store('certificates/images', 'public');
        }

        $certificate->save();

        return redirect()->route('certificates.index')->with('success', 'Certificate updated successfully!');
    }

    public function destroy(Certificate $certificate)
    {
        // delete files if they exist
        if ($certificate->pdf_path && Storage::disk('public')->exists($certificate->pdf_path)) {
            Storage::disk('public')->delete($certificate->pdf_path);
        }

        if ($certificate->img_path && Storage::disk('public')->exists($certificate->img_path)) {
            Storage::disk('public')->delete($certificate->img_path);
        }

        $certificate->delete();

        return redirect()->route('certificates.index')->with('success', 'Certificate deleted successfully!');
    }
}
