<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $categories = Category::where('status', 1)->take(8)->get(); 
        $newCategories = Category::where('status', 1)->get(); 
        $featuredJob = Job::where([
            ['status', 1],
            ['isFeatured', 1]
            ])->orderBy('created_at', 'DESC')
            ->with('jobType')
            ->take(6)
            ->get();  

        $latestJob = Job::where('status', 1)
            ->with('jobType')
            ->orderBy('created_at', 'DESC')
            ->take(6)->get();
        // dd($latestJob);            
        return view('front.home', [
            'categories' => $categories,
            'featuredJobs' => $featuredJob,
            'latestJobs' => $latestJob,
            'newCategories' => $newCategories
        ]);
    }
}
