<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
        public function ind()
        {
            $department = Department::all();
            return view('views.auth.register',compact('department'));
        }
    public function index()
    {
        // Mengenalkan Nama Departemen dan Lokasi
        $departements = Departement::with('location')->orderBy('created_at', 'DESC')->paginate(10);
        // Menampilkan Nama Departemen dan Lokasi pada List Departemen
        return view('departements.index', compact('departements','locations'));
    }

    public function create()
    {
        // Mengenalkan Location pada Dropdown Create
        $locations = Location::orderBy('name', 'ASC')->get();
        // Mengenalkan Nama Departemen dan Lokasi
        $departements = Departement::with('location')->orderBy('created_at', 'DESC')->paginate(10);
        // Menampilkan Nama Departemen dan Lokasi pada List Departemen
        return view('departements.create', compact('departements','locations'));

    }

    public function store(Request $request)
    {
        // Validasi Data
        request()->validate([
            'name' => 'required|string|max:100',
            'location_id' => 'required|exists:ms_locations,id_location',
        ]);
        // Input Data
        $departements = Departement::create($request->all());
        // Redirect dengan Pesan Sukses
        return redirect(route('departement.index'))
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
        $departements = Departement::findOrFail($id_departement);
        $locations = Location::orderBy('name', 'ASC')->get();
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
        // Update Data
        $departements->update([
            'name' => $request->name,
            'location_id' => $request->location_id
        ]);
        // Redirect dengan Pesan Sukses
        return redirect(route('departement.index'))
                ->with(['success' => '<strong>' . $departements->name . '</strong> Diperbarui']);
    }
}
