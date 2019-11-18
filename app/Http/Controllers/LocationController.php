<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('permission:View Locations|Manage Locations', ['only' => 'index']);
        $this->middleware('permission:Manage Locations', ['only' => ['store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $locations = Location::orderBy('created_at', 'DESC')->paginate(5);
        return view('locations.index', compact('locations'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        //validasi form
        request()->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);

        $locations = Location::create($request->all());

        return redirect()->back()
            ->with(['success' => 'Location: ' . $locations->name . ' Succesfully Created']);
    }

    public function destroy($id_location)
    {
        $locations = Location::findOrFail($id_location);
        $locations->delete();
        return redirect()->back()->with(['warning' => 'Location: ' . $locations->name . ' Succesfully Deleted']);
    }

    public function edit($id_location)
    {
        $locations = Location::findOrFail($id_location);
        return view('locations.edit', compact('locations'));
    }

    public function update(Request $request, $id_location)
    {
        //Form Validasi
        request()->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);

        try {
            //select data berdasarkan id
            $locations = Location::findOrFail($id_location);
            //update data
            $locations->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            return redirect(route('locations.index'))->with(['success' => 'Location: ' . $locations->name . ' Changed']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
