@extends('layouts.app')

@section('content')

<header class="flex items-center mb-3 py-4">
    <div class="flex justify-between w-full items-center">
        <h2 class="text-gray-600 text-sm font-normal">My Projects</h2>
        <a href="/projects/create" class="button">Create new project</a>
    </div>
</header>

<div class="lg:flex lg:flex-wrap -mx-3">
    @forelse($projects as $project)
        <div class="lg:w-1/3 px-3 pb-6">
            <div class="bg-white rounded-lg shadow p-5" style="height: 200px;">
                <h3 class="text-xl py-4 -ml-5 border-l-4 border-blue-300 pl-4 mb-3">
                    <a href="{{ $project->path() }}" class="text-black no-underline">
                        {{ $project->title }}
                    </a>
                </h3>
                <div class="text-gray-600">{{ Str::limit($project->description, 100) }}</div>
            </div>
        </div>
    @empty
        <div>No projects yet.</div>
    @endforelse
</div>

@endsection
