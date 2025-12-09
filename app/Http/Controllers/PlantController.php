<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;


class PlantController extends Controller
{
    function index()
    {
        $plants = Plant::all();
        return view('plants.index',['plants' => $plants]);
    }

    function create()
    {
        return view('plants.create');    
    }

    function about()
    {
        return "About the amazing Garden app (from the controller)";
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'type' => 'required|min:3|max:50',
            'date_planted' => 'required|date',
            'watering_frequency' => 'required|min:3|max:50',
        ]);

        $plant = new Plant();
        $plant->name = $request->name;
        $plant->type = $request->type;
        $plant->date_planted = $request->date_planted;
        $plant->watering_frequency = $request->watering_frequency;
        $plant->save();

        return redirect('/plants');
    }

    function show($id)
    {
        $plant = Plant::findOrFail($id);
        return view('plants.show', ['plant' => $plant]);
    }

    function edit($id)
    {
        $plant = Plant::find($id);
        return view('plants.edit', ['plant' => $plant]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'type' => 'required|min:3|max:50',
            'date_planted' => 'required|date',
            'watering_frequency' => 'required|min:3|max:50',
        ]);

        $plant = Plant::findOrFail($request->id);
        $plant->update([
            'name' => $request->name,
            'date_planted' => $request->date_planted,
            'type' => $request->type,
            'watering_frequency' => $request->watering_frequency,
        ]);

        return redirect('/plants');
    }

    public function destroy(Request $request)
    {
        $plant = Plant::findOrFail($request->id);
        $plant->delete();
        
        return redirect('/plants');
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $plants = Plant::where('name', 'LIKE', "%$query%")
            ->orWhere('type', 'LIKE', "%$query%")
            ->get();

        return view('plants.index', ['plants' => $plants]);
    }
}
