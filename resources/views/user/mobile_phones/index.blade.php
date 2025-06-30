<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mobile Hub | Phones</title>
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

    <!-- Header Section -->
    <div class="px-4 sm:px-6 py-3 mt-20">
        <section class="flex justify-center relative px-4 sm:px-6 py-8 sm:py-12 mb-5 mx-auto animate-fade-in bg-blue-400 rounded-[20px] sm:rounded-[40px] text-white">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">Smartphones Collection</h1>
                <p class="text-lg text-blue-100 max-w-2xl mx-auto">Discover the latest smartphones with cutting-edge technology, stunning designs, and powerful performance.</p>
            </div>
        </section>
    </div>

    <!-- Filters and Search Section -->
    <section class="py-8 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                <!-- Search Bar -->
                <div class="relative w-full lg:w-96">
                    <form action="{{ route('user.mobile-phones.index') }}" method="GET">
                        <input 
                            type="text" 
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search phones..." 
                            class="w-full px-4 py-3 pl-10 text-gray-700 bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-300 ease-in-out"
                        >
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </form>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap gap-4">
                    <form action="{{ route('user.mobile-phones.index') }}" method="GET" class="flex flex-wrap gap-4">
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        
                        <select name="brand" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:border-blue-300">
                            <option value="">All Brands</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                            @endforeach
                        </select>

                        <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:border-blue-300">
                            <option value="">All Status</option>
                            <option value="In Stock" {{ request('status') == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                            <option value="Out of Stock" {{ request('status') == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                        </select>

                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Filter
                        </button>
                        
                        @if(request('brand') || request('status') || request('search'))
                            <a href="{{ route('user.mobile-phones.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors">
                                Clear
                            </a>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Results Info -->
            <div class="mt-6 flex flex-col sm:flex-row justify-between items-center">
                <p class="text-gray-600">Showing {{ $mobilePhones->count() }} of {{ $totalPhones }} phones</p>
                <div class="flex items-center space-x-4 mt-4 sm:mt-0">
                    <span class="text-sm text-gray-500">{{ $totalBrands }} brands available</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Phones Grid Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            @if($mobilePhones->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($mobilePhones as $phone)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                        <!-- Phone Image -->
                        <div class="relative h-48 bg-gradient-to-br from-gray-50 to-gray-100">
                            <img src="{{ $phone->image1 ? asset('storage/' . $phone->image1) : asset('images/default-phone.png') }}" 
                                 alt="{{ $phone->phone_name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            
                            <!-- Status Badge -->
                            <div class="absolute top-3 right-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $phone->status == 'In Stock' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    <span class="w-2 h-2 rounded-full mr-1.5 {{ $phone->status == 'In Stock' ? 'bg-green-400' : 'bg-red-400' }}"></span>
                                    {{ $phone->status }}
                                </span>
                            </div>
                            
                            <!-- Brand Badge -->
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-white/90 text-gray-700 backdrop-blur-sm">
                                    {{ $phone->brand }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Phone Details -->
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 truncate mb-1">{{ $phone->phone_name }}</h3>
                            <p class="text-sm text-gray-500 mb-3">{{ $phone->brand }}</p>
                            
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xl font-bold text-blue-600">₱{{ number_format($phone->price, 2) }}</span>
                                <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                    Stock: {{ $phone->stock_quantity }}
                                </span>
                            </div>
                            
                            <p class="text-sm text-gray-600 line-clamp-2 mb-4">{{ $phone->description }}</p>
                            
                            <!-- Action Buttons -->
                            <div class="flex space-x-3">
                                <a href="{{ route('user.mobile-phones.show', $phone->id) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($mobilePhones->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-4 py-2">
                        {{ $mobilePhones->links() }}
                    </div>
                </div>
                @endif
            @else
                <div class="text-center py-12">
                    <div class="max-w-md mx-auto">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 002 2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No phones found</h3>
                        <p class="text-gray-500 mb-6">Try adjusting your search or filter criteria.</p>
                        <a href="{{ route('user.mobile-phones.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Clear Filters
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-submit form when filters change
            const filterForm = document.querySelector('form[action*="mobile-phones"]');
            if (filterForm) {
                const selects = filterForm.querySelectorAll('select');
                selects.forEach(select => {
                    select.addEventListener('change', function() {
                        filterForm.submit();
                    });
                });
            }
        });
    </script>
</body>
</html> 