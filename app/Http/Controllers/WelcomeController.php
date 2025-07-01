<?php

namespace App\Http\Controllers;
use App\Models\MobilePhone;
use App\Models\Accessories;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobilePhones = MobilePhone::limit(20)->get();
        $accessories = Accessories::limit(20)->get();
        $testimonials = \App\Models\Testimonial::with('user')->latest()->get();

        return view('welcome', compact('mobilePhones', 'accessories', 'testimonials'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
