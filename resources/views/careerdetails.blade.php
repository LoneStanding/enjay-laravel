@extends('layout.app')

@section('content')
<div class="w-full flex flex-col items-center justify-center mt-32">
    <h1 class="text-5xl text-center mb-10">Careers</h1>
    <p class="text-center text-lg mb-20">Join our team and be a part of our innovative journey.</p>

    <div class="tabs mb-10 bg-white rounded-lg py-2.5 px-5 shadow-md w-[80%]">
        <div class="w-full">
            <h2 class="text-3xl font-bold my-4 text-center">{{ $career->job_title }}</h2>
            <p class="text-lg">Qualification: <span class="text">{{ $career->qualification }}</span></p>
            <p class="text-lg">Experience: <span class="text">{{ $career->experience }}</span></p>
            <p class="text-lg">Nationality: <span class="text">{{ $career->nationality }}</span></p>
            <p class="text-lg">Job Status: <span class="text">{{ $career->job_status }}</span></p>
            <p class="text-lg">Location: <span class="text">{{ $career->job_location }}</span></p>
            <a href="/about-us" class="bg-btn-primary rounded-2xl px-5 py-2.5 my-10 font-light w-fit inline-block">
                Apply Now
            </a>
        </div>
    </div>
</div>
@endsection
