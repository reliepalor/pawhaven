<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mobile Hub | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/mobile.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeIn 0.3s ease-out forwards;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 font-[Inter]">
<x-header />

    <!-- Hero Section -->
    <section class="py-12 mt-20 bg-blue-400 text-white rounded-[20px] mx-4 sm:mx-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
            <div class="flex justify-center mb-6">
                <div class="inline-flex items-center space-x-2 bg-white/20 backdrop-blur-sm rounded-full px-3 py-1 border border-white/30 hover:bg-white/30 transition-all duration-300">
                    <span class="text-sm font-medium"></span>
                                <div class="flex space-x-1">
                        <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center transition-transform duration-200 hover:scale-110">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                                        </svg>
                                    </div>
                        <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center transition-transform duration-200 hover:scale-110">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </div>
                        <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center transition-transform duration-200 hover:scale-110">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4">
                Discover Your Perfect <span class="text-yellow-300">Smartphone</span>
                        </h1>      
            <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold mb-6">
                Where <span class="text-yellow-300">Technology Meets Style</span>
            </h2>
            <p class="text-base sm:text-lg text-blue-100 max-w-2xl mx-auto mb-8">
                Latest smartphones from top brands. Fast delivery, exclusive deals, and cutting-edge technology.
            </p>
            <a href="{{ route('user.mobile-phones.index') }}" class="group inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-full font-medium hover:bg-blue-700 transition-all duration-300 hover:shadow-lg hover:scale-[1.02]" aria-label="Shop phones">
                <svg class="w-5 h-5 mr-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                Shop Phones Now
            </a>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-blue-400 rounded-2xl p-6 text-white shadow-lg">
                        <div class="text-3xl font-bold mb-2">{{ $totalPhones }}</div>
                        <div class="text-blue-100">Total Phones</div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-blue-400 rounded-2xl p-6 text-white shadow-lg">
                        <div class="text-3xl font-bold mb-2">{{ $inStockPhones }}</div>
                        <div class="text-green-100">In Stock</div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-blue-400 rounded-2xl p-6 text-white shadow-lg">
                        <div class="text-3xl font-bold mb-2">{{ $totalBrands }}</div>
                        <div class="text-purple-100">Brands</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Featured Brands Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Explore Top Brands</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="flex items-center justify-center p-6 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/apple-logo.jpg') }}" alt="Apple Logo" class="h-16 w-20 rounded-lg object-contain">
                </div>
                <div class="flex items-center justify-center p-6 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/samsung-logo.jpg') }}" alt="Samsung Logo" class="h-16 w-20 rounded-lg object-contain">
                </div>
                <div class="flex items-center justify-center p-6 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/vivo-logo.jpg') }}" alt="Vivo Logo" class="h-16 w-20 rounded-lg object-contain">
                </div>
                <div class="flex items-center justify-center p-6 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/realme-logo.jpg') }}" alt="Realme Logo" class="h-16 w-20 rounded-lg object-contain">
                </div>
            </div>
    </div>
    </section>

    <!-- Featured Phones Section -->
    <section class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-6">Featured Smartphones</h2>
            <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">Discover the latest smartphones with cutting-edge technology, stunning designs, and powerful performance.</p>
            <div class="relative mb-8 max-w-md mx-auto">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Search phones..." 
                    class="w-full px-4 py-3 pl-10 text-gray-700 bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                >
                <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredPhones as $phone)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group phone-card">
                        <div class="relative h-48 bg-gradient-to-br from-gray-50 to-gray-100">
                            <img src="{{ $phone->image1 ? asset('storage/' . $phone->image1) : asset('images/default-phone.png') }}" 
                                 alt="{{ $phone->phone_name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-3 right-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    <span class="w-2 h-2 rounded-full mr-1.5 bg-green-400"></span>
                                    In Stock
                                </span>
                            </div>
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-white/90 text-gray-700 backdrop-blur-sm">
                                    {{ $phone->brand }}
                                </span>
                            </div>
                        </div>
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
                            <div class="flex space-x-3">
                                <a href="{{ route('user.mobile-phones.show', $phone->id) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-all" aria-label="View phone details">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Details
                                </a>
                            </div>
                        </div>
              </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="max-w-md mx-auto">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No phones available</h3>
                            <p class="text-gray-500">Check back soon for the latest smartphones.</p>
              </div>
          </div>
                @endforelse
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('user.mobile-phones.index') }}" class="group inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-full font-medium hover:bg-blue-700 transition-all duration-300 hover:shadow-lg hover:scale-[1.02]" aria-label="View all phones">
                    <svg class="w-5 h-5 mr-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    View All Phones
                </a>
            </div>
      </div>
  </section>
  
   <x-footer />


    <script src="{{ asset('javascript/testimonials.js') }}"></script>
    <script src="{{ asset('javascript/welcome.js') }}"></script>
    <script src="{{ asset('javascript/welcome-scroll.js') }}" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ratingInputs = document.querySelectorAll('input[name="rating"]');
            ratingInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const selectedRating = parseInt(this.value);
                    const labels = document.querySelectorAll('label[for^="star"]');
                    labels.forEach(label => {
                        const starValue = parseInt(label.getAttribute('for').replace('star', ''));
                        if (starValue <= selectedRating) {
                            label.classList.remove('text-gray-300');
                            label.classList.add('text-yellow-400');
                        } else {
                            label.classList.remove('text-yellow-400');
                            label.classList.add('text-gray-300');
                        }
                    });
                });
            });

            // Initial state for rating stars
            const initialSelected = document.querySelector('input[name="rating"]:checked');
            if (initialSelected) {
                const selectedRating = parseInt(initialSelected.value);
                const labels = document.querySelectorAll('label[for^="star"]');
                labels.forEach(label => {
                    const starValue = parseInt(label.getAttribute('for').replace('star', ''));
                    if (starValue <= selectedRating) {
                        label.classList.remove('text-gray-300');
                        label.classList.add('text-yellow-400');
                    } else {
                        label.classList.remove('text-yellow-400');
                        label.classList.add('text-gray-300');
                    }
                });
            }
        });
    </script>
</body>
</html>