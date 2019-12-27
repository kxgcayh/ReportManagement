<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MachineController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('permission:View Machines|Manage Machines', ['only' => 'index']);
        $this->middleware('permission:Manage Machines', ['only' => ['store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $machines = Machine::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->paginate(5);
        $user_machines = Machine::with('createdBy', 'updatedBy')->orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(5);
        $inactive = Machine::with('createdBy', 'updatedBy')->orderBy('created_at', 'ASC')->where('is_active', 0)->get();
        return view('machines.index', compact('user', 'machines', 'user_machines', 'inactive'))
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

        $machines = new Machine;
        $machines->name = $request->name;
        $machines->is_active = 0;
        $machines->created_by = Auth::id();
        $machines->save();

        return redirect()->back()
            ->with(['success' => 'Machine: ' . $machines->name . ' Succesfully Created']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_machine)
    {
        $machines = Machine::with('createdBy', 'updatedBy')->findOrFail($id_machine);
        return view('machines.edit', compact('machines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_machine)
    {
        request()->validate([
            'name' => 'required|string|max:50',
        ]);

        try {
            $machines = Machine::findOrFail($id_machine);
            $machines->name = $request->name;
            $machines->updated_by = Auth::id();
            $machines->save();
            return redirect(route('machines.index'))->with(['success' => 'Machine: ' . $machines->name . ' Changed']);
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
    public function destroy($id_machine)
    {
        $machines = Machine::findOrFail($id_machine);
        $machines->delete();
        return redirect()->back()->with(['danger' => 'Machine: ' . $machines->name . ' Succesfully Deleted']);
    }
}
