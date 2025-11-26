<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontController extends Controller
{
    // Welcome
    public function welcome()
    {
        $jobs = Post::with('category')->get();
        $categories = Category::all();
        return Inertia::render('Welcome', [
            'jobs' => $jobs,
            'categories' => $categories
        ]);
    }

    // Companies
    public function companies()
    {
        return Inertia::render('Companies');
    }

    // Partner Networks
    public function partnerNetworks()
    {
        return Inertia::render('PartnerNetworks');
    }

    // Career Resources
    public function careerResources()
    {
        return Inertia::render('CareerResources');
    }
}
