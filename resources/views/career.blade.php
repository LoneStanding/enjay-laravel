@extends('layout.app')

@section('content')
<div>
    <div class="mt-32"></div>
    <div class="mx-64 flex flex-col items-center">
        <h1 class="text-5xl text-center mb-10">Careers</h1>
        <p class="text-center text-lg mb-20">Join our team and be a part of our innovative journey.</p>
        
        <div class="flex justify-center gap-5 items-center">
            <button class="tabs mb-10 bg-white rounded-lg py-2.5 px-5 shadow-md hover:shadow-lg transition-shadow duration-300 filter-btn" data-category="all">
                All
            </button>
            @foreach($categories as $cat)
                <button class="tabs mb-10 bg-white rounded-lg py-2.5 px-5 shadow-md hover:shadow-lg transition-shadow duration-300 filter-btn" data-category="{{ $cat }}">
                    {{ $cat }}
                </button>
            @endforeach
        </div>

        <div id="career-list" class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @include('partials.career_cards', ['careers' => $careers])
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', function() {
        const category = this.getAttribute('data-category');

        fetch("{{ route('careers.filter') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ category })
        })
        .then(res => res.text())
        .then(html => {
            document.getElementById('career-list').innerHTML = html;
        });
    });
});
</script>
@endsection
