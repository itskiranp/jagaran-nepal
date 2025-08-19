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
    public function research()
    {
        return view('thematic-areas.research');
    }
    public function comingSoon()
    {
        return view('thematic-areas.coming-soon');
    }

    /**
     * Show the form for creating a new thematic area.
     */
    public function create()
    {
        return view('thematic-areas.create');
    }
}