<!-- resources/views/projects/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-[#26474E] mb-6">Détails du Projet</h1>
    <div class="bg-white p-6 shadow-lg rounded-xl border-l-4 border-[#76CDCD]">
        <h2 class="text-2xl font-semibold text-[#F9968B]">{{ $project->title }}</h2>
        <p class="text-gray-600 mt-2">{{ $project->description }}</p>
        <p class="text-sm text-[#2CCED2] mt-2">Statut: {{ ucfirst($project->status) }}</p>
        <p class="text-sm text-gray-500">Date de fin: {{ $project->end_date ?? 'Non définie' }}</p>
        
        <div class="mt-4">
            <a href="{{ route('projects.edit', $project) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Modifier</a>
            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg" onclick="return confirm('Voulez-vous vraiment supprimer ce projet ?');">Supprimer</button>
            </form>
        </div>


    </div>

    <div class="mt-6">
        <h2 class="text-xl font-semibold text-[#26474E]">Liste des tâches</h2>

        @if($tasks->isEmpty())
            <p class="text-gray-500 mt-2">Aucune tâche pour ce projet.</p>
            <a href="{{ route('projects.tasks.create', $project) }}" class="bg-blue-500 text-white  px-4 py-2 rounded-lg inline-block mt-4">
                + Ajouter une tâche
            </a>
        @else
            <table class="w-full mt-4 border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">Titre</th>
                        <th class="border p-2">Statut</th>
                        <th class="border p-2">Date d'échéance</th>
                        <th class="border p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="border p-2">{{ $task->title }}</td>
                            <td class="border p-2">
                                <span class="px-2 py-1 text-white rounded-lg
                                    {{ $task->status == 'en cours' ? 'bg-blue-500' : ($task->status == 'terminée' ? 'bg-green-500' : 'bg-yellow-500') }}">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </td>
                            <td class="border p-2">{{ $task->due_date }}</td>
                            <td class="border p-2">
                                <a href="{{ route('projects.tasks.show', ['project' => $project, 'task' => $task]) }}" class="text-blue-500">Voir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('projects.tasks.create', ['project' => $project]) }}" class="bg-blue-500 text-white  px-4 py-2 rounded-lg inline-block mt-4">
                + Ajouter une tâche
            </a>
        @endif
    </div>
















</div>
@endsection
