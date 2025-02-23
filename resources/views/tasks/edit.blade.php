<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-[#26474E]">Modifier la tâche</h1>
    <form action="{{ route('tasks.update', [$project, $task]) }}" method="POST" class="mt-6 bg-white shadow-md rounded-lg p-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-[#26474E] font-semibold">Titre</label>
            <input type="text" name="title" value="{{ $task->title }}" class="w-full border border-gray-300 p-2 rounded-lg">
        </div>
        <div class="mb-4">
            <label class="block text-[#26474E] font-semibold">Description</label>
            <textarea name="description" class="w-full border border-gray-300 p-2 rounded-lg">{{ $task->description }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-[#26474E] font-semibold">Date d'échéance</label>
            <input type="date" name="due_date" value="{{ $task->due_date }}" class="w-full border border-gray-300 p-2 rounded-lg">
        </div>
        <div class="mb-4">
            <label class="block text-[#26474E] font-semibold">Statut</label>
            <select name="status" class="w-full border border-gray-300 p-2 rounded-lg">
                <option value="en cours" {{ $task->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminée" {{ $task->status == 'terminée' ? 'selected' : '' }}>Terminée</option>
                <option value="suspendue" {{ $task->status == 'suspendue' ? 'selected' : '' }}>Suspendue</option>
            </select>
        </div>
        <button type="submit" class="bg-[#F27438] text-white px-4 py-2 rounded-lg">Mettre à jour</button>
    </form>
</div>
@endsection