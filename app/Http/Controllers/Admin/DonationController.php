<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('user.projects.index', ['projects' => $projects]);
    }
    public function selectProject($id)
    {
        $project = Project::with(['items', 'donations'])->findOrFail($id);
        $totalDonated = $project->donations()->sum('total_price');
        return view('user.donates.index', ['project' => $project, 'totalDonated' => $totalDonated]);
    }

    public function donateProject()
    {
        $donatedProject = Donation::with(['project'])->where('user_id', Auth::user()->id)->get();
        return view('user.donates.donate_project', ['donatedProject' => $donatedProject]);
    }
}
