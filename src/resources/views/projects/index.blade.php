@extends('layouts.app')

@section('content')
    <section class="max-w-6xl mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">My Projects</h2>
            <!-- Add New Project Button -->
            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
                    hx-get="{{ route('projects.create') }}"
                    hx-target="#project-modal-content"
                    hx-swap="innerHTML">
                + Add New Project
            </button>
        </div>


        <!-- HTMX Modal -->
        <div id="project-modal"
             class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center p-6">
            <div id="project-modal-content"
                 class="bg-white rounded shadow-lg p-6 relative max-w-2xl w-full">
                <button type="button" class="modal-close absolute top-2 right-2 text-gray-600 text-2xl font-bold">&times;</button>
                <!-- HTMX will inject forms or details here -->
            </div>
        </div>
        <!-- Success Message Container -->
        <div id="success-message-container" class="mb-4"></div>
        <!-- Project Grid -->
        <div id="projects-grid" class="grid md:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <div class="bg-white p-4 rounded shadow hover:shadow-lg transition" id="project-{{ $project->id }}">
                    <h3 class="text-xl font-semibold">{{ $project->title }}</h3>
                    <p>{{ Str::limit($project->description, 60) }}</p>

                    <!-- HTMX View Details button -->
                    <button class="mt-2 px-3 py-1 bg-blue-600 text-white rounded"
                            hx-get="{{ route('projects.show', $project) }}"
                            hx-target="#project-modal-content"
                            hx-swap="innerHTML">
                        View Details
                    </button>

                    <!-- Edit & Delete buttons -->
                    <a href="{{ route('projects.edit', $project) }}"
                       class="mt-2 inline-block bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>

                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?');"
                                class="mt-2 bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $projects->links() }}
        </div>
    </section>

    <!-- Example Partial Project Card for HTMX OOB Swap -->
    <!--
    <template id="project-card-template">
        <div class="bg-white p-4 rounded shadow hover:shadow-lg transition" id="project-{{ $project->id }}" hx-swap-oob="beforeend:#projects-grid">
            <h3 class="text-xl font-semibold">{{ $project->title }}</h3>
            <p>{{ Str::limit($project->description, 60) }}</p>

            <button class="mt-2 px-3 py-1 bg-blue-600 text-white rounded"
                    hx-get="{{ route('projects.show', $project->id) }}"
                    hx-target="#project-modal-content"
                    hx-swap="innerHTML">
                View Details
            </button>

            <a href="{{ route('projects.edit', $project->id) }}"
               class="mt-2 inline-block bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>

            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
                @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure?');"
            class="mt-2 bg-red-500 text-white px-3 py-1 rounded">Delete</button>
</form>
</div>
</template>
-->

    <script>
        const modal = document.getElementById('project-modal');
        const modalContent = document.getElementById('project-modal-content');

        // Function to show modal
        function showModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // Function to hide modal and reset content
        function hideModal() {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            modalContent.innerHTML = '<button type="button" class="modal-close absolute top-2 right-2 text-gray-600 text-2xl font-bold">&times;</button>';
        }

        // Event delegation for modal close button
        modal.addEventListener('click', function(event) {
            if(event.target === modal || event.target.classList.contains('modal-close')) {
                hideModal();
            }
        });

        // Show modal after HTMX swaps content into modal-content
        document.body.addEventListener('htmx:afterSwap', function(event) {
            if(event.detail.target.id === "project-modal-content") {
                showModal();
            }
            if(event.detail.target.id === "projects-grid") {
                // make sure new project cards are visible after OOB swap
                event.detail.target.scrollIntoView({ behavior: 'smooth' });
                // If the swap is a result of a successful project creation, close modal and show success message
                // We'll check if the triggering element was a project creation form
                if (window.lastHTMXTriggeringElement && window.lastHTMXTriggeringElement.closest('form') && window.lastHTMXTriggeringElement.closest('form').id === 'project-create-form') {
                    hideModal();
                    // Show success message
                    const msgContainer = document.getElementById('success-message-container');
                    msgContainer.innerHTML = `<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        Project added successfully!
                    </div>`;
                    // Remove after 3 seconds
                    setTimeout(() => { msgContainer.innerHTML = ''; }, 3000);
                }
            }
        });

        // Keep track of the last triggering element for HTMX requests
        document.body.addEventListener('htmx:configRequest', function(event) {
            window.lastHTMXTriggeringElement = event.detail.elt;
        });

        // Handle HTMX errors (404, etc.)
        document.body.addEventListener('htmx:responseError', function(event) {
            if(event.detail.xhr.status === 404) {
                hideModal();
                alert("Project not found.");
            }
        });
    </script>
@endsection