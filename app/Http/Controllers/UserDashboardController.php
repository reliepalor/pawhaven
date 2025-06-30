<?php

namespace App\Http\Controllers;

use App\Models\MobilePhone;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * Display the user dashboard with mobile phones and testimonials.
     */
    public function index()
    {
        // Fetch featured mobile phones
        $featuredPhones = MobilePhone::where('status', 'In Stock')
            ->latest()
            ->take(6)
            ->get();

        // Fetch testimonials
        $testimonials = Testimonial::with('user')->latest()->get();

        // Get mobile phone statistics
        $totalPhones = MobilePhone::count();
        $inStockPhones = MobilePhone::where('status', 'In Stock')->count();
        $totalBrands = MobilePhone::distinct('brand')->count('brand');

        return view('user.dashboard', compact('featuredPhones', 'testimonials', 'totalPhones', 'inStockPhones', 'totalBrands'));
    }
}
