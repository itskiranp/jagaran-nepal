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
                $imagePath = $item->image_path;
                if (is_array($imagePath)) {
                    $imagePath = reset($imagePath); // Get first image if array
                } elseif (is_string($imagePath)) {
                    // check if it's stored as JSON string like ["path"]
                    $decoded = json_decode($imagePath, true);
                    if (is_array($decoded)) {
                        $imagePath = reset($decoded);
                    }
                }

                return [
                    'title' => $item->title,
                    'image' => $imagePath ? asset('storage/' . $imagePath) : null,
                    'caption' => $item->caption,
                    'description' => $item->description,
                    'link_url' => $item->link_url,
                    'link_text' => $item->link_text,
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
                    'image' => $post->image_path ? asset('storage/' . $post->image_path) : 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?crop=entropy&cs=srgb&fm=jpg&fit=crop&w=400&q=80',
                    'date' => $post->published_at->format('d M, Y'),
                    'slug' => $post->slug,
                    'excerpt' => $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 100)
                ];
            });

        return view('home', compact('carouselItems', 'aboutContent', 'projects', 'recentBlogs'));
    }
}