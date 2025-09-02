<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\Feedback;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function storeCustomer(Request $request)
    {
        $customer = Customer::create([
            'name' => $request->firstName . ' ' . $request->lastName,
            'email' => $request->email,
            'phone' => $request->countryCode . ' ' . $request->phone,
            'company' => $request->company,
            'location' => $request->country . ', ' . $request->city . ', ' . $request->state,
            'requirements' => $request->enquiry,
        ]);

        $this->sendMail("New Customer Registration", $customer->toArray());

        return response()->json(['success' => true]);
    }

    public function storeVendor(Request $request)
    {
        $vendor = Vendor::create([
            'company_name'   => $request->name,
            'contact_person' => $request->contact_email ?? 'N/A',
            'email'          => $request->email,
            'phone'          => $request->phone,
            'address'        => $request->addr1 . ' ' . $request->addr2 . ', ' . $request->city . ', ' . $request->country,
            'service_category' => $request->company_services,
        ]);

        $this->sendMail("New Vendor Registration", $vendor->toArray());

        return response()->json(['success' => true]);
    }

    public function storeFeedback(Request $request)
    {
        $feedback = Feedback::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->mobile,
            'company'  => $request->company,
            'feedback' => $request->feedback,
        ]);

        $this->sendMail("New Feedback Received", $feedback->toArray());

        return response()->json(['success' => true]);
    }

    private function sendMail($subject, $data)
    {
        Mail::raw(print_r($data, true), function ($message) use ($subject) {
            $message->to('param.akhouri@gmail.com')
                    ->subject($subject);
        });
    }
}
