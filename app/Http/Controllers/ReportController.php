<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Machine;
use App\Models\Production;
use App\Models\Product;
use App\Models\Project;
use App\Models\Category;
use App\Models\Report;
use App\Models\Type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('permission:View Reports|Manage Reports', ['only' => ['index', 'show']]);
        $this->middleware('permission:Manage Reports', ['only' => ['store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reports = Report::with('brand', 'category', 'production', 'product', 'machine', 'project', 'type', 'createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->paginate(10);
        $user_reports = Report::with('brand', 'category', 'production', 'product', 'machine', 'project', 'type', 'createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(5);
        $inactive = Report::with('brand', 'category', 'production', 'product', 'machine', 'project', 'type', 'createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->where('is_active', 0)->get();
        $trashed = Report::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->onlyTrashed()->get();
        return view('reports.index', compact('reports', 'user_reports', 'inactive', 'trashed'))
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
        $machines = Machine::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        $productions = Production::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        $products = Product::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        $projects = Project::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        $types = Type::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();

        return view('reports.create',
        compact(
        'brands', 'categories', 'machines', 'productions', 'products', 'projects', 'types'
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
            'machine_id' => 'required|exists:ms_machines,id_machine',
            'production_id' => 'required|exists:tr_productions,id_production',
            'product_id' => 'required|exists:tr_products,id_product',
            'project_id' => 'required|exists:ms_projects,id_project',
            'type_id' => 'required|exists:ms_types,id_type',
            'file' => 'required|mimes:pdf,xlx,csv,txt|max:2048'
        ]);
        $reports = new Report;
        $reports->name = $request->name;

        $fileName = time().'.'.$request->file->extension();
        $reports->file = $request->file->move(public_path('uploads'), $fileName);

        $reports->is_active = 0;
        $reports->approval = 0;
        $reports->brand_id = $request->brand_id;
        $reports->category_id = $request->category_id;
        $reports->machine_id = $request->machine_id;
        $reports->production_id = $request->production_id;
        $reports->product_id = $request->product_id;
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
            'machine_id' => 'required|exists:ms_machines,id_machines',
            'production_id' => 'required|exists:tr_productions,id_production',
            'product_id' => 'required|exists:tr_products,id_product',
            'project_id' => 'required|exists:ms_projects,id_project',
            'type_id' => 'required|exists:ms_types,id_type',
            'file' => 'required|mimes:pdf,xlx,csv,txt|max:2048'
        ]);

        $reports = Report::findOrFail($id_report);
        $reports->name = $request->name;
        $reports->brand_id = $request->brand_id;
        $reports->category_id = $request->category_id;
        $reports->machine_id = $request->machine_id;
        $reports->production_id = $request->production_id;
        $reports->product_id = $request->product_id;
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
    public function destroy($id_report)
    {
        $reports = Report::findOrFail($id_report);
        $reports->delete();
        return redirect()->back()->with([
            'success' => '<strong>' . $reports->name . '</strong> Has been deleted'
        ]);
    }

    public function restore($id_report)
    {
        $reports = Report::onlyTrashed()->where('id_report', $id_report);
        $reports->restore();
        return redirect()->back()->with(['success' => 'Report Restored']);
    }

    public function forceDelete($id_report)
    {
        $reports = Report::onlyTrashed()->where('id_report', $id_report);
        $reports->forceDelete();
        return redirect()->back()->with(['success' => 'Report Deleted']);
    }

    public function show($id_report)
    {
        $reports = Report::with('createdBy', 'updatedBy')->findOrFail($id_report);
        return view('reports.edit', compact('reports'));
    }
}
