<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $types = Type::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->paginate(5);
        $user_types = Type::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(5);
        $inactive = Type::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->where('is_active', 0)->get();
        return view('types.index', compact('types', 'user_types', 'inactive'))
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

        $types = new Type;
        $types->name = $request->name;
        $types->is_active = 0;
        $types->created_by = Auth::id();
        $types->save();

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
        $types = Type::with('createdBy', 'updatedBy')->findOrFail($id_type);
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
            $types->name = $request->name;
            $types->updated_by = Auth::id();
            $types->save();
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
