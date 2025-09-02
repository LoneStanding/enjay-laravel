<?php

namespace App\Http\Controllers;

use App\Models\HomeBanners;
use App\Models\HomePageSections;
use App\Models\Policies;
use App\Models\Product;
use App\Models\Service;
use App\Models\Certificate;
use App\Models\NewsBlog;
use App\Models\Review;
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
                (object) ['id' => 1, 'category' => 'dummy', 'product_name' => 'Dummy Product 1', 'image_path' => 'images/product_placeholder.png'],
                (object) ['id' => 2, 'category' => 'dummy', 'product_name' => 'Dummy Product 2', 'image_path' => 'images/product_placeholder.png'],
                (object) ['id' => 3, 'category' => 'dummy', 'product_name' => 'Dummy Product 3', 'image_path' => 'images/product_placeholder.png'],
                (object) ['id' => 4, 'category' => 'dummy', 'product_name' => 'Dummy Product 4', 'image_path' => 'images/product_placeholder.png'],
                (object) ['id' => 5, 'category' => 'dummy', 'product_name' => 'Dummy Product 5', 'image_path' => 'images/product_placeholder.png'],
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
                    'img_path' => ''
                ],
                (object)[
                    'name' => 'Dummy Policy 2',
                    'content' => '<p>This is another placeholder policy for demonstration purposes.</p>',
                    'img_path' => '/images/policy-placeholder.png'
                ],
                (object)[
                    'name' => 'Dummy Policy 3',
                    'content' => '<p>This is a third placeholder policy to fill space when no policies exist.</p>',
                    'img_path' => ''
                ],
            ]);
        }

        $certificates = Certificate::all();
        if ($certificates->isEmpty()) {
            $certificates = collect([
                (object)[
                    'id' => 1,
                    'image_path' => 'storage/images/services.jpg',
                    'pdf_path' => '#'
                ],
                (object)[
                    'id' => 2,
                    'image_path' => 'storage/images/cert_placeholder.png',
                    'pdf_path' => '#'
                ],
                (object)[
                    'id' => 3,
                    'image_path' => 'storage/images/cert_placeholder.png',
                    'pdf_path' => '#'
                ],
            ]);
        }

        $newsBlogs = NewsBlog::latest()->take(6)->get();

        if ($newsBlogs->isEmpty()) {
            $newsBlogs = collect([
                (object)[
                    'id' => 1,
                    'news_title' => 'Dummy News Title 1',
                    'tag' => 'General',
                    'image_path' => 'images/dummy-news1.jpg',
                    'content' => '<p>This is a placeholder news blog content for display.</p>'
                ],
                (object)[
                    'id' => 2,
                    'news_title' => 'Dummy News Title 2',
                    'tag' => 'Updates',
                    'image_path' => 'images/dummy-news2.jpg',
                    'content' => '<p>This is another placeholder news blog content.</p>'
                ],
                (object)[
                    'id' => 3,
                    'news_title' => 'Dummy News Title 3',
                    'tag' => 'Events',
                    'image_path' => 'images/dummy-news3.jpg',
                    'content' => '<p>More placeholder content goes here for blogs.</p>'
                ],
                (object)[
                    'id' => 4,
                    'news_title' => 'Dummy News Title 4',
                    'tag' => 'Events',
                    'image_path' => 'images/dummy-news3.jpg',
                    'content' => '<p>More placeholder content goes here for blogs.</p>'
                ],
            ]);
        }


        $reviews = Review::all();

        if ($reviews->isEmpty()) {
            $reviews = collect([
                (object)[
                    'profile_path' => 'https://via.placeholder.com/400x300.png?text=John+Doe',
                    'name' => 'John Doe',
                    'position' => 'CEO, Example Corp',
                    'review' => 'This service was excellent and exceeded expectations!',
                ],
                (object)[
                    'profile_path' => 'https://via.placeholder.com/400x300.png?text=Maria+Alba',
                    'name' => 'Maria Alba',
                    'position' => 'Manager, TechSoft',
                    'review' => 'A truly professional and reliable team to work with.',
                ],
                (object)[
                    'profile_path' => 'https://via.placeholder.com/400x300.png?text=Ankit+Patel',
                    'name' => 'Ankit Patel',
                    'position' => 'CTO, InnovateX',
                    'review' => 'Their attention to detail and commitment is outstanding!',
                ],
            ]);
        }


        return view('home', compact('sections', 'banners', 'carouselProducts', 'homeServices', 'policies', 'certificates', 'newsBlogs', 'reviews'));
    }
}
