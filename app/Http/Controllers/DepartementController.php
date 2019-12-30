<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartementController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('permission:View Departements|Manage Departements', ['only' => 'index']);
        $this->middleware('permission:Manage Departements', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        // Mengenalkan Nama Departemen dan Lokasi
        $departements = Departement::with('locations', 'createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->paginate(5);
        $locations = Location::orderBy('name', 'ASC')->get();
        $user_departements = Departement::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(5);
        $inactive = Departement::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 0)->get();
        $trashed = Departement::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->onlyTrashed()->get();
        // Menampilkan Nama Departemen dan Lokasi pada List Departemen
        return view('departements.index', compact('departements', 'user_departements', 'inactive', 'locations', 'trashed'))
            ->with('no', ($request->input('page', 1) - 1) * 10);
    }

    public function store(Request $request)
    {
        // Validasi Data
        request()->validate([
            'name' => 'required|string|max:100',
            'location_id' => 'required|exists:ms_locations,id_location',
        ]);
        // Input Data
        $departements = new Departement;
        $departements->name = $request->name;
        $departements->is_active = 0;
        $departements->location_id = $request->location_id;
        $departements->created_by = Auth::id();
        $departements->save();
        // Redirect dengan Pesan Sukses
        return redirect(route('departements.index'))
            ->with(['success' => '<strong>' . $departements->name . '</strong> Ditambahkan']);
    }

    public function destroy($id_departement)
    {
        // Query Select based on $id_departement
        $departements = Departement::findOrFail($id_departement);
        // Delete Data from Table
        $departements->delete();
        // Redirect dengan Pesan Sukses
        return redirect()->back()->with(['success' => '<strong>' . $departements->name . '</strong> Telah Dihapus!']);
    }

    public function edit($id_departement)
    {
        // Query Select based on $id_departement
        $departements = Departement::with('createdBy', 'updatedBy')->findOrFail($id_departement);
        $locations = Location::with('createdBy', 'updatedBy')->orderBy('name', 'ASC')->get();
        return view('departements.edit', compact('departements', 'locations'));
    }

    public function update(Request $request, $id_departement)
    {
        // Validasi Data
        request()->validate([
            'name' => 'required|string|max:100',
            'location_id' => 'required|exists:ms_locations,id_location',
        ]);
        // Query Select based on $id_departement
        $departements = Departement::findOrFail($id_departement);
        $departements->name = $request->name;
        $departements->location_id = $request->location_id;
        $departements->updated_by = Auth::id();
        $departements->save();
        // Update Data
        $departements->update([
            'name' => $request->name,
            'location_id' => $request->location_id
        ]);
        // Redirect dengan Pesan Sukses
        return redirect(route('departements.index'))
            ->with(['success' => '<strong>' . $departements->name . '</strong> Diperbarui']);
    }

    public function restore($id_departement)
    {
        $departements = Departement::onlyTrashed()->where('id_departement', $id_departement);
        $departements->restore();
        return redirect()->back()->with(['success' => 'Departement Restored']);
    }

    public function forceDelete($id_departement)
    {
        $departements = Departement::onlyTrashed()->where('id_departement', $id_departement);
        $departements->forceDelete();
        return redirect()->back()->with(['success' => 'Departement Deleted']);
    }
}
