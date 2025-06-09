<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Publication::where('type', 'report')
            ->orderBy('published_at', 'desc')
            ->paginate(10);
            
        return view('reports.index', compact('reports'));
    }

    public function show($slug)
    {
        $report = Publication::where('type', 'report')
            ->where('slug', $slug)
            ->firstOrFail();
            
        return view('reports.show', compact('report'));
    }
}