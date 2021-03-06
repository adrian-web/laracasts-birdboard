<div class="card flex flex-col" style="height: 200px;">
    <h3 class="text-xl py-4 -ml-5 border-l-4 border-blue-300 pl-4 mb-3">
        <a href="{{ $project->path() }}" class="text-black no-underline">
            {{ $project->title }}
        </a>
    </h3>
    <div class="text-gray-600 mb-4 flex-1">{{ Str::limit($project->description, 100) }}</div>

    @can('manage', $project)
    <footer>
        <form action="{{ $project->path() }}" method="post" class="text-right">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-xs">Delete</button>
        </form>
    </footer>
    @endcan
</div>