<!-- resources/views/projects/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-[#26474E] mb-6">Mes Projets</h1>
    <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white border border-[#26474E] px-4 py-2 rounded-lg">Créer un Projet</a>
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($projects as $project)
            <div class="bg-white p-4 shadow-lg rounded-xl border-l-4 border-[#76CDCD]">
                <h2 class="text-xl font-semibold text-[#F9968B]">{{ $project->title }}</h2>
                <p class="text-gray-600">{{ $project->description }}</p>
                <p class="text-sm text-[#2CCED2] mt-2">Statut: {{ ucfirst($project->status) }}</p>
                <a href="{{ route('projects.show', $project) }}" class="text-[#26474E] mt-4 inline-block">Voir Détails</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
