<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
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
        $productions = Production::orderBy('name', 'ASC')->get();
        $products = Product::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->paginate(5);
        $user_products = Product::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(5);
        $inactive = Product::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 0)->get();
        $trashed = Product::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->onlyTrashed()->get();
        return view('products.index', compact('products','productions', 'user_products', 'inactive', 'trashed'))
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
            'name' => 'required|string|max:100',
            'production_id' => 'required|exists:tr_productions,id_production',
            'detail' => 'required',
        ]);
        $products = new Product;
        $products->production_id = $request->production_id;
        $products->name = $request->name;
        $products->is_active = 0;
        $products->detail = $request->detail;
        $products->created_by = Auth::id();
        $products->save();
        return redirect(route('products.index'))
            ->with(['success' => '<strong>' . $products->name . '</strong> Ditambahkan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_product)
    {
        $productions = Production::orderBy('name', 'ASC')->get();
        $products = Product::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->findOrFail($id_product);
        return view('products.edit', compact('products', 'productions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_product)
    {
        request()->validate([
            'name' => 'required|string|max:100',
            'production_id' => 'required|exists:tr_productions,id_production',
            'detail' => 'required',
        ]);

        try {
            $products = Product::findOrFail($id_product);
            $products->name = $request->name;
            $products->updated_by = Auth::id();
            $products->save();
            return redirect(route('products.index'))->with(['success' => 'Product: ' . $products->name . ' Changed']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_product)
    {
        $products = Product::findOrFail($id_product);
        $products->delete();
        return redirect()->back()->with(['success' => '<strong>' . $products->name . '</strong> Telah Dihapus!']);
    }

    public function restore($id_product)
    {
        $products = Product::onlyTrashed()->where('id_product', $id_product);
        $products->restore();
        return redirect()->back()->with(['success' => 'Product Restored']);
    }

    public function forceDelete($id_product)
    {
        $products = Product::onlyTrashed()->where('id_product', $id_product);
        $products->forceDelete();
        return redirect()->back()->with(['success' => 'Product Deleted']);
    }
}
