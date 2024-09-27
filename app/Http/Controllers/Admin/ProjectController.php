<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Functions\Helper;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('title')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['title'], Project::class);
        
        if(array_key_exists('path_img', $data)){
            $img_path = Storage::put('uploads', $data['path_img']);
            $original_name = $request->file('path_img')->getClientOriginalName();
            $data['path_img'] = $img_path;
            $data['img_original_name'] = $original_name;
        }

        $project = Project::create($data);

        if(array_key_exists('technologies', $data)){
            $project->technologies()->attach($data['technologies']);
        }

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, string $id)
    {
        $data = $request->all();
        $project = Project::find($id);

        if($data['title'] === $project->title){
            $data['slug'] = $project->slug;
        }else{
            $data['slug'] = Helper::generateSlug($data['title'], Project::class);
        };

        if(array_key_exists('path_img', $data)){
            $img_path = Storage::put('uploads', $data['path_img']);
            $original_name = $request->file('path_img')->getClientOriginalName();
            $data['path_img'] = $img_path;
            $data['img_original_name'] = $original_name;
        }

        $project->update($data);

        if(array_key_exists('technologies', $data)){
            $project->technologies()->sync($data['technologies']);
        }else{
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', $project)->with('edited', 'Modifica avvenuta con successo');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('admin.projects.index')->with('deleted', 'Cancellazione avvenuta con successo');
    }
}
