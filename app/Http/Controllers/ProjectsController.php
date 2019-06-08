<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $projects = Project::where('user_id', auth()->id())->get();


        return view('projects.index', compact('projects'));
    }

    public function show(Project $project){

        if($project->user_id !==auth()->id()) {

            abort(403);
        }

        return view('projects.show', compact('project'));
    }

    public function create(){

        return view('projects.create', compact('projects'));
    }


    public function store(){

        $props = request()->validate([
            'title'=> ['required','min:3','max:255'],
            'description'=>['required', 'min:3']
        ]);

        $props['user_id'] = auth()->id();

        return redirect('/projects');

    }


    public function edit(Project $project){

        
        return view('projects.edit', compact('project'));
    }
    
    public function update(Project $project){
        $project->update(request(['title', 'description']));
        $project->save();

        return redirect('/projects');
    }



    public function destroy(Project $project){
        $project->delete();


        return redirect('/projects');
    }
}
