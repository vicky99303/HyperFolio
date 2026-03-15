@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded shadow" id="project-modal-content">

        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('projects.index') }}"
               class="inline-block px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 modal-close">
                &larr; Back
            </a>
        </div>

        <h2 class="text-2xl font-bold mb-4">
            {{ isset($project) ? 'Edit Project' : 'Add New Project' }}
        </h2>

        <form action="{{ isset($project) ? route('projects.update', $project) : route('projects.store') }}"
              method="POST"
              hx-post="{{ isset($project) ? route('projects.update', $project) : route('projects.store') }}"
              hx-target="#project-modal-content"
              hx-swap="innerHTML"
              hx-on:after-request="if(event.detail.successful) {
                  const modal = document.getElementById('project-modal');
                  if(modal) {
                      modal.classList.remove('flex');
                      modal.classList.add('hidden');
                  }
                  this.innerHTML = '<div class=\'p-6 bg-green-100 text-green-800 rounded\'>Project {{ isset($project) ? 'updated' : 'created' }} successfully!</div>';
              }">

            @csrf
            @if(isset($project))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="title" class="block font-semibold mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ $project->title ?? '' }}" placeholder="Project Title" required class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="description" class="block font-semibold mb-1">Description</label>
                <textarea id="description" name="description" placeholder="Project Description" class="w-full border rounded px-3 py-2">{{ $project->description ?? '' }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block font-semibold mb-1">Image URL</label>
                <input type="url" id="image" name="image" value="{{ $project->image ?? '' }}" placeholder="https://example.com/image.jpg" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="link" class="block font-semibold mb-1">Project Link</label>
                <input type="url" id="link" name="link" value="{{ $project->link ?? '' }}" placeholder="https://example.com" class="w-full border rounded px-3 py-2">
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" class="modal-close px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Back</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">{{ isset($project) ? 'Update' : 'Create' }}</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('click', function(event) {
            if(event.target.matches('.modal-close')) {
                const modal = document.getElementById('project-modal');
                if(modal) {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                }
            }
        });
    </script>
@endsection