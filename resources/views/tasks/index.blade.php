<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-[#26474E]">Liste des tâches du projet : {{ $project->title }}</h1>
    <a href="{{ route('tasks.create', $project) }}" class="mt-4 inline-block bg-[#F27438] text-white px-4 py-2 rounded-lg">Ajouter une tâche</a>
    
    <div class="mt-6 bg-white shadow-md rounded-lg p-4">
        @foreach($project->tasks as $task)
            <div class="border-b border-gray-200 py-2 flex justify-between items-center">
                <a href="{{ route('tasks.show', [$project, $task]) }}" class="text-[#26474E] font-semibold">{{ $task->title }}</a>
                <span class="px-2 py-1 text-sm rounded-full bg-[#76CDCD] text-white">{{ $task->status }}</span>
            </div>
        @endforeach
    </div>
</div>
@endsection
