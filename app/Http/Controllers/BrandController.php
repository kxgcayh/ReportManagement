<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand::latest()->paginate(5);
        return view('brands.index', compact('brands'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productions = Production::orderBy('name', 'ASC')->get();
        $brands = Brand::with('production')->orderBy('created_at', 'DESC')->paginate(10);
        return view('brands.create', compact('productions', 'brands'));
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
            // 'production_id' => 'required',
            'name' => 'required',
            'detail' => 'required',
        ]);

        Brand::create($request->all());
        return redirect()->route('brands.index')
            ->with('success', 'Brand created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brands)
    {
        return view('brands.show', compact('brand'));
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
        $productions = Production::orderBy('name', 'ASC')->get();
        return view('brands.edit', compact('brands','productions'));
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
            'name' => 'required',
            'production_id' => 'required|exists:tr_productions,id_production',
            'detail' => 'required',
        ]);

        $brands = Brand::findOrFail($id_brand);
        $brands->update($request->all());

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
        return redirect()->back()->with([
            'success' => '<strong>' . $brands->name . '</strong> Telah Dihapus!'
        ]);        
    }
}
