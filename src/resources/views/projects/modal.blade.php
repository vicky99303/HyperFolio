<div class="bg-white rounded shadow-lg p-6 max-w-2xl mx-auto relative">
    <button
            onclick="document.getElementById('project-details').style.display = 'none';
            document.getElementById('project-details').classList.remove('flex')"
            class="absolute top-2 right-4 text-gray-500 text-3xl">&times;
    </button>
    <h3 class="text-2xl font-bold mb-2">{{ $project->title }}</h3>
    <img src="{{ $project->image }}" alt="{{ $project->title }}" class="rounded mb-4">
    <p class="mb-2">{{ $project->description }}</p>
    @if($project->skills()->exists())
        <p class="text-gray-600"><strong>Skills:</strong> {{ $project->skills->pluck('name')->join(', ') }}</p>
    @endif
    @if($project->link)
        <a href="{{ $project->link }}" target="_blank" class="text-blue-600 hover:underline">Visit Project</a>
    @endif
</div>