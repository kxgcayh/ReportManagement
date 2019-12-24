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
        $reports = Report::with('brand', 'category', 'project', 'type', 'createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->paginate(10);
        $user_reports = Report::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(5);
        $inactive = Report::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->where('is_active', 0)->get();
        return view('reports.index', compact('reports', 'user_reports', 'inactive'))
        ->with('no', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $brands = Brand::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        $categories = Category::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        $projects = Project::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        $types = Type::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_report)
    {
        $reports = Report::with('createdBy', 'updatedBy')->findOrFail($id_report);
        $brands = Brand::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        $categories = Category::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        $projects = Project::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        $types = Type::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        return view('reports.edit', compact('reports', 'brands', 'categories', 'projects', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_report)
    {
        request()->validate([
            'name' => 'required|string|max:100',
            'brand_id' => 'required|exists:tr_brands,id_brand',
            'category_id' => 'required|exists:ms_categories,id_category',
            'project_id' => 'required|exists:ms_projects,id_project',
            'type_id' => 'required|exists:ms_types,id_type',
            'file' => 'required|mimes:pdf,xlx,csv,txt|max:2048'
        ]);

        $reports = Project::findOrFail($id_report);
        $reports->name = $request->name;
        $reports->brand_id = $request->brand_id;
        $reports->category_id = $request->category_id;
        $reports->project_id = $request->project_id;
        $reports->type_id = $request->type_id;
        $fileName = time().'.'.$request->file->extension();
        $reports->file = $request->file->move(public_path('uploads'), $fileName);
        $reports->updated_by = Auth::id();
        $reports->save();

        return redirect()->route('reports.index')
            ->with('success', 'Report updated successfully');
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
