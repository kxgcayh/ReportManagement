<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('permission:View Locations|Manage Locations', ['only' => ['index', 'show']]);
        $this->middleware('permission:Manage Locations', ['only' => ['store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::orderBy('created_at', 'DESC')->paginate(10);
        return view('projects.index', compact('projects'))
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
            // description
        ]);

        $projects = new Project;
        $projects->name = $request->name;
        $projects->is_active = 0;
        $projects->description = $request->description ;
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
        $projects = Project::find($id_project);
        return view('projects.show', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id_project)
    {
        $projects = Project::findOrFail($id_project);
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
}
