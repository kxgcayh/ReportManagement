<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class ProductionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:production-list|production-create|production-edit|production-delete', ['only' => ['index','store']]);
        $this->middleware('permission:production-create', ['only' => ['create','store']]);
        $this->middleware('permission:production-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:production-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productions = Production::with('location')->orderBy('created_at', 'DESC')->paginate(5);
        return view('productions.index', compact('productions'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $productions = Production::with('location')->orderBy('created_at', 'DESC')->paginate(5);
        $locations = Location::orderBy('name', 'ASC')->get();
        return view('productions.create', compact('productions', 'locations'))
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
            'location_id' => 'required|exists:ms_locations,id_location',
        ]);
        $productions = Production::create($request->all());
        return redirect(route('productions.index'))
            ->with(['success' => '<strong>' . $productions->name . '</strong> Ditambahkan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_production)
    {
        $productions = Production::findOrFail($id_production);
        $locations = location::orderBy('name', 'ASC')->get();
        return view('productions.edit', compact('productions', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_production)
    {
        request()->validate([
            'name' => 'required|string|max:100',
            'location_id' => 'required|exists:ms_locations,id_location',
        ]);

        $productions = Production::findOrFail($id_production);
        $productions->update($request->all());

        return redirect()->route('productions.index')
            ->with(['success' => '<strong>' . $productions->name . '</strong> Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_production)
    {
        $productions = Production::findOrFail($id_production);
        $productions->delete();
        return redirect()->back()->with(['success' => '<strong>' . $productions->name . '</strong> Telah Dihapus!']);
    }
}
