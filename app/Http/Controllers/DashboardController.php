<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $projects = Project::where('owner_id', $user->id)->orWhereHas('members', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        $tasks = Task::whereIn('project_id', $projects->pluck('id'))
                     ->where('status', 'en cours')
                     ->orderBy('due_date', 'asc')
                     ->limit(5)
                     ->get();
                     
         
        
        
        $notifications = $user->notifications()->latest()->limit(5)->get();

        return view('dashboard.index', compact('projects', 'tasks', 'notifications'));

        
    }
}
