<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(5);
        return view('categories.index', compact('categories'))
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
        $categories = Category::create($request->all());
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
        $categories = Type::findOrFail($id_category);
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
            $categories->update([
                'name' => $request->name,
            ]);
            return redirect(route('categories.index'))->with(['success' => 'Type: ' . $categories->name . ' Changed']);
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
    public function destroy($id)
    {
        $categories = Type::findOrFail($id_type);
        $categories->delete();
        return redirect()->back()->with(['warning' => 'Category: ' . $categories->name . ' Succesfully Deleted']);
    }
}
