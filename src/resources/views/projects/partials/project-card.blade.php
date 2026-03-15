<div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
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
<button class="mt-2 px-3 py-1 bg-yellow-500 text-white rounded"
        hx-get="{{ route('projects.edit', $project) }}"
        hx-target="#project-modal-content"
        hx-swap="innerHTML">
    Edit
</button>

<form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure?');"
            class="mt-2 bg-red-500 text-white px-3 py-1 rounded">Delete</button>
</form>
</div>