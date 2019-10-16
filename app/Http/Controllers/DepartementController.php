<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
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
        request()->validate([
            'name' => 'required|string|max:100',
            'location_id' => 'required|exists:ms_locations,id_location',
        ]);

        // Input data Departemen
        $departements = Departement::create($request->all());

        return redirect(route('departement.index'))
                ->with(['success' => '<strong>' . $departements->name . '</strong> Ditambahkan']);
    }
}
