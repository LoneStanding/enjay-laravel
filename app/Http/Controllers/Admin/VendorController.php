<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('admin.vendor.index', compact('vendors'));
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('vendors.index')->with('success', 'Customer deleted successfully!');
    }
}
