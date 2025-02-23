<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Afficher la liste des projets de l'utilisateur connecté
    public function index()
    {
        $projects = Project::where('owner_id', Auth::id())->get();
        return view('projects.index', compact('projects'));
    }

    // Afficher le formulaire de création d'un projet
    public function create()
    {
        return view('projects.create');
    }

    // Enregistrer un nouveau projet dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:en cours,terminé,en attente',
            'end_date' => 'nullable|date',
        ]);

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'end_date' => $request->end_date,
            'owner_id' => Auth::id(),
        ]);

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
    }

    // Afficher les détails d'un projet
    public function show(Project $project)
    {
        // Vérifier que l'utilisateur est bien le propriétaire du projet
        $this->authorize('view', $project);
        
        return view('projects.show', compact('project'));
    }

    // Afficher le formulaire d'édition d'un projet
    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.edit', compact('project'));
    }

    // Mettre à jour un projet existant
    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:en cours,terminé,en attente',
            'end_date' => 'nullable|date',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    // Supprimer un projet
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès.');
    }
}
