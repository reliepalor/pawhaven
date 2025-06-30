<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $mobilePhone->phone_name }} | Mobile Hub</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="{{ asset('javascript/welcome.js') }}"></script>
    <script src="{{ asset('javascript/welcome-scroll.js') }}" defer></script>
    <link rel="icon" type="image/x-icon" href="/images/mobile.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50">
<x-header />
    <!-- Breadcrumb -->
    <div class="px-4 sm:px-6 py-3 mt-20">
        <div class="max-w-7xl mx-auto">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('user.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('user.mobile-phones.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Phones</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $mobilePhone->phone_name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Product Details Section -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Product Images -->
                <div class="space-y-6">
                    <!-- Main Image -->
                    <div class="relative bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <img src="{{ $mobilePhone->image1 ? asset('storage/' . $mobilePhone->image1) : asset('images/default-phone.png') }}" 
                             alt="{{ $mobilePhone->phone_name }}" 
                             class="w-full h-96 object-cover">
                        
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                                {{ $mobilePhone->status == 'In Stock' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                <span class="w-2 h-2 rounded-full mr-2 {{ $mobilePhone->status == 'In Stock' ? 'bg-green-400' : 'bg-red-400' }}"></span>
                                {{ $mobilePhone->status }}
                            </span>
                        </div>
                        
                        <!-- Brand Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="inline-flex items-center px-3 py-2 rounded-lg text-sm font-medium bg-white/90 text-gray-700 backdrop-blur-sm">
                                {{ $mobilePhone->brand }}
                            </span>
                        </div>
                    </div>

                    <!-- Additional Images -->
                    @if($mobilePhone->image2 || $mobilePhone->image3 || $mobilePhone->image4)
                    <div class="grid grid-cols-3 gap-4">
                        @if($mobilePhone->image2)
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                            <img src="{{ asset('storage/' . $mobilePhone->image2) }}" 
                                 alt="{{ $mobilePhone->phone_name }}" 
                                 class="w-full h-24 object-cover">
                        </div>
                        @endif
                        @if($mobilePhone->image3)
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                            <img src="{{ asset('storage/' . $mobilePhone->image3) }}" 
                                 alt="{{ $mobilePhone->phone_name }}" 
                                 class="w-full h-24 object-cover">
                        </div>
                        @endif
                        @if($mobilePhone->image4)
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                            <img src="{{ asset('storage/' . $mobilePhone->image4) }}" 
                                 alt="{{ $mobilePhone->phone_name }}" 
                                 class="w-full h-24 object-cover">
                        </div>
                        @endif
                    </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="space-y-8">
                    <!-- Title and Price -->
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $mobilePhone->phone_name }}</h1>
                        <p class="text-lg text-gray-600 mb-4">{{ $mobilePhone->brand }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-4xl font-bold text-blue-600">₱{{ number_format($mobilePhone->price, 2) }}</span>
                            <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                                Stock: {{ $mobilePhone->stock_quantity }}
                            </span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Description</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $mobilePhone->description }}</p>
                    </div>

                    <!-- Specifications -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Specifications</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <dt class="text-sm font-medium text-gray-500">Brand</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $mobilePhone->brand }}</dd>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <dt class="text-sm font-medium text-gray-500">Model</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $mobilePhone->phone_name }}</dd>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $mobilePhone->status }}</dd>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <dt class="text-sm font-medium text-gray-500">Stock Quantity</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $mobilePhone->stock_quantity }}</dd>
                            </div>
                        </div>
                    </div>

                    <!-- Add to Cart -->
                    @if($mobilePhone->status == 'In Stock' && $mobilePhone->stock_quantity > 0)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Add to Cart</h3>
                        <form action="{{ route('user.mobile-phones.add-to-cart', $mobilePhone->id) }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                                <input type="number" 
                                       id="quantity" 
                                       name="quantity" 
                                       min="1" 
                                       max="{{ $mobilePhone->stock_quantity }}" 
                                       value="1"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:border-blue-300">
                            </div>
                            <button type="submit" 
                                    class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                                </svg>
                                Add to Cart
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="bg-red-50 rounded-2xl border border-red-200 p-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-red-800 font-medium">This phone is currently out of stock</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Related Phones Section -->
    @if($relatedPhones->count() > 0)
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Phones</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedPhones as $relatedPhone)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative h-48 bg-gradient-to-br from-gray-50 to-gray-100">
                        <img src="{{ $relatedPhone->image1 ? asset('storage/' . $relatedPhone->image1) : asset('images/default-phone.png') }}" 
                             alt="{{ $relatedPhone->phone_name }}" 
                             class="w-full h-full object-cover">
                        
                        <!-- Status Badge -->
                        <div class="absolute top-3 right-3">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold
                                {{ $relatedPhone->status == 'In Stock' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                <span class="w-1.5 h-1.5 rounded-full mr-1 {{ $relatedPhone->status == 'In Stock' ? 'bg-green-400' : 'bg-red-400' }}"></span>
                                {{ $relatedPhone->status }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-gray-900 truncate mb-1">{{ $relatedPhone->phone_name }}</h3>
                        <p class="text-xs text-gray-500 mb-2">{{ $relatedPhone->brand }}</p>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-lg font-bold text-blue-600">₱{{ number_format($relatedPhone->price, 2) }}</span>
                        </div>
                        <a href="{{ route('user.mobile-phones.show', $relatedPhone->id) }}" class="block w-full text-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Footer -->
    <x-footer />
</body>
</html> 