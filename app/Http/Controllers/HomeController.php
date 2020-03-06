<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reportCount = Report::count();
        $projectCount = Project::count();
        return view('home', compact('reportCount', 'projectCount'));
    }
}
