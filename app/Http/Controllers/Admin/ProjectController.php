<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', ['projects' => $projects]);
    }
    public function create()
    {
        return view('admin.projects.form');
    }
    public function store(Request $request, $id = null)
    {
        $validated = $request->validate([
            'pname' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        try {
            $project = Project::updateOrCreate(
                ['id' => $id],
                $validated
            );

            $items = json_decode($request->items_json, true);

            $project->items()->delete();

            if (is_array($items)) {
                foreach ($items as $item) {
                    $project->items()->create([
                        'name' => $item['name'],
                        'unit_price' => $item['unit_price'],
                        'quantity' => (int)$item['quantity'],
                        'available_quantity' => (int)$item['quantity'],
                        'type' => $item['type'],
                    ]);
                }
            }

            $message = $id ? 'Project updated successfully.' : 'Project created successfully.';
            return redirect()->route('admin.projects.create')->with('success', $message);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }



    public function edit(Project $project)
    {
        $project->load('items');
        return view('admin.projects.form', compact('project'));
    }
    public function destroy(Project $project)
    {
        try {
            $project->delete();
            return redirect()->route('admin.projects')->with('success', 'Project deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete project: ' . $e->getMessage());
        }
    }
}
