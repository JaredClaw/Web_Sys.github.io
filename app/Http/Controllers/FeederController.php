<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeder;

class FeederController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feeders = Feeder::all();
        return view('feeders.index', compact('feeders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feeders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'pet_name' => 'required|string|max:255',
        'food_type' => 'required|string|max:255',
        'quantity' => 'required|numeric|min:1',
        'scheduled_time' => 'required|date_format:Y-m-d\TH:i',
    ]);

    // Convert datetime-local input to proper MySQL datetime format
    $validated['scheduled_time'] = date('Y-m-d H:i:s', strtotime($validated['scheduled_time']));

    \App\Models\Feeder::create($validated);

    return redirect()->route('feeders.index')->with('success', 'Feeder added successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feeder = Feeder::findOrFail($id);
        return view('feeders.show', compact('feeder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $feeder = Feeder::findOrFail($id);
        return view('feeders.edit', compact('feeder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'pet_name' => 'required|string|max:255',
            'food_type' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:1',
            'scheduled_time' => 'required',
        ]);

        $feeder = Feeder::findOrFail($id);
        $feeder->update($validated);

        return redirect()->route('feeders.index')->with('success', 'Feeder updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feeder = Feeder::findOrFail($id);
        $feeder->delete();

        return redirect()->route('feeders.index')->with('success', 'Feeder deleted!');
    }
}
