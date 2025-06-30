<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MobilePhone;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MobilePhoneController extends Controller
{
    /**
     * Display a listing of mobile phones for users.
     */
    public function index(Request $request)
    {
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
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('phone_name', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Get brands for filter dropdown
        $brands = MobilePhone::select('brand')
            ->distinct()
            ->pluck('brand');

        $mobilePhones = $query->where('status', 'In Stock')
            ->latest()
            ->paginate(12);

        // Get statistics
        $totalPhones = MobilePhone::where('status', 'In Stock')->count();
        $totalBrands = $brands->count();

        return view('user.mobile_phones.index', compact('mobilePhones', 'brands', 'totalPhones', 'totalBrands'));
    }

    /**
     * Display the specified mobile phone.
     */
    public function show(MobilePhone $mobilePhone)
    {
        // Get related phones from the same brand
        $relatedPhones = MobilePhone::where('brand', $mobilePhone->brand)
            ->where('id', '!=', $mobilePhone->id)
            ->where('status', 'In Stock')
            ->take(4)
            ->get();

        return view('user.mobile_phones.show', compact('mobilePhone', 'relatedPhones'));
    }

    /**
     * Add mobile phone to cart.
     */
    public function addToCart(Request $request, MobilePhone $mobilePhone)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to add phones to your cart.');
        }

        try {
            $request->validate([
                'quantity' => 'required|integer|min:1|max:' . $mobilePhone->stock_quantity,
            ]);

            $existing = CartItem::where('user_id', Auth::id())
                ->where('item_type', MobilePhone::class)
                ->where('item_id', $mobilePhone->id)
                ->first();

            if ($existing) {
                $existing->update(['quantity' => $existing->quantity + $request->quantity]);
            } else {
                CartItem::create([
                    'user_id' => Auth::id(),
                    'item_type' => MobilePhone::class,
                    'item_id' => $mobilePhone->id,
                    'quantity' => $request->quantity,
                ]);
            }

            return redirect()->route('user.cart.index')
                ->with('success', 'Mobile phone added to cart successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add phone to cart: ' . $e->getMessage());
        }
    }
} 