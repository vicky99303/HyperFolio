@extends('layouts.app')

@section('content')
    <section class="text-center">
        <h2 class="text-4xl font-bold mb-4">Hi, I’m Abdul Waqar</h2>
        <p class="text-lg mb-6">This is my portfolio built with Laravel, HTMX, and Tailwind CSS.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-2">Project 1</h3>
                <p>Short description of project 1.</p>
                <button class="mt-2 px-3 py-1 bg-blue-600 text-white rounded"
                        hx-get="{{ route('projects.show', 1) }}"
                        hx-target="#project-details"
                        hx-swap="innerHTML">
                    View Details
                </button>
            </div>

            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-2">Project 2</h3>
                <p>Short description of project 2.</p>
                <button class="mt-2 px-3 py-1 bg-blue-600 text-white rounded"
                        hx-get="{{ route('projects.show', 2) }}"
                        hx-target="#project-details"
                        hx-swap="innerHTML">
                    View Details
                </button>
            </div>

            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-2">Project 3</h3>
                <p>Short description of project 3.</p>
                <button class="mt-2 px-3 py-1 bg-blue-600 text-white rounded"
                        hx-get="{{ route('projects.show', 3) }}"
                        hx-target="#project-details"
                        hx-swap="innerHTML">
                    View Details
                </button>
            </div>
        </div>

        <div id="project-details" class="mt-6 p-4 bg-gray-100 rounded"></div>
    </section>
    <script>
        const projectDetails = document.getElementById('project-details');

        // Log every HTMX response (success)
        document.body.addEventListener('htmx:afterRequest', function(event) {
            if (projectDetails) {
                projectDetails.style.display = 'block';
            }
        });

        // Handle HTMX errors (404, 500, etc.)
        document.body.addEventListener('htmx:responseError', function(event) {
            const status = event.detail.xhr.status;
            if (status === 404) {
                // Hide project details on 404
                if (projectDetails) {
                    projectDetails.style.display = 'none';
                    projectDetails.innerHTML = event.detail.xhr.statusText;
                }
            }
        });
    </script>
@endsection