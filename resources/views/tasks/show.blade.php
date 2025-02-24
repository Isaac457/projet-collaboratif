<!-- resources/views/tasks/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-[#26474E]">Détails de la tâche</h1>
    <div class="mt-6 bg-white shadow-md rounded-lg p-4">
        <h2 class="text-xl font-semibold text-[#26474E]">{{ $task->title }}</h2>
        <p class="mt-2 text-gray-600">{{ $task->description }}</p>
        <p class="mt-2 text-gray-600"><strong>Date d'échéance :</strong> {{ $task->due_date }}</p>
        <p class="mt-2 text-gray-600"><strong>Statut :</strong> <span class="px-2 py-1 text-sm rounded-full bg-[#76CDCD] text-[#2CCED2]">{{ $task->status }}</span></p>
        <div class="mt-4">
            <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Modifier</a>
            <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
