<?php

namespace App\Http\Controllers;

use App\Models\HomeBanners;
use App\Models\HomePageSections;
use App\Models\Policies;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $sections = HomePageSections::all();
        $banners = HomeBanners::all();
        $carouselProducts = Product::take(10)->get();
        if ($carouselProducts->isEmpty()) {
            $carouselProducts = collect([
                (object) ['product_name' => 'Dummy Product 1', 'image_path' => 'images/product_placeholder.png'],
                (object) ['product_name' => 'Dummy Product 2', 'image_path' => 'images/product_placeholder.png'],
                (object) ['product_name' => 'Dummy Product 3', 'image_path' => 'images/product_placeholder.png'],
                (object) ['product_name' => 'Dummy Product 4', 'image_path' => 'images/product_placeholder.png'],
                (object) ['product_name' => 'Dummy Product 5', 'image_path' => 'images/product_placeholder.png'],
            ]);
        }
        $homeServices = Service::select('id','service_name','icon_path','description')
                                ->take(6)
                                ->get();
        if ($homeServices->isEmpty()) {
            $homeServices = collect([
                (object)[
                    'id' => 0,
                    'service_name' => 'Dummy Service 1',
                    'icon_path' => 'images/dummy-icon1.png',
                    'description' => 'This is a placeholder service until real services are added.'
                ],
                (object)[
                    'id' => 0,
                    'service_name' => 'Dummy Service 2',
                    'icon_path' => 'images/dummy-icon2.png',
                    'description' => 'Another placeholder service to showcase layout.'
                ],
                (object)[
                    'id' => 0,
                    'service_name' => 'Dummy Service 3',
                    'icon_path' => 'images/dummy-icon3.png',
                    'description' => 'A sample description for a dummy service.'
                ],
            ]);
        }

        $policies = Policies::all();
        if ($policies->isEmpty()) {
            $policies = collect([
                (object)[
                    'name' => 'Dummy Policy 1',
                    'content' => '<p>This is placeholder content for HSE Commitment section.</p>',
                    'img_path' => '/images/dummy-policy1.jpg'
                ],
                (object)[
                    'name' => 'Dummy Policy 2',
                    'content' => '<p>This is another placeholder policy for demonstration purposes.</p>',
                    'img_path' => '/images/dummy-policy2.jpg'
                ],
                (object)[
                    'name' => 'Dummy Policy 3',
                    'content' => '<p>This is a third placeholder policy to fill space when no policies exist.</p>',
                    'img_path' => '/images/dummy-policy3.jpg'
                ],
            ]);
        }


        return view('home', compact('sections', 'banners', 'carouselProducts', 'homeServices', 'policies'));
    }
}
