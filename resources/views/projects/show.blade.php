@extends('layouts.app')

@section('content')

<header class="mb-3 py-4">
    <div class="flex justify-between w-full items-end">
        <p class="text-gray-600 text-sm font-normal">
            <a href="/projects" class="text-gray-600 text-sm font-normal no-underline">My Projects</a> /
            {{ $project->title }}
        </p>
        <a href="/projects/create" class="button">Create new project</a>
    </div>
</header>

<main>
    <div class="flex -mx-3">
        <div class="lg:w-3/4 px-3">
            <div class="mb-8">
                <h2 class="text-lg text-gray-600 font-normal mb-3">Tasks</h2>
                {{-- Tasks --}}
                <div class="card">Lorem ipsum.</div>
            </div>

            <div>
                <h2 class="text-lg text-gray-600 font-normal mb-3">General Notes</h2>
                {{-- general notes --}}
                <textarea class="card w-full" style="min-height: 200px;">Lorem ipsum.</textarea>
            </div>
        </div>
        <div class="lg:w-1/4 px-3">
            @include('projects.card')
        </div>
    </div>
</main>



@endsection
