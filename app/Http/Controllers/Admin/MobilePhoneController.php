<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MobilePhone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MobilePhoneController extends Controller
{
    /**
     * Display a listing of the mobile phones.
     */
    public function index()
    {
        $mobilePhones = MobilePhone::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.mobile_phones.index', compact('mobilePhones'));
    }

    /**
     * Store a newly created mobile phone in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => ['required', 'string', 'max:255'],
            'phone_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'status' => ['required', Rule::in(['In Stock', 'Out of Stock'])],
            'image1' => ['nullable', 'image', 'max:2048'],
            'image2' => ['nullable', 'image', 'max:2048'],
            'image3' => ['nullable', 'image', 'max:2048'],
        ]);

        // Handle image uploads
        for ($i = 1; $i <= 3; $i++) {
            $imageField = 'image' . $i;
            if ($request->hasFile($imageField)) {
                $validated[$imageField] = $request->file($imageField)->store('mobile_phones', 'public');
            }
        }

        MobilePhone::create($validated);

        return redirect()->route('admin.mobile-phones.index')->with('success', 'Mobile phone added successfully.');
    }

    /**
     * Show the form for editing the specified mobile phone.
     */
    public function edit(MobilePhone $mobilePhone)
    {
        return view('admin.mobile_phones.edit', compact('mobilePhone'));
    }

    /**
     * Update the specified mobile phone in storage.
     */
    public function update(Request $request, MobilePhone $mobilePhone)
    {
        $validated = $request->validate([
            'brand' => ['required', 'string', 'max:255'],
            'phone_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'image1' => ['nullable', 'image', 'max:2048'],
            'image2' => ['nullable', 'image', 'max:2048'],
            'image3' => ['nullable', 'image', 'max:2048'],
        ]);

        // Automatically set status based on stock_quantity
        $validated['status'] = $validated['stock_quantity'] > 0 ? 'In Stock' : 'Out of Stock';

        // Handle image uploads and delete old images if replaced
        for ($i = 1; $i <= 3; $i++) {
            $imageField = 'image' . $i;
            if ($request->hasFile($imageField)) {
                // Delete old image if exists
                if ($mobilePhone->$imageField) {
                    Storage::disk('public')->delete($mobilePhone->$imageField);
                }
                $validated[$imageField] = $request->file($imageField)->store('mobile_phones', 'public');
            }
        }

        $mobilePhone->update($validated);

        return redirect()->route('admin.mobile-phones.index')->with('success', 'Mobile phone updated successfully.');
    }

    /**
     * Remove the specified mobile phone from storage.
     */
    public function destroy(MobilePhone $mobilePhone)
    {
        // Delete images from storage
        for ($i = 1; $i <= 3; $i++) {
            $imageField = 'image' . $i;
            if ($mobilePhone->$imageField) {
                Storage::disk('public')->delete($mobilePhone->$imageField);
            }
        }

        $mobilePhone->delete();

        return redirect()->route('admin.mobile-phones.index')->with('success', 'Mobile phone deleted successfully.');
    }
}
