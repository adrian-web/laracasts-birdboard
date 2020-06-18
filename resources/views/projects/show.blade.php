@extends('layouts.app')

@section('content')

<header class="mb-3 py-4">
    <div class="flex justify-between w-full items-end">
        <p class="text-gray-600 text-sm font-normal">
            <a href="/projects" class="text-gray-600 text-sm font-normal no-underline">My Projects</a> /
            {{ $project->title }}
        </p>
        <a href="{{ $project->path() . '/edit' }}" class="button">Edit project</a>
    </div>
</header>

<main>
    <div class="flex -mx-3">
        <div class="lg:w-3/4 px-3">
            <div class="mb-8">
                <h2 class="text-lg text-gray-600 font-normal mb-3">Tasks</h2>
                {{-- Tasks --}}
                @foreach($project->tasks as $task)
                    <div class="card mb-3">
                        <form action="{{ $task->path() }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="flex">
                                <input type="text" value="{{ $task->body }}" name="body"
                                    class="w-full
                                    {{ $task->completed ? 'text-gray-600' : '' }}">
                                <input type="checkbox" name="completed" onchange="this.form.submit()"
                                    {{ $task->completed ? 'checked' : '' }}>
                            </div>
                        </form>
                    </div>
                @endforeach
                <div class="card">
                    <form action="{{ $project->path() . '/tasks' }}" method="post">
                        @csrf
                        <input type="text" placeholder="Add a task" class="w-full" name="body">
                    </form>
                </div>
            </div>

            <div>
                <h2 class="text-lg text-gray-600 font-normal mb-3">General Notes</h2>
                {{-- general notes --}}
                <form action="{{ $project->path() }}" method="post">
                    @method('PATCH')
                    @csrf
                    <textarea name="notes" class="card w-full mb-4" style="min-height: 200px;"
                        placeholder="notes...">{{ $project->notes }}</textarea>
                    <button type="submit" class="button">Save</button>
                </form>
            </div>
        </div>
        <div class="lg:w-1/4 px-3">
            @include('projects.card')
        </div>
    </div>
</main>



@endsection
