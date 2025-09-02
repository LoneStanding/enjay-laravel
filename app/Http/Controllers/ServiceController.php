<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::select('id','service_name','icon_path','description')->get();
        return view('services', compact('services'));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('servicedetails', compact('service')); // create later
    }
}
