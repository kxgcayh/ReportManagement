<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:project-create', ['only' => ['create','store']]);
        // $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $projects = Project::orderBy('id_project', 'DESC')->paginate(5);
        return view('projects.index', compact('projects'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::orderBy('name', 'ASC')->get();
        return view('projects.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        $projects = Project::create($input);
        return redirect()->route('projects.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_project)
    {
        $projects = Project::with('projects')->find($id_project);
        // $departements = Departement::find($id_departement);
        return view('projects.show', compact('projects'));
    }

}
