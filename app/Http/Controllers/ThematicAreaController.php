<?php

namespace App\Http\Controllers;

use App\Models\ThematicArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThematicAreaController extends Controller
{
    /**
     * Display the specified thematic area.
     */
  public function show($slug)
{
    $thematicArea = ThematicArea::where('slug', $slug)->firstOrFail();
    
    return view('thematic-areas.show', [
        'thematicArea' => $thematicArea,
        'imageUrl' => $thematicArea->image_path ? Storage::url($thematicArea->image_path) : null
    ]);
}

    /**
     * Display a listing of thematic areas.
     */
    public function index()
    {
        $thematicAreas = ThematicArea::active()
                            ->ordered()
                            ->get();

        return view('thematic-areas.index', compact('thematicAreas'));
    }

    /**
     * Show the form for creating a new thematic area.
     */
    public function create()
    {
        return view('thematic-areas.create');
    }

    /**
     * Store a newly created thematic area.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048', // 2MB max
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        $imagePath = $request->file('image')->store('thematic-areas', 'public');

        ThematicArea::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_path' => $imagePath,
            'order' => $validated['order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true
        ]);

        return redirect()->route('thematic-areas.index')
                         ->with('success', 'Thematic area created successfully.');
    }

    /**
     * Show the form for editing the specified thematic area.
     */
    public function edit(ThematicArea $thematicArea)
    {
        return view('thematic-areas.edit', [
            'thematicArea' => $thematicArea,
            'imageUrl' => Storage::url($thematicArea->image_path)
        ]);
    }

    /**
     * Update the specified thematic area.
     */
    public function update(Request $request, ThematicArea $thematicArea)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $updateData = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'order' => $validated['order'] ?? $thematicArea->order,
            'is_active' => $validated['is_active'] ?? $thematicArea->is_active
        ];

        // Handle image update if new image provided
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($thematicArea->image_path);
            
            // Store new image
            $updateData['image_path'] = $request->file('image')->store('thematic-areas', 'public');
        }

        $thematicArea->update($updateData);

        return redirect()->route('thematic-areas.show', $thematicArea)
                         ->with('success', 'Thematic area updated successfully.');
    }

    /**
     * Remove the specified thematic area.
     */
    public function destroy(ThematicArea $thematicArea)
    {
        // Delete associated image
        Storage::disk('public')->delete($thematicArea->image_path);
        
        $thematicArea->delete();

        return redirect()->route('thematic-areas.index')
                         ->with('success', 'Thematic area deleted successfully.');
    }
}