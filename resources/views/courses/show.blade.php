@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="bg-white p-6 rounded-lg shadow flex justify-between items-center">
        <div>
            <span class="text-xs font-mono bg-blue-100 text-blue-800 px-2 py-1 rounded font-bold">{{ $course->code }}</span>
            <h1 class="text-2xl font-bold text-slate-900 mt-2">{{ $course->title }}</h1>
            <p class="text-xs text-slate-500 mt-1">Credits: {{ $course->credits }}</p>
        </div>
        <a href="{{ route('courses.index') }}" class="text-sm bg-slate-200 hover:bg-slate-300 px-3 py-1.5 rounded font-semibold">Back to Catalog</a>
    </div>

    <!-- Enrolled Students Section -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-bold mb-4">Enrolled Students ({{ $course->students->count() }})</h2>
        <div class="space-y-3">
            @forelse($course->students as $student)
            <div class="flex justify-between items-center p-3 bg-slate-50 border rounded">
                <div>
                    <span class="font-bold text-sm">{{ $student->full_name }}</span>
                    <p class="text-xs text-slate-600 font-mono">ID: {{ $student->student_number }} | {{ $student->email }}</p>
                </div>
                <a href="{{ route('students.show', $student->id) }}" class="text-xs bg-slate-200 hover:bg-slate-300 px-3 py-1.5 rounded font-bold">View Student</a>
            </div>
            @empty
            <p class="text-sm text-slate-500">No students enrolled in this course yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection