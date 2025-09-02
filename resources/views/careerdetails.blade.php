@extends('layout.app')

@section('content')
<div class="mt-32"></div>
<div class="mx-64 bg-white rounded-2xl shadow-lg p-10">
    <h1 class="text-4xl font-bold mb-5">{{ $career->job_title }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-10">
        <p><strong>Category:</strong> {{ $career->category }}</p>
        <p><strong>Qualification:</strong> {{ $career->qualification }}</p>
        <p><strong>Experience:</strong> {{ $career->experience }}</p>
        <p><strong>Nationality:</strong> {{ $career->nationality }}</p>
        <p><strong>Status:</strong> {{ $career->job_status }}</p>
        <p><strong>Location:</strong> {{ $career->location }}</p>
    </div>

    <div class="prose max-w-none mb-10">
        {!! $career->job_description !!}
    </div>

    <div class="flex justify-center">
        <a href="{{ route('apply.form', $career->id) }}" 
           class="bg-green-600 text-white px-6 py-3 rounded-xl shadow hover:bg-green-700 transition duration-300">
            Apply Now
        </a>
    </div>
</div>
@endsection
