<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Doctrine\DBAL\Schema\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            $projects = Project::paginate(3);

        } else {
            $projects = Project::where('user_id', $user->id)->paginate(3);
        }
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.projects.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $data['slug'] = $slug;
        $data['live_site'] = $request->live_site;
        $data['git_repository'] = $request->git_repository;
        //$currentUser = Auth::user();
        $data['user_id'] = Auth::id();
        if ($request->hasFile('image')) {
            $image_path = Storage::put('uploads', $request->image);
            $data['image'] = asset('storage/' . $image_path);
        }
        $project = Project::create($data);

        if ($request->has('tags')) {
            $project->tags()->attach($request->tags);
        }
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {
        if (!Auth::user()->is_admin && $project->user_id !== Auth::id()) {
            abort(403);
        }
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        if (!Auth::user()->is_admin && $project->user_id !== Auth::id()) {
            abort(403);
        }
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.projects.edit', compact('project', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $data['slug'] = $slug;
        $data['live_site'] = $request->live_site;
        $data['git_repository'] = $request->git_repository;
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }
            $image_path = Storage::put('uploads', $request->image);
            $data['image'] = asset('storage/' . $image_path);
        }
        $project->update($data);
        if ($request->has('tags')) {
            $project->tags()->sync($request->tags);
        } else {
            $project->tags()->sync([]);
        }
        return redirect()->route('admin.projects.show', $project->slug)->with('message', 'Il progetto è stato aggiornato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            $datogliere = "http://127.0.0.1:8000/storage/";
            $imagetoremove = str_replace($datogliere, '', $project->image);
            //dd($imagetoremove);
            Storage::delete($imagetoremove);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title deleted successfully.");
    }
}
