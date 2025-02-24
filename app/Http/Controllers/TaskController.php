<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Afficher toutes les tâches d'un projet
    public function index(Project $project)
    {
        $tasks = $project->tasks()->get();
        return view('tasks.index', compact('project', 'tasks'));
    }

    // Afficher le formulaire de création d'une tâche
    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    // Enregistrer une tâche
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:en_cours,terminee,suspendue',
            'due_date' => 'nullable|date',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $project->tasks()->create($request->all());

        return redirect()->route('projects.show', $project)->with('success', 'Tâche ajoutée avec succès.');
    }

    // Afficher une tâche spécifique
    public function show(Project $project, Task $task)
    {
        return view('tasks.show', compact('project', 'task'));
    }

    // Formulaire de modification d'une tâche
    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }

    // Mise à jour d'une tâche
    public function update(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:en cours,terminée,suspendue',
            'due_date' => 'nullable|date',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $task->update($request->all());

        return redirect()->route('projects.show', $project)->with('success', 'Tâche mise à jour avec succès.');
    }

    // Suppression d'une tâche
    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect()->route('projects.show', $project)->with('success', 'Tâche supprimée avec succès.');
    }
}
