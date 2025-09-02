<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index', compact('customers'));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer_list.index')->with('success', 'Customer deleted successfully!');
    }
}

