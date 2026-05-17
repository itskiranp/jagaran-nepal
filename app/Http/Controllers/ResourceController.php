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
            ->get()
            ->map(function ($item) {
                $downloadLink = $item->file_path ? asset('storage/' . $item->file_path) : ($item->external_link ?: '#');
                return (object)[
                    'title' => $item->title,
                    'date' => $item->published_at ? $item->published_at->format('Y-m-d') : now()->format('Y-m-d'),
                    'download_link' => $downloadLink
                ];
            });

        // Add static resources as fallbacks
        $staticResources = [
            (object)[ 'title' => 'An Advocacy Brief on CSE in Nepal', 'date' => '2024-08-20', 'download_link' => '#' ],
            (object)[ 'title' => 'Choices and Voices Nepali Version', 'date' => '2024-06-12', 'download_link' => '#' ],
        ];

        // Merge database records with static ones (database entries display first)
        $mergedResources = $resources->merge($staticResources);

        return view('resources.index', ['resources' => $mergedResources]);
    }

    public function show($slug)
    {
        $resource = Publication::where('type', 'resource')
            ->where('slug', $slug)
            ->firstOrFail();
            
        return view('resources.show', compact('resource'));
    }
}