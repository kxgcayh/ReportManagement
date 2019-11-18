<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('permission:View Types|Manage Types', ['only' => 'index']);
        $this->middleware('permission:Manage Types', ['only' => ['store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = Type::orderBy('created_at', 'DESC')->paginate(5);
        return view('types.index', compact('types'))
            ->with('no', ($request->input('page', 1) - 1) * 5);
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

        $types = Type::create($request->all());

        return redirect()->back()
            ->with(['success' => 'Type: ' . $types->name . ' Succesfully Created']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_type)
    {
        $types = Type::findOrFail($id_type);
        return view('types.edit', compact('types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_type)
    {
        request()->validate([
            'name' => 'required|string|max:50',
        ]);

        try {
            $types = Type::findOrFail($id_type);
            $types->update([
                'name' => $request->name,
            ]);
            return redirect(route('types.index'))->with(['success' => 'Type: ' . $types->name . ' Changed']);
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
    public function destroy($id_type)
    {
        $types = Type::findOrFail($id_type);
        $types->delete();
        return redirect()->back()->with(['warning' => 'Type: ' . $types->name . ' Succesfully Deleted']);
    }
}
