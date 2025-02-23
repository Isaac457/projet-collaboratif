<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = auth()->user()->projects()->latest()->take(5)->get();
        $tasks = Task::whereHas('project', function($query) {
            $query->whereHas('users', function($q) {
                $q->where('users.id', auth()->id());
            });
        })->latest()->take(5)->get();
        
        $notifications = auth()->user()->notifications()->latest()->take(5)->get();

        return view('home', compact('projects', 'tasks', 'notifications'));
    }
}