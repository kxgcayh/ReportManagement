<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductionController extends Controller
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
        $productions = Production::with('locations', 'createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->paginate(5);
        $user_productions = Production::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(5);
        $inactive = Production::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 0)->get();
        $locations = Location::orderBy('name', 'ASC')->get();
        $trashed = Production::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->onlyTrashed()->get();
        return view('productions.index', compact('productions', 'user_productions', 'inactive', 'locations', 'trashed'))
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
        $productions = new Production;
        $productions->name = $request->name;
        $productions->is_active = 0;
        $productions->location_id = $request->location_id;
        $productions->created_by = Auth::id();
        $productions->save();
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
        $productions = Production::with('createdBy', 'updatedBy')->findOrFail($id_production);
        $locations = location::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
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
        $productions->name = $request->name;
        $productions->location_id = $request->location_id;
        $productions->updated_by = Auth::id();
        $productions->save();

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

    public function restore($id_production)
    {
        $productions = Production::onlyTrashed()->where('id_production', $id_production);
        $productions->restore();
        return redirect()->back()->with(['success' => 'Production Restored']);
    }

    public function forceDelete($id_production)
    {
        $productions = Production::onlyTrashed()->where('id_production', $id_production);
        $productions->forceDelete();
        return redirect()->back()->with(['success' => 'Production Deleted']);
    }
}
