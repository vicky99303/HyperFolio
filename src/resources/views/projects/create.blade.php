<div>
    <h3 class="text-2xl font-bold mb-4">Add New Project</h3>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label class="block font-semibold">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-2">
            <label class="block font-semibold">Description</label>
            <textarea name="description" class="w-full border p-2 rounded"></textarea>
        </div>

        <div class="mb-2">
            <label class="block font-semibold">Image URL</label>
            <input type="url" name="image" class="w-full border p-2 rounded">
        </div>

        <div class="mb-2">
            <label class="block font-semibold">Project Link</label>
            <input type="url" name="link" class="w-full border p-2 rounded">
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Create Project</button>
        </div>
    </form>
</div>