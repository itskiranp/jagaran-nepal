<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        return view('donate.payment');
    }
    public function payment()
    {
        // Logic for handling payment
        return view('donate.payment');
    }
}
