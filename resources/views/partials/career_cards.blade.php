@forelse($careers as $career)
    <div class="bg-white rounded-3xl p-10 shadow-lg">
        <h2 class="text-2xl font-bold mb-4">{{ $career->job_title }}</h2>
        <p>Location: <span>{{ $career->location }}</span></p>
        <a href="{{ route('careers.show', $career->id) }}" class="text-blue-500 hover:underline">Know More</a>
    </div>
@empty
    @for($i = 1; $i <= 3; $i++)
        <div class="bg-white rounded-3xl p-10 shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Sample Job Title {{ $i }}</h2>
            <p>Location: <span>Sample Location</span></p>
            <a href="{{ route('careers.show', $career->id) }}" 
               class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-300">
                Know More
            </a>
        </div>
    @endfor
@endforelse
