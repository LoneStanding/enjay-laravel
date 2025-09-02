@extends('layout.app')

@section('content')
<div class="mt-32"></div>
<div class="mx-64 bg-white rounded-2xl shadow-lg p-10">
    <h1 class="text-3xl font-bold mb-6">Apply for: {{ $career->job_title }}</h1>

    <form action="{{ route('apply.submit', $career->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block mb-2 font-semibold">Full Name</label>
                <input type="text" name="name" required class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Gender</label>
                <select name="gender" required class="w-full border rounded-lg p-3">
                    <option value="">-- Select Gender --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold">Nationality</label>
                <input type="text" name="nationality" required class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Referral Name (Optional)</label>
                <input type="text" name="referal_name" class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Email</label>
                <input type="email" name="email" required class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Phone</label>
                <input type="text" name="phone" required class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Experience</label>
                <input type="text" name="experience" required class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Current Salary</label>
                <input type="text" name="current_salary" class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Expected Salary</label>
                <input type="text" name="expected_salary" class="w-full border rounded-lg p-3">
            </div>

            <div class="md:col-span-2">
                <label class="block mb-2 font-semibold">Upload CV (PDF/DOC/DOCX)</label>
                <input type="file" name="cv" required class="w-full border rounded-lg p-3">
            </div>
        </div>

        <div class="flex justify-center mt-6">
            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-xl shadow hover:bg-green-700 transition duration-300">
                Submit Application
            </button>
        </div>
    </form>
</div>
@endsection
