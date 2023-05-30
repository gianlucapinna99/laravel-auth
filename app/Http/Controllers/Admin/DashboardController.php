<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $totalRevenue = Project::sum('revenue');
        $lastEdit = Project::orderBy('updated_at', 'desc')->first();
        $lastCreation = Project::latest()->first();

        return view('admin.dashboard', compact('totalProjects', 'lastCreation', 'lastEdit', 'totalRevenue'));
    }
}
