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

        // Add static resources
        $staticResources = [
            (object)[ 'title' => 'An Advocacy Brief on CSE in Nepal', 'date' => '2024-08-20', 'download_link' => '#' ],
            (object)[ 'title' => 'Choices and Voices Nepali Version', 'date' => '2024-06-12', 'download_link' => '#' ],
        ];

        // Merge static resources with paginated resources
        $mergedResources = collect($staticResources)->merge($resources->getCollection());

        // Optionally, you can create a new paginator if you want to keep pagination
        $resources->setCollection($mergedResources);

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