@extends('layouts.app')

@section('content')

<a href="/projects/create">Create new project</a>

<div class="flex">
    @forelse($projects as $project)
        <div class="bg-white mr-4 rounded shadow p-5 w-1/3" style="height: 200px;">
            <h3 class="text-xl py-4">{{ $project->title }}</h3>
            <div class="text-gray-500">{{ Str::limit($project->description, 100) }}</div>
        </div>
    @empty
        <div>No projects yet.</div>
    @endforelse
</div>

@endsection
