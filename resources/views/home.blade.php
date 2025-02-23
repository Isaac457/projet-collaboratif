<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Résumé des Projets -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Mes Projets</h2>
            @if($projects->count() > 0)
                <div class="space-y-4">
                    @foreach($projects as $project)
                        <div class="border-b pb-4">
                            <h3 class="font-medium">{{ $project->title }}</h3>
                            <p class="text-sm text-gray-600">
                                {{ Str::limit($project->description, 100) }}
                            </p>
                            <div class="mt-2">
                                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">
                                    {{ $project->status }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <a href="{{ route('projects.index') }}" class="text-blue-500 hover:text-blue-600">
                        Voir tous les projets →
                    </a>
                </div>
            @else
                <p class="text-gray-600">Aucun projet pour le moment.</p>
                <a href="{{ route('projects.create') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Créer un projet
                </a>
            @endif
        </div>

        <!-- Tâches Récentes -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Tâches Récentes</h2>
            @if($tasks->count() > 0)
                <div class="space-y-4">
                    @foreach($tasks as $task)
                        <div class="border-b pb-4">
                            <h3 class="font-medium">{{ $task->title }}</h3>
                            <p class="text-sm text-gray-600">
                                Projet: {{ $task->project->title }}
                            </p>
                            <div class="mt-2">
                                <span class="text-xs {{ $task->status == 'terminée' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} px-2 py-1 rounded">
                                    {{ $task->status }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">Aucune tâche récente.</p>
            @endif
        </div>

        <!-- Notifications -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Notifications</h2>
            @if($notifications->count() > 0)
                <div class="space-y-4">
                    @foreach($notifications as $notification)
                        <div class="border-b pb-4">
                            <p class="text-sm">
                                {{ $notification->data['message'] }}
                            </p>
                            <span class="text-xs text-gray-500">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">Aucune notification.</p>
            @endif
        </div>
    </div>
</div>
@endsection