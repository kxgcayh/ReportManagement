<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Machine;
use App\Models\Production;
use App\Models\Product;
use App\Models\Category;
use App\Models\Report;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('permission:Manage Projects', ['only' => ['create', 'store', 'edit', 'update', 'destroy', 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->paginate(5);
        $user_projects = Project::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(5);
        $inactive = Project::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->where('is_active', 0)->get();
        $trashed = Project::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->onlyTrashed()->get();
        return view('projects.index', compact('projects', 'user_projects', 'inactive', 'trashed'))
            ->with('no', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'nullable|string',
        ]);

        $projects = new Project;
        $projects->name = $request->name;
        $projects->is_active = 0;
        $projects->description = $request->description;
        $projects->created_by = Auth::id();
        $projects->save();

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project
     * @return \Illuminate\Http\Response
     */
    public function show($id_project)
    {
        $reports = Report::where('project_id', $id_project)->findOrFail($id_project);
        return view('projects.show', compact('reports'))
        ->with('no', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id_project)
    {
        $projects = Project::with('createdBy', 'updatedBy')->findOrFail($id_project);
        return view('projects.edit', compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_project)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $projects = Project::findOrFail($id_project);
        $projects->name = $request->name;
        $projects->description = $request->description ;
        $projects->updated_by = Auth::id();
        $projects->save();

        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_project)
    {
        $projects = Project::findOrFail($id_project);
        $projects->delete();
        return redirect()->back()->with([
            'success' => '<strong>' . $projects->name . '</strong> Telah Dihapus!'
        ]);
    }

    public function restore($id_project)
    {
        $projects = Project::onlyTrashed()->where('id_project', $id_project);
        $projects->restore();
        return redirect()->back()->with(['success' => 'Project Restored']);
    }

    public function forceDelete($id_project)
    {
        $projects = Project::onlyTrashed()->where('id_project', $id_project);
        $projects->forceDelete();
        return redirect()->back()->with(['success' => 'Project Deleted']);
    }
}
