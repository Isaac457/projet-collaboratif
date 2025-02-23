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
            <a href="{{ route('projects.edit', $project) }}" class="bg-[#F27438] text-white px-4 py-2 rounded-lg">Modifier</a>
            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg" onclick="return confirm('Voulez-vous vraiment supprimer ce projet ?');">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
