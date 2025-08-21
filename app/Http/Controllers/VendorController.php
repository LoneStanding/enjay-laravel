<?php
namespace App\Http\Controllers;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorListController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string',
            'contact_person' => 'required|string',
            'email' => 'required|email|unique:vendor_list,email',
            'phone' => 'required',
            'address' => 'required',
            'service_category' => 'required'
        ]);

        Vendor::create($request->all());

        return back()->with('success', 'Vendor information saved successfully.');
    }
}
