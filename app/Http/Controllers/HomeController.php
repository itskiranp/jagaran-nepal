<?php

namespace App\Http\Controllers;

use App\Models\CarouselItem;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Publication;

class HomeController extends Controller
{
    public function index()
    {
        $carouselItems = CarouselItem::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->map(function ($item) {
                return [
                    'image' => asset('storage/' . $item->image_path),
                    'caption' => $item->caption
                ];
            });

        $aboutContent = "Established in 2009, JagaranNepal is a registered not for profit, purely youth run and led organization working to promote youth participation through empowerment and advocacy...";

        $projects = Project::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($project) {
                return [
                    'title' => $project->title,
                    'description' => $project->description,
                    'image' => asset('storage/' . $project->image_path),
                    'link' => $project->external_link ?: route('projects.show', $project->slug)
                ];
            });

        $recentBlogs = BlogPost::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get()
            ->map(function ($post) {
                return [
                    'title' => $post->title,
                    'image' => asset('storage/' . $post->image_path),
                    'date' => $post->published_at->format('d M, Y'),
                    'slug' => $post->slug
                ];
            });

        return view('home', compact('carouselItems', 'aboutContent', 'projects', 'recentBlogs'));
    }
}