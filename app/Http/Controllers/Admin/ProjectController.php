<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Mostra un elenco di tutti i progetti.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', ['projects' => $projects]);
    }

    /**
     * Mostra il modulo per creare un nuovo progetto.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Salva un nuovo progetto nel database.
     */
    public function store(StoreProjectRequest $request)
    {
        $validatedData = $request->validated();

        // Crea un nuovo progetto e riempilo con i dati validati
        $new_project = Project::create($validatedData);

        // Aggiungi dati supplementari
        $new_project->slug = Str::slug($new_project->project_name, '-');
        $new_project->is_completed = $request['is_completed'] ? 1 : 0;

        // Gestione dell'immagine del progetto
        if (isset($validatedData['project_image'])) {
            $new_project->project_image = Storage::put('uploads', $validatedData['project_image']);
        }

        $new_project->save();

        return redirect()->route('admin.projects.show', $new_project->id)->with('message', 'Progetto creato correttamente');
    }

    /**
     * Mostra un progetto specifico.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', ['project' => $project]);
    }

    /**
     * Mostra il modulo per modificare un progetto specifico.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', ['project' => $project]);
    }

    /**
     * Aggiorna un progetto specifico nel database.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validatedData = $request->validated();

        // Aggiornamento dati supplementari
        $project->is_completed = $request['is_completed'] ? 1 : 0;
        $project->slug = Str::slug($project->project_name, '-');

        // Gestione dell'immagine del progetto
        if (isset($validatedData['project_image'])) {

            // Rimuove l'immagine precedente se esiste
            if ($project->project_image) {
                Storage::delete($project->project_image);
            }

            $project->project_image = Storage::put('uploads', $validatedData['project_image']);
        } elseif (isset($validatedData['delete_prev_image']) && $validatedData['delete_prev_image'] == 'true') {
            Storage::delete($project->project_image);
            $project->project_image = null;
        }
        $project->update($validatedData);

        return redirect()->route('admin.projects.show', $project->id)->with('message', 'Hai modificato con successo il progetto');
    }

    /**
     * Rimuove un progetto specifico dal database.
     */
    public function destroy(Project $project)
    {
        $project_name = $project->project_name;
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', "$project_name eliminato con successo");
    }
}
