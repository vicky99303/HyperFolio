<div class="p-4 bg-white rounded shadow">
    <p>{{ $detail }}</p>
</div>

<div class="mt-6">
    <button hx-get="{{ route('projects.index') }}" hx-target="closest main" hx-swap="innerHTML">Back to Projects</button>
</div>