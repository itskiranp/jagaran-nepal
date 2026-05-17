<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $allMembers = TeamMember::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->map(function ($member) {
                // Safely parse image path
                $image = $member->image_path;
                if (is_array($image)) {
                    $image = reset($image);
                } elseif (is_string($image)) {
                    $decoded = json_decode($image, true);
                    if (is_array($decoded)) {
                        $image = reset($decoded);
                    }
                }

                return [
                    'name' => $member->name,
                    'position' => $member->position,
                    'type' => $member->type,
                    'bio' => $member->bio,
                    'qualification' => $member->qualification,
                    'experience' => $member->experience,
                    'specialties' => is_array($member->specialties) ? $member->specialties : [],
                    'image' => $image ? asset('storage/' . $image) : null,
                ];
            });

        $committeeMembers = $allMembers->where('type', 'committee');
        $staffMembers = $allMembers->where('type', 'staff');

        return view('about.team', compact('committeeMembers', 'staffMembers'));
    }
}
