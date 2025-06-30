<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Hub - Your One-Stop Mobile Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/mobile.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <script src="{{ asset('javascript/welcome.js') }}"></script>
    <script src="{{ asset('javascript/welcome-scroll.js') }}" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-50">
    <div class="flex flex-col min-h-screen">
   <x-header />

        <!-- Hero Section -->
        <section class="pt-24 pb-12 bg-blue-400 to-indigo-600 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    Find Your Perfect Phone at <span class="text-yellow-300">Mobile Hub</span>
                </h1>
                <p class="text-base sm:text-lg md:text-xl text-center max-w-3xl mx-auto mb-8">
                    Discover the latest smartphones from top brands like Apple, Samsung, Google, and more. Shop cutting-edge technology with fast delivery and exclusive deals.
                </p>
                <a href="{{ route('user.mobile-phones.index') }}" class="inline-flex items-center px-6 py-3 bg-yellow-300 text-gray-900 rounded-full text-lg font-semibold hover:bg-yellow-400 transition duration-300">
                    Shop Phones Now
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </section>

        <!-- Featured Brands Section -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Explore Top Brands</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="flex items-center justify-center p-6 bg-gray-100 rounded-lg hover:shadow-lg transition duration-300">
                        <img src="{{ asset('images/apple-logo.jpg') }}" alt="Apple Logo" class="h-25 w-30 rounded-lg">
                    </div>
                    <div class="flex items-center justify-center p-6 bg-gray-100 rounded-lg hover:shadow-lg transition duration-300">
                        <img src="{{ asset('images/samsung-logo.jpg') }}" alt="Samsung Logo" class="h-25 w-30 rounded-lg">
                    </div>
                    <div class="flex items-center justify-center p-6 bg-gray-100 rounded-lg hover:shadow-lg transition duration-300">
                        <img src="{{ asset('images/vivo-logo.jpg') }}" alt="Google Logo" class="h-25 w-30 rounded-lg">
                    </div>
                    <div class="flex items-center justify-center p-6 bg-gray-100 rounded-lg hover:shadow-lg transition duration-300">
                        <img src="{{ asset('images/realme-logo.jpg') }}" alt="Xiaomi Logo" class="h-25 w-30 rounded-lg">
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Phones Section -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-6">Featured Smartphones</h2>
                <!-- Search Bar -->
                <div class="relative mb-8 max-w-md mx-auto">
                    <div class="relative">
                        <input 
                            type="text" 
                            id="searchInput" 
                            placeholder="Search phones or accessories..." 
                            class="w-full px-4 py-2 pl-10 text-gray-700 bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-300 ease-in-out"
                        >
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <!-- Phones Horizontal Scroll -->
                <div class="relative flex items-center">
                    <button id="scrollLeftPhones" class="z-10 bg-white rounded-full shadow p-2 hover:bg-gray-100 mr-4">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <div id="phonesContainer" class="flex space-x-6 overflow-x-auto snap-x snap-mandatory py-4 flex-1 transition-opacity duration-300">
                        @foreach($mobilePhones as $phone)
                            <div class="card bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 min-w-[220px] max-w-[220px] flex-shrink-0 snap-center" data-name="{{ strtolower($phone->phone_name) }}" data-brand="{{ strtolower($phone->brand) }}" data-category="{{ strtolower($phone->category) }}">
                                <div class="relative h-40 w-full">
                                    <img src="{{ $phone->image1 ? asset('storage/' . $phone->image1) : asset('images/default-phone.png') }}" alt="{{ $phone->phone_name }}" class="h-full w-full object-cover rounded-t-xl">
                                    <div class="absolute top-3 right-3">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                            @if($phone->status === 'Available') bg-green-100 text-green-800
                                            @elseif($phone->status === 'Sold') bg-gray-100 text-gray-800
                                            @else bg-yellow-100 text-yellow-800 @endif">
                                            {{ $phone->status }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold">{{ $phone->phone_name }}</h3>
                                    <p class="text-sm text-gray-600 mt-1">{{ $phone->brand }} • {{ $phone->category }}</p>
                                    <p class="text-md font-medium mt-2">₱{{ number_format($phone->price, 2) }}</p>
                                    <div class="mt-3 grid grid-cols-2 gap-3 text-xs text-gray-600">
                                        <div class="flex items-center">
                                            <svg class="w-3 h-3 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            <span>{{ $phone->storage }}GB</span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-3 h-3 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                            </svg>
                                            <span>{{ $phone->color }}</span>
                                        </div>
                                        <div class="flex items-center col-span-2">
                                            <svg class="w-3 h-3 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>{{ $phone->condition }}</span>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('login') }}" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-lg text-xs font-medium transition">Login to View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button id="scrollRightPhones" class="z-10 bg-white rounded-full shadow p-2 hover:bg-gray-100 ml-4">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                <a href="{{ route('user.mobile-phones.index') }}" class="inline-flex items-center px-6 py-3 bg-yellow-300 text-gray-900 rounded-full text-lg font-semibold hover:bg-yellow-400 transition duration-300">
                    Browse All Phones
                </a>
            </div>
        </section>


        <x-footer />
    </div>
</body>
</html>