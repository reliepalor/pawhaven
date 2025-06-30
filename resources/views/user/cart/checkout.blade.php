<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobile Hub | Checkout</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/mobile.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.6s ease-out forwards;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .checkout-container {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        @media (max-width: 1024px) {
            .checkout-container {
                grid-template-columns: 1fr;
            }
        }
       
        .hover-lift {
            transition: all 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="min-h-screen">
<x-header />
    <!-- Header Section 
    <div class="pt-20 pb-8">
        <div class="max-w-7xl mx-auto px-6 ">
            <div class="flex items-center space-x-4 mb-8 bg-white py-5">
                <a href="{{ route('user.cart.index') }}" class="flex items-center text-blue-600 hover:text-blue-700 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Cart
                </a>
            </div>
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">Complete Your Order</h1>
                <p class="text-blue-100 text-lg">Secure checkout with multiple payment options</p>
            </div>
        </div>
    </div>
-->

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-12 border border-gray-400 mt-20 rounded-lg">
    <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 space-y-6">
        <!-- Shipping Information -->
        <div>
            <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Shipping Information</h2>
            @if(auth()->user()->street_address && auth()->user()->city && auth()->user()->province)
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-blue-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <h3 class="text-base font-medium text-gray-900">Address</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ auth()->user()->street_address }}, {{ auth()->user()->city }}, {{ auth()->user()->province }} {{ auth()->user()->postal_code }}, {{ auth()->user()->country }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-blue-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <div>
                            <h3 class="text-base font-medium text-gray-900">Name</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ auth()->user()->name }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-blue-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <h3 class="text-base font-medium text-gray-900">Email</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                Please update your shipping address in your <a href="{{ route('profile.edit') }}" class="underline hover:text-blue-800">profile</a> before placing an order.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Order Summary -->
        <div>
            <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">Order Summary</h2>
            <!-- Order Items -->
            <div class="space-y-4 mb-6">
                @foreach($cartItems as $item)
                    <div class="flex items-center space-x-4 p-4 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition duration-200">
                        <img src="{{ $item->item_type === 'App\\Models\\Pet' ? asset('storage/' . $item->item->pet_image1) : ($item->item->image1 ? asset('storage/' . $item->item->image1) : asset('images/default-image.png')) }}" 
                             alt="{{ $item->item->name }}" 
                             class="w-20 h-20 object-contain rounded-lg">
                        <div class="flex-1">
                            <h3 class="text-base font-medium text-gray-900">{{ $item->item->name }}</h3>
                            <p class="text-sm text-gray-500">
                                {{ $item->item_type === 'App\\Models\\Pet' ? 'Pet' : ($item->item_type === 'App\\Models\\Accessories' ? 'Accessory' : ($item->item_type === 'App\\Models\\MobilePhone' ? 'Mobile Phone' : 'Food')) }}
                            </p>
                            <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                            <p class="text-base font-semibold text-blue-600">₱{{ number_format($item->item->price * $item->quantity, 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Total -->
            <div class="border-t border-gray-200 pt-4 mb-6">
                <div class="flex justify-between items-center">
                    <span class="text-lg font-semibold text-gray-900">Total</span>
                    <span class="text-lg font-semibold text-blue-600">₱{{ number_format($total, 2) }}</span>
                </div>
            </div>
            <!-- Payment Method -->
            <form method="POST" action="{{ route('user.cart.checkout') }}" class="space-y-6">
                @csrf
                @if($productId)
                    <input type="hidden" name="product_id" value="{{ $productId }}">
                    <input type="hidden" name="product_type" value="{{ $productType }}">
                    <input type="hidden" name="quantity" value="{{ $quantity }}">
                @else
                    @foreach($cartItems as $item)
                        <input type="hidden" name="selected_items[]" value="{{ $item->id }}">
                    @endforeach
                @endif
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900">Payment Method</h3>
                    <div class="space-y-3">
                        <label class="flex items-center space-x-3 p-4 border border-gray-200 rounded-lg hover:border-blue-600 cursor-pointer transition duration-200">
                            <input type="radio" name="payment_method" value="gcash" class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300" aria-label="Select GCash payment">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-blue-600 font-bold text-sm">G</span>
                                </div>
                                <div>
                                    <span class="text-base font-medium text-gray-900">GCash</span>
                                    <p class="text-sm text-gray-500 mt-1">Pay using GCash mobile wallet</p>
                                </div>
                            </div>
                        </label>
                        <label class="flex items-center space-x-3 p-4 border border-gray-200 rounded-lg hover:border-blue-600 cursor-pointer transition duration-200">
                            <input type="radio" name="payment_method" value="cod" class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300" aria-label="Select Cash on Delivery payment">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-base font-medium text-gray-900">Cash on Delivery</span>
                                    <p class="text-sm text-gray-500 mt-1">Pay when you receive your order</p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <button type="submit" 
                        class="w-full flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg text-base font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 {{ !auth()->user()->street_address || !auth()->user()->city || !auth()->user()->province ? 'opacity-50 cursor-not-allowed' : '' }}"
                        {{ !auth()->user()->street_address || !auth()->user()->city || !auth()->user()->province ? 'disabled' : '' }}
                        aria-label="Place order">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Place Order
                </button>
            </form>
        </div>
    </div>
</main>
<x-footer />

    <script>
        // Fade-in animations
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.fade-in');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            elements.forEach(element => observer.observe(element));
        });
    </script>
</body>
</html>
