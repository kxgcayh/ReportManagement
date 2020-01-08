<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $this->middleware('permission:Manage Data Master', ['only' => ['create', 'store', 'edit', 'update', 'destroy', 'index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('name', 'ASC')->get();
        $brands = Brand::with('createdBy', 'updatedBy', 'products')->orderBy('created_at', 'DESC')->paginate(5);
        $user_brands = Brand::with('createdBy', 'updatedBy', 'products')->orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(5);
        $inactive = Brand::with('createdBy', 'updatedBy', 'products')->orderBy('created_at', 'DESC')->where('is_active', 0)->get();
        $trashed = Brand::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->onlyTrashed()->get();
        return view('brands.index', compact('products', 'brands', 'user_brands', 'inactive', 'trashed'))
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
            'product_id' => 'required|exists:tr_products,id_product',
            'name' => 'required|string|max:50',
            'detail' => 'required',
        ]);

        $brands = new Brand;
        $brands->product_id = $request->product_id;
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
        $products = Product::orderBy('name', 'ASC')->get();
        $brands = Brand::with('createdBy', 'updatedBy', 'products')->findOrFail($id_brand);
        return view('brands.edit', compact('products', 'brands'));
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
            'product_id' => 'required|exists:tr_products,id_product',
            'name' => 'required|string|max:50',
            'detail' => 'required',
        ]);

        $brands = Brand::findOrFail($id_brand);
        $brands->product_id = $request->product_id;
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

    public function restore($id_brand)
    {
        $brands = Brand::onlyTrashed()->where('id_brand', $id_brand);
        $brands->restore();
        return redirect()->back()->with(['success' => 'Brand Restored']);
    }

    public function forceDelete($id_brand)
    {
        $brands = Brand::onlyTrashed()->where('id_brand', $id_brand);
        $brands->forceDelete();
        return redirect()->back()->with(['success' => 'Brand Deleted']);
    }
}
