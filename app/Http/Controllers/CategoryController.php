<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('permission:Manage Data Master', ['only' => ['create', 'store', 'edit', 'update', 'destroy', 'index']]);
    }

    /**
     * $categories for Admin and Manager
     * $user_categories for Users
     * $inactive for Users
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $categories = Category::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->paginate(5);
        $user_categories = Category::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(5);
        $inactive = Category::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->where('is_active', 0)->get();
        $trashed = Category::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->onlyTrashed()->get();
        return view('categories.index', compact('categories', 'user', 'user_categories', 'inactive', 'trashed'))
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
        ]);
        $categories = new Category;
        $categories->name = $request->name;
        $categories->is_active = 0;
        $categories->created_by = Auth::id();
        $categories->save();

        return redirect()->back()
            ->with(['success' => 'Category: ' . $categories->name . ' Succesfully Created']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_category)
    {
        $categories = Category::with('createdBy', 'updatedBy')->findOrFail($id_category);
        return view('categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_category)
    {
        request()->validate([
            'name' => 'required|string|max:50',
        ]);

        try {
            $categories = Category::findOrFail($id_category);
            $categories->name = $request->name;
            $categories->updated_by = Auth::id();
            $categories->save();
            return redirect(route('categories.index'))->with(['success' => 'Category: ' . $categories->name . ' Changed']);
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
    public function destroy($id_category)
    {
        $categories = Category::findOrFail($id_category);
        $categories->delete();
        return redirect()->back()->with(['danger' => 'Category: ' . $categories->name . ' Succesfully Deleted']);
    }

    public function restore($id_category)
    {
        $brands = Category::onlyTrashed()->where('id_category', $id_category);
        $brands->restore();
        return redirect()->back()->with(['success' => 'Category Restored']);
    }

    public function forceDelete($id_category)
    {
        $brands = Category::onlyTrashed()->where('id_category', $id_category);
        $brands->forceDelete();
        return redirect()->back()->with(['success' => 'Category Deleted']);
    }
}
