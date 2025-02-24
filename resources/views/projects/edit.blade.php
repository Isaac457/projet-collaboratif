<!-- resources/views/projects/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-[#26474E] mb-6">Modifier le Projet</h1>
    <form action="{{ route('projects.update', $project) }}" method="POST" class="bg-white p-6 shadow-lg rounded-xl">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-[#26474E] font-semibold">Titre</label>
            <input type="text" name="title" id="title" value="{{ $project->title }}" class="w-full p-2 border border-[#76CDCD] rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-[#26474E] font-semibold">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full p-2 border border-[#76CDCD] rounded-lg">{{ $project->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="status" class="block text-[#26474E] font-semibold">Statut</label>
            <select name="status" id="status" class="w-full p-2 border border-[#76CDCD] rounded-lg">
                <option value="en cours" {{ $project->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminé" {{ $project->status == 'terminé' ? 'selected' : '' }}>Terminé</option>
                <option value="en attente" {{ $project->status == 'en attente' ? 'selected' : '' }}>En attente</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="end_date" class="block text-[#26474E] font-semibold">Date de fin</label>
            <input type="date" name="end_date" id="end_date" value="{{ $project->end_date }}" class="w-full p-2 border border-[#76CDCD] rounded-lg">
        </div>
        <button type="submit" class="bg-white text-[#26474E] border border-[#26474E] px-4 py-2 rounded-lg">Mettre à jour</button>
    </form>
</div>
@endsection

