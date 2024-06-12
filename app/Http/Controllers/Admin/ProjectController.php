<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Type;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug($form_data['title']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $form_data['image'] = $path;
        }
        $form_data['type_id'] = $request->input('type_id'); // Aggiunto il campo type_id
        $newProject = Project::create($form_data);

        return redirect()->route('admin.projects.index')->with('message', 'Nuovo progetto creato correttamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load('type');
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
    
    if ($project->title !== $form_data['title']) {
        $form_data['slug'] = Project::generateSlug($form_data['title']);
    }
    
    if ($request->hasFile('image')) {
        // Elimina l'immagine precedente se esiste
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        // Salva la nuova immagine
        $path = $request->file('image')->store('images', 'public');
        $form_data['image'] = $path;
    }
    $form_data['type_id'] = $request->input('type_id'); // Aggiunto il campo type_id
    $project->update($form_data);
    
    return redirect()->route('admin.projects.index')->with('message', 'Progetto aggiornato correttamente');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', $project->title . ' è stato eliminato');
    }
}
