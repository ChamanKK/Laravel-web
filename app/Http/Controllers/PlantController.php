<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Category;
use Illuminate\Http\Request;


class PlantController extends Controller
{
    function index()
    {
        $plants = Plant::paginate(3); // 3 plants per page
        return view('plants.index', ['plants' => $plants]);

    }

    function create()
    {
        $categories = Category::all();

        return view('plants.create', compact('categories'));   
    }

    public function about()
    {
        $totalPlants = Plant::count();

        return view('plants.about', [
            'totalPlants' => $totalPlants
        ]);
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'category_id' => 'required|exists:categories,id',
            'date_planted' => 'required|date',
            'watering_frequency' => 'required|min:3|max:50',
        ]);

        $plant = new Plant();
        $plant->name = $request->name;
        $plant->category_id = $request->category_id;
        $plant->date_planted = $request->date_planted;
        $plant->watering_frequency = $request->watering_frequency;
        $plant->save();

        return redirect('/plants')
            ->with('success', 'Plant added successfully');
    }

    public function show($id) {
        $plant = Plant::with(['category', 'maintenances', 'journals'])->findOrFail($id);
        return view('plants.show', compact('plant'));
    }

    public function edit($id)
    {
        $plant = Plant::findOrFail($id);
        $categories = Category::all();

        return view('plants.edit', compact('plant', 'categories'));
    }

    public function update(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|min:2|max:50',
            'date_planted' => 'required|date',
            'watering_frequency' => 'required|min:3|max:50',
            'category_id' => 'nullable|exists:categories,id', 
        ]);

        // Find the plant by ID
        $plant = Plant::findOrFail($request->id);

        // Update plant info including category
        $plant->update([
            'name' => $request->name,
            'date_planted' => $request->date_planted,
            'watering_frequency' => $request->watering_frequency,
            'category_id' => $request->category_id, 
        ]);

        return redirect()->route('plants.show', $plant->id)
            ->with('success', 'Information updated successfully');
    }


    public function destroy(Request $request)
    {
        $plant = Plant::findOrFail($request->id);
        $plant->delete();
        
        return redirect('/plants')
            ->with('success', 'Deleted');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $plants = Plant::where('name', 'LIKE', "%{$query}%")
            ->orWhere('type', 'LIKE', "%{$query}%")
            ->paginate(3)
            ->appends(['query' => $query]);

        return view('plants.index', [
            'plants' => $plants,
            'searchQuery' => $query,
            'resultsCount' => $plants->total(),
        ]);
    }

     // Show create maintenance form
    public function createMaintenance(Plant $plant)
    {
        return view('plants.maintenances.create', compact('plant'));
    }

    // Store a new maintenance task
    public function storeMaintenance(Request $request, Plant $plant)
    {
        $validated = $request->validate([
            'task' => 'required|string|min:3|max:100',
            'frequency' => 'required|string|min:3|max:50',
            'last_done_date' => 'nullable|date',
            'notes' => 'nullable|string|max:255',
        ]);

        $plant->maintenances()->create($validated);

        return redirect("/plants/{$plant->id}")
            ->with('success', 'Maintenance task added successfully');
    }

    // Show form to create journal entry
    public function createJournal($plantId)
    {
        $plant = Plant::findOrFail($plantId);
        return view('plants.journals.create', compact('plant'));
    }

    // Store journal entry
    public function storeJournal(Request $request, $plantId)
    {
        $request->validate([
            'date' => 'required|date',
            'height' => 'nullable|string|max:50',
            'health_status' => 'nullable|string|max:50',
            'notes' => 'nullable|string|max:255',
        ]);

        $plant = Plant::findOrFail($plantId);

        $plant->journals()->create([
            'date' => $request->date,
            'height' => $request->height,
            'health_status' => $request->health_status,
            'notes' => $request->notes,
        ]);

        return redirect()->route('plants.show', $plantId)
            ->with('success', 'Journal entry added successfully.');
    }

}
