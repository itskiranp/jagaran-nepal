<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Publication::where('type', 'resource')
            ->orderBy('published_at', 'desc')
            ->paginate(10);
            
        return view('resources.index', compact('resources'));
    }

    public function show($slug)
    {
        $resource = Publication::where('type', 'resource')
            ->where('slug', $slug)
            ->firstOrFail();
            
        return view('resources.show', compact('resource'));
    }
}