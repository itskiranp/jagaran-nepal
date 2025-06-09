<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:newsletter_subscribers,email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new subscriber
        NewsletterSubscriber::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'ip_address' => $request->ip()
        ]);

        return redirect()->back()
            ->with('success', 'Thank you for subscribing to our newsletter!');
    }
}