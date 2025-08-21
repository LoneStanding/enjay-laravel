<?php

namespace App\Http\Controllers;

use App\Models\Policies;
use Illuminate\Http\Request;

class PoliciesController extends Controller
{
    // Show policies on frontend page
    public function index()
    {
        $policies = Policies::all();

        // If no policies in DB, create 2 dummy ones
        if ($policies->isEmpty()) {
            $policies = collect([
                (object)[
                    'id' => 1,
                    'name' => 'Health & Safety Policy',
                    'content' => 'We prioritize employee health and safety above all. Our policies ensure compliance with international standards.',
                    'img_path' => 'storage/policies/dummy1.png'
                ],
                (object)[
                    'id' => 2,
                    'name' => 'Quality Assurance Policy',
                    'content' => 'We are committed to providing the best quality products and services while continuously improving processes.',
                    'img_path' => 'storage/policies/dummy2.png'
                ]
            ]);
        }

        return view('policy', compact('policies'));
    }
}
