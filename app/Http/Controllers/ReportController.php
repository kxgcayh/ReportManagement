<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Project;
use App\Models\Category;
use App\Models\Report;
use App\Models\Type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reports = Report::with('brand', 'category', 'project', 'type', 'user')->orderBy('created_at', 'DESC')->paginate(10);
        return view('reports.index', compact('reports'))
        ->with('no', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        $brands = Brand::orderBy('name', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        $projects = Project::orderBy('name', 'ASC')->get();
        $types = Type::orderBy('name', 'ASC')->get();

        return view('reports.create',
        compact(
        'brands', 'categories', 'projects', 'types'
                ))->with('no', (request()->input('page', 1) - 1) * 10);
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
            'name' => 'required|string|max:100',            
            'brand_id' => 'required|exists:tr_brands,id_brand',
            'category_id' => 'required|exists:ms_categories,id_category',
            'project_id' => 'required|exists:ms_projects,id_project',
            'type_id' => 'required|exists:ms_types,id_type',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048'
        ]);
        $reports = new Report;
        $reports->name = $request->name;

        $fileName = time().'.'.$request->file->extension();
        $reports->file = $request->file->move(public_path('uploads'), $fileName);
                
        $reports->is_active = 0;
        $reports->approval = 0;
        $reports->brand_id = $request->brand_id;
        $reports->category_id = $request->category_id;
        $reports->project_id = $request->project_id;
        $reports->type_id = $request->type_id;
        $reports->created_by = Auth::id();
        $reports->save();
        return redirect(route('reports.index'))
            ->with(['success' => '<strong>' . $reports->name . '</strong> Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
