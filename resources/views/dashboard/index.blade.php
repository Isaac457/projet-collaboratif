@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Tableau de bord</h1>

    <div class="flex space-x-4 mt-6">
        <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Créer un Projet</a>
        <a href="{{ route('projects.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Voir tous les Projets</a>
        <a href="{{ route('tasks.index') }}" class="bg-green-500 text-white px-4 py-2 rounded">Voir toutes les Tâches</a>
    </div>



    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-blue-500 text-white p-4 rounded shadow">
            <h3 class="text-lg font-bold">Total Projets</h3>
            <p class="text-2xl">{{ $projects->count() }}</p>
        </div>
        <div class="bg-green-500 text-white p-4 rounded shadow">
            <h3 class="text-lg font-bold">Tâches Terminées</h3>
            <p class="text-2xl">{{ $tasks->where('status', 'terminé')->count() }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded shadow">
            <h3 class="text-lg font-bold">Tâches en Cours</h3>
            <p class="text-2xl">{{ $tasks->where('status', 'en cours')->count() }}</p>
        </div>
    </div>



    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($projects as $project)
            <div class="bg-white p-4 shadow rounded">
                <h2 class="text-lg font-bold">{{ $project->title }}</h2>
                <p class="text-gray-600">{{ $project->description }}</p>
                <p class="text-sm text-gray-500">Statut: {{ ucfirst($project->status) }}</p>
                <p class="text-sm text-gray-500">Échéance: {{ $project->end_date }}</p>
            </div>
        @endforeach
    </div>

    <h2 class="text-xl font-bold mt-8">Tâches urgentes</h2>
    <ul class="list-disc pl-5">
        @foreach ($tasks as $task)
            <li class="text-gray-700">{{ $task->title }} (Échéance: {{ $task->due_date }})</li>
        @endforeach
    </ul>


    <h2 class="text-xl font-bold mt-8">Notifications récentes</h2>
    <ul class="list-disc pl-5">
        @foreach ($notifications as $notification)
            <li class="text-gray-700">{{ $notification->data['message'] ?? 'Nouvelle notification' }}</li>
        @endforeach
    </ul>

</div>
@endsection
