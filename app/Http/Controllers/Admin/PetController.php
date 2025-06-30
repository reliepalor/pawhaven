<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\MobilePhone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PetController extends Controller
{
    public function index(Request $request)
    {
        Log::info('PetController@index method called'); // Debug to confirm method execution

        $query = MobilePhone::query();

        // Apply filters
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
        
        $mobilePhones = $query->latest()->get();

        // Calculate real stats for the dashboard
        $totalPhones = MobilePhone::count();
        $inStockPhones = MobilePhone::where('status', 'In Stock')->count();
        $outOfStockPhones = MobilePhone::where('status', 'Out of Stock')->count();
        $totalBrands = MobilePhone::distinct('brand')->count('brand');

        // Get brand distribution for chart
        $brandDistribution = MobilePhone::selectRaw('brand, COUNT(*) as count')
            ->groupBy('brand')
            ->orderBy('count', 'desc')
            ->get();

        // Get stock status distribution for chart
        $stockStatusDistribution = MobilePhone::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        // Get recent mobile phones for activity feed
        $recentPhones = MobilePhone::latest()->take(5)->get();

        // Debug: Log the values to ensure they're being calculated
        Log::info('Mobile Phone stats calculated:', [
            'totalPhones' => $totalPhones,
            'inStockPhones' => $inStockPhones,
            'outOfStockPhones' => $outOfStockPhones,
            'totalBrands' => $totalBrands,
        ]);

        // Debug: Log the variables being passed to the view
        Log::info('Variables passed to view:', compact('mobilePhones', 'totalPhones', 'inStockPhones', 'outOfStockPhones', 'totalBrands', 'brandDistribution', 'stockStatusDistribution', 'recentPhones'));

        return view('admin.pets.index', compact('mobilePhones', 'totalPhones', 'inStockPhones', 'outOfStockPhones', 'totalBrands', 'brandDistribution', 'stockStatusDistribution', 'recentPhones'));
    }

    public function create()
    {
        return view('admin.pets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:Dog,Cat',
            'breed' => 'required|string|max:255',
            'age' => 'required|numeric|min:0',
            'gender' => 'required|in:Male,Female',
            'quantity' => 'required|integer|min:1',
            'color' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'status' => 'required|in:Available,Adopted,Reserved',
            'pet_image1' => 'nullable|image|max:2048',
            'pet_image2' => 'nullable|image|max:2048',
            'pet_image3' => 'nullable|image|max:2048',
            'pet_image4' => 'nullable|image|max:2048',
            'pet_image5' => 'nullable|image|max:2048',
        ]);

        // Handle image uploads
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("pet_image{$i}")) {
                $path = $request->file("pet_image{$i}")->store('pets', 'public');
                $validated["pet_image{$i}"] = $path;
            }
        }

        Pet::create($validated);

        return redirect()->route('admin.pets.index')
            ->with('success', 'Pet added successfully.');
    }

    public function edit(Pet $pet)
    {
        return view('admin.pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:Dog,Cat',
            'breed' => 'required|string|max:255',
            'age' => 'required|numeric|min:0',
            'gender' => 'required|in:Male,Female',
            'quantity' => 'required|integer|min:1',
            'color' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'status' => 'required|in:Available,Adopted,Reserved',
            'pet_image1' => 'nullable|image|max:2048',
            'pet_image2' => 'nullable|image|max:2048',
            'pet_image3' => 'nullable|image|max:2048',
            'pet_image4' => 'nullable|image|max:2048',
            'pet_image5' => 'nullable|image|max:2048',
        ]);

        // Handle image uploads
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("pet_image{$i}")) {
                // Delete old image if exists
                if ($pet->{"pet_image{$i}"}) {
                    Storage::disk('public')->delete($pet->{"pet_image{$i}"});
                }
                $path = $request->file("pet_image{$i}")->store('pets', 'public');
                $validated["pet_image{$i}"] = $path;
            }
        }

        $pet->update($validated);

        return redirect()->route('admin.pets.index')
            ->with('success', 'Pet updated successfully.');
    }

    public function destroy(Pet $pet)
    {
        // Delete all pet images
        for ($i = 1; $i <= 5; $i++) {
            if ($pet->{"pet_image{$i}"}) {
                Storage::disk('public')->delete($pet->{"pet_image{$i}"});
            }
        }

        $pet->delete();

        return redirect()->route('admin.pets.index')
            ->with('success', 'Pet deleted successfully.');
    }
}