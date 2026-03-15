@extends('layouts.app')

@section('content')
    <section class="text-center">
        <h2 class="text-4xl font-bold mb-4">Hi, I’m Abdul Waqar</h2>
        <p class="text-lg mb-6">This is my portfolio built with Laravel, HTMX, and Tailwind CSS.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($projects as $project)
                <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                    <h3 class="font-semibold text-xl mb-2">{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>

                    <button class="mt-2 px-3 py-1 bg-blue-600 text-white rounded"
                            hx-get="{{ route('projects.show', $project->id) }}"
                            hx-target="#project-details"
                            hx-swap="innerHTML">
                        View Details
                    </button>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500">
                    No projects added yet.
                </div>
            @endforelse
        </div>

        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $projects->links() }}
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
                if (projectDetails) {
                    projectDetails.style.display = 'block';
                    projectDetails.innerHTML = '<div class="text-red-600">Project not found.</div>';
                }
            }
        });
    </script>
@endsection