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

        $aboutContent = "Established in 2003, Jagaran Nepal is a registered non-profit, purely youth-run and youth-led organization based in Makawanpur. We are a passionate group of young professionals with proven experience and knowledge in development and social transformation. Since our founding, we have empowered youth to engage in local and global (glocal) issues, combat social injustices, and promote peace, harmony, and humanitarian values. Jagaran Nepal believes in urgent action, innovation, and the need for transformation to build a more inclusive and enlightened society.";


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