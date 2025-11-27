<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\CareerResource;
use App\Models\Category;
use App\Models\Company;
use App\Models\PartnerNetwork;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // if(Auth::user()->role != $request->role){
        //     Auth::logout();
        //     return to_route('login');
        // }else{
        //     return Inertia::render('Dashboard');
        // }

        // admin 
        $companyCount = Company::count(); 
        $partnerNetworkCount = PartnerNetwork::count();
        $careerResourceCount = CareerResource::count();
        $employerCount = User::where('role', 'employer')->count();
        $jobSeekerCount = User::where('role', 'job-seeker')->count();
        $freelancerCount = User::where('role', 'freelancer')->count();

        // employer
        $categoryCount = Category::where('employer_id', Auth::user()->id)->count();
        $jobCount = Post::where('employer_id', Auth::user()->id)->count();
        $applicationCount = Application::where('employer_id', Auth::user()->id)->count();

        return Inertia::render('Dashboard', [
            // admin
            'companyCount' => $companyCount,
            'partnerNetworkCount' => $partnerNetworkCount,
            'careerResourceCount' => $careerResourceCount,
            'employerCount' => $employerCount,
            'jobSeekerCount' => $jobSeekerCount,
            'freelancerCount' => $freelancerCount,

            // employer
            'categoryCount' => $categoryCount,
            'jobCount' => $jobCount,
            'applicationCount' => $applicationCount,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
