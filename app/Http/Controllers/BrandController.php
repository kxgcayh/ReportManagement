<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('verified');
        $this->middleware('permission:View Brands|Manage Brands', ['only' => 'index']);
        $this->middleware('permission:Manage Brands', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand::with('createdBy', 'updatedBy')->latest()->paginate(5);
        return view('brands.index', compact('brands'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $brands = Brand::orderBy('created_at', 'DESC')->paginate(5);
        return view('brands.create', compact('brands'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
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
            'name' => 'required|string|max:50',
            'detail' => 'required',
        ]);

        $brands = new Brand;
        $brands->name = $request->name;
        $brands->detail = $request->detail;
        $brands->is_active = 0;
        $brands->created_by = Auth::id();
        $brands->save();

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id_brand)
    {
        $brands = Brand::findOrFail($id_brand);
        return view('brands.edit', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_brand)
    {
        request()->validate([
            'name' => 'required|string|max:50',
            'detail' => 'required',
        ]);

        $brands = Brand::findOrFail($id_brand);
        $brands->name = $request->name;
        $brands->detail = $request->detail;
        $brands->updated_by = Auth::id();
        $brands->save();

        return redirect()->route('brands.index')
            ->with('success', 'Brand updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_brand)
    {
        $brands = Brand::findOrFail($id_brand);
        $brands->delete();
        return redirect()->back()->with(['success' => '<strong>' . $brands->name . '</strong> Telah Dihapus!']);
    }
}
