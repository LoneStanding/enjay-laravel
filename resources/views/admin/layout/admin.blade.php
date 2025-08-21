<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    {{-- Bootstrap CSS from Laravel UI --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Optional: Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            height: 100vh;
            color: #fff;
            position: fixed;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <h4 class="p-3">Admin Panel</h4>
        <a href="{{ route('home_banners.index') }}"><i class="bi bi-image"></i> Home Banners</a>
        <a href="{{ route('products.index') }}"><i class="bi bi-box"></i> Products</a>
        <a href="{{ route('vendor_list.index') }}"><i class="bi bi-building"></i> Vendors</a>
        <a href="{{ route('customer_list.index') }}"><i class="bi bi-people"></i> Customers</a>
        <a href="{{ route('feedback_list.index') }}"><i class="bi bi-chat-dots"></i> Feedback</a>
        <a href="{{ route('all_page_content.index') }}"><i class="bi bi-file-text"></i> All Page Content</a>
        <a href="{{ route('services.index') }}"><i class="bi bi-gear"></i> Services</a>
        <a href="{{ route('career.index') }}"><i class="bi bi-briefcase"></i> Careers</a>
        <a href="{{ route('career_submissions.index') }}"><i class="bi bi-envelope"></i> Career Submissions</a>
        <a href="{{ route('reviews.index') }}"><i class="bi bi-star"></i> Reviews</a>
        <a href="{{ route('certificates.index') }}"><i class="bi bi-award"></i> Certificates</a>
        <a href="{{ route('news_blog.index') }}"><i class="bi bi-newspaper"></i> News Blog</a>
        <a href="{{ route('policies.index') }}"><i class="bi bi-file-earmark-text"></i> Policies</a>

    </div>

    {{-- Main Content --}}
    <div class="content">
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
