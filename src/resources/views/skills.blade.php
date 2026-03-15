@extends('layouts.app')

@section('content')
    <section class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
        <h2 class="text-3xl font-bold mb-4">Skills</h2>
        <ul class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <li class="p-2 bg-gray-100 rounded text-center font-semibold">Laravel</li>
            <li class="p-2 bg-gray-100 rounded text-center font-semibold">PHP</li>
            <li class="p-2 bg-gray-100 rounded text-center font-semibold">HTMX</li>
            <li class="p-2 bg-gray-100 rounded text-center font-semibold">Tailwind CSS</li>
            <li class="p-2 bg-gray-100 rounded text-center font-semibold">MySQL</li>
            <li class="p-2 bg-gray-100 rounded text-center font-semibold">JavaScript</li>
        </ul>
    </section>
@endsection