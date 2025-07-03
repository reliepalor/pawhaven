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
<<<<<<< HEAD
=======

    <!-- Badges Section -->
    <section class="bg-gray-100 py-8 sm:py-12 fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
            <h2 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-3 sm:mb-4">Trusted by Thousands of Pet Parents</h2>
            <p class="text-xs sm:text-sm text-gray-600 mb-6 sm:mb-10">Loved for quality, care, and a paw-sitive shopping experience.</p>
            <div class="relative overflow-hidden">
                <div class="flex w-max scrolling-wrapper space-x-6 sm:space-x-12">
                    <div class="badge-group flex space-x-6 sm:space-x-12">
                        <div class="badge flex flex-col items-center text-xs sm:text-sm text-gray-700 min-w-[80px] sm:min-w-[100px] bg-white rounded-lg shadow-sm p-3 sm:p-4 border border-gray-100">
                            <img src="/images/badges/fast-delivery.png" alt="car delivery" class="w-8 h-8 sm:w-10 sm:h-10">
                            <span>Fast Delivery</span>
                        </div>
                        <div class="badge flex flex-col items-center text-xs sm:text-sm text-gray-700 min-w-[80px] sm:min-w-[100px] bg-white rounded-lg shadow-sm p-3 sm:p-4 border border-gray-100">
                            <img src="/images/badges/five-star-rating.png" alt="car delivery" class="w-8 h-8 sm:w-10 sm:h-10">
                            <span>5-Star Reviews</span>
                        </div>
                        <div class="badge flex flex-col items-center text-xs sm:text-sm text-gray-700 min-w-[80px] sm:min-w-[100px] bg-white rounded-lg shadow-sm p-3 sm:p-4 border border-gray-100">
                            <img src="/images/badges/veterinary.png" alt="car delivery" class="w-8 h-8 sm:w-10 sm:h-10">
                            <span>Vet Approved</span>
                        </div>
                        <div class="badge flex flex-col items-center text-xs sm:text-sm text-gray-700 min-w-[80px] sm:min-w-[100px] bg-white rounded-lg shadow-sm p-3 sm:p-4 border border-gray-100">
                            <img src="/images/badges/biodegradable.png" alt="car delivery" class="w-8 h-8 sm:w-10 sm:h-10 mb-1">
                            <span>Eco-Friendly</span>
                        </div>
                        <div class="badge flex flex-col items-center text-xs sm:text-sm text-gray-700 min-w-[80px] sm:min-w-[100px] bg-white rounded-lg shadow-sm p-3 sm:p-4 border border-gray-100">
                            <img src="/images/badges/return.png" alt="car delivery" class="w-8 h-8 sm:w-10 sm:h-10 mb-1">
                            <span>Easy Returns</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!----------------------- PAW HAVEN---------------------------->
    <section class="fade-in w-full min-h-[50vh] sm:h-[80vh] py-8 sm:py-12">
        <h2 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-6 sm:mb-12">Paw Haven</h2>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 sm:gap-5 px-4 sm:px-6">
            <div class="w-full sm:w-[40%]">
                <p class="text-base sm:text-xl text-center text-gray-700" style="font-weight: 400; line-height: 2rem; sm:line-height: 3rem;">
                    Discover a wide range of adorable pets and quality accessories all in one place.
                    Whether you're looking to adopt, shop, or simply explore, we're here to make pet parenting joyful and easy.
                    Our mission is to connect happy pets with loving homes.
                    Start your journey today and give your furry friend the life they deserve!
                </p>
            </div>
            <div class="h-[200px] sm:h-full w-full sm:w-1/2 flex justify-center items-center">
                <video autoplay muted loop playsinline class="left-0 w-full h-full object-cover rounded-lg">
                    <source src="/videos/catvideo.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-12 fade-in">
      <div class="max-w-7xl mx-auto px-6">
          <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">The Best Pet Products</h2>
          <!-- Pets -->
          <div class="flex flex-col md:flex-row items-center mb-16 gap-8  p-6 transition-all duration-300">
              <div class="md:w-1/2 mb-6 md:mb-0">
                  <img src="/images/dogo.png" alt="Pets" class="w-full h-64 object-cover rounded-xl hover:scale-102 transition-transform duration-300">
              </div>
              <div class="md:w-1/2">
                  <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold rounded-full px-3 py-1 mb-2">01</span>
                  <h3 class="text-2xl font-semibold text-gray-900 mb-2">Pets</h3>
                  <p class="text-md text-gray-600 mb-6">Discover our wide range of pets. We can help you find the perfect companion, from playful puppies to cuddly kittens, and make your home feel lively and pet-friendly.</p>
                  <a href="{{ route('user.pets.index') }}" class="inline-flex px-4 py-2 bg-blue-600 text-white rounded-full text-sm font-medium hover:bg-blue-700 transition duration-200">Try Now</a>
              </div>
          </div>
          <!-- Accessories -->
          <div class="flex flex-col md:flex-row-reverse items-center mb-16 gap-8  p-6 transition-all duration-300">
              <div class="md:w-1/2 mb-6 md:mb-0">
                  <img src="/images/accessories.jpg" alt="Accessories" class="w-full h-64 object-cover rounded-xl">
              </div>
              <div class="md:w-1/2">
                  <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold rounded-full px-3 py-1 mb-2">02</span>
                  <h3 class="text-2xl font-semibold text-gray-900 mb-2">Accessories</h3>
                  <p class="text-md text-gray-600 mb-6">From cozy beds to fun toys and stylish collars, we've got the essentials to keep your pet happy and comfortable. Designed for everyday use with care and durability in mind.</p>
                  <a href="{{ route('user.accessories.index') }}" class="inline-flex px-4 py-2 bg-blue-600 text-white rounded-full text-sm font-medium hover:bg-blue-700 transition duration-200">Try Now</a>
              </div>
          </div>
          <!-- Foods -->
          <div class="flex flex-col md:flex-row items-center mb-16 gap-8 p-6 transition-all duration-300">
              <div class="md:w-1/2 mb-6 md:mb-0">
                  <img src="/images/catfood.png" alt="Foods" class="w-full h-64 object-cover rounded-xl">
              </div>
              <div class="md:w-1/2">
                  <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold rounded-full px-3 py-1 mb-2">03</span>
                  <h3 class="text-2xl font-semibold text-gray-900 mb-2">Foods</h3>
                  <p class="text-md text-gray-600 mb-6">Fuel your pet's health with high-quality food and treats they'll actually enjoy. Balanced, nutritious, and trusted by pet parents everywhere.</p>
                  <a href="{{ route('user.accessories.index') }}" class="inline-flex px-4 py-2 bg-blue-600 text-white rounded-full text-sm font-medium hover:bg-blue-700 transition duration-200">Try Now</a>
              </div>
          </div>
      </div>
  </section>
      <section class="p-6 mx-auto">
          <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Our Best Categories</h2>
        <div class="grid grid-cols-7 grid-rows-6 gap-5 max-w-7xl mx-auto">
           <div class="col-span-3 row-span-6 bg-white shadow-md rounded-3xl overflow-hidden relative h-[35rem] hover:scale-[1.02] transition-transform duration-300">
                    <img src="/images/bento2.png" alt="Foods" class="absolute inset-0 w-full h-full object-cover">
                
                <p class="absolute top-10 left-6 z-10 text-gray-700 font-extrabold text-4xl md:text-5xl px-6 pt-6 drop-shadow-lg font-cursive">
                    Find more joy with Pets
                </p>
            </div>

            <div class="col-span-4 row-span-3 col-start-4 bg-white shadow-md h-[20rem] rounded-3xl overflow-hidden relative hover:scale-[1.02] transition-transform duration-300">
                <img src="/images/bento5.jpg" alt="Foods" class="absolute inset-0 w-full h-full object-cover">
                <p class="absolute top-[13rem] left-8 z-10 text-gray-600 font-cursive font-extrabold md:text-3xl px-5 pt-4 drop-shadow-lg">
                    Pets<span class="text-gray-400">:</span> Dogs and Cats
                </p>
                <span class="absolute top-[17rem] left-8 bg-gray-600 p-[.5px] w-[40rem]"></span>
            </div>

            <div class="col-span-2 row-span-3 col-start-4 row-start-4 bg-white shadow-md h-52 rounded-3xl overflow-hidden relative hover:scale-[1.02] transition-transform duration-300">
                <img src="/images/bentoacce.jpg" alt="Foods" class="absolute inset-0 w-full h-full object-cover">
            </div>

            <div class="col-span-2 row-span-3 col-start-6 row-start-4 bg-white shadow-md h-52 rounded-3xl overflow-hidden relative hover:scale-[1.02] transition-transform duration-300">
                <img src="/images/bentofood.jpg" alt="Foods" class="absolute inset-0 w-full h-full object-cover">
            </div>
        </div>
    </section>
    <!-- New Products Section -->
    <section class="px-6 py-12 bg-white fade-in">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Featured Pets & Accessories</h2>
        <!-- Search Bar -->
        <div class="relative mb-8 max-w-md mx-auto">
          <div class="relative">
            <input 
              type="text" 
              id="searchInput" 
              placeholder="Search pets or accessories..." 
              class="w-full px-4 py-2 pl-10 text-gray-700 bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-300 ease-in-out"
            >
            <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
        </div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12 bg-gradient-to-b from-gray-50 to-gray-100">
    <!-- Pets Horizontal Scroll -->
    <div class="relative mb-12">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">Available Pets</h2>
        <div class="flex items-center">
            <button id="scrollLeftPets" class="z-10 bg-white rounded-full shadow-md p-3 hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 sm:flex hidden">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <div id="petsContainer" class="flex space-x-4 sm:space-x-6 overflow-x-auto snap-x snap-mandatory py-4 flex-1 scrollbar-thin scrollbar-thumb-blue-200 scrollbar-track-gray-100 transition-all duration-300">
                @foreach($pets as $pet)
                <div class="card bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 min-w-[180px] sm:min-w-[240px] max-w-[180px] sm:max-w-[240px] flex-shrink-0 snap-center" 
                     data-name="{{ strtolower($pet->name) }}" 
                     data-breed="{{ strtolower($pet->breed) }}" 
                     data-category="{{ strtolower($pet->category) }}">
                    <div class="relative h-36 sm:h-48 w-full">
                        <img src="{{ asset('storage/' . $pet->pet_image1) }}" 
                             alt="{{ $pet->name }}" 
                             class="pet-image h-full w-full object-cover rounded-t-xl transition-transform duration-300 hover:scale-105">
                        <div class="absolute top-3 right-3">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                @if($pet->status === 'Available') bg-green-100 text-green-800
                                @elseif($pet->status === 'Adopted') bg-gray-100 text-gray-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $pet->status }}
                            </span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 truncate">{{ $pet->name }}</h3>
                        <p class="text-sm text-gray-600 mt-1 truncate">{{ $pet->breed }} • {{ $pet->category }}</p>
                        <p class="text-base font-medium text-blue-600 mt-2">₱{{ number_format($pet->price, 2) }}</p>
                        <div class="mt-3 grid grid-cols-2 gap-2 text-xs text-gray-600">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $pet->age }}y</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>{{ $pet->gender }}</span>
                            </div>
                            <div class="flex items-center col-span-2">
                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                                <span>{{ $pet->color }}</span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('login') }}" 
                               class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded-lg text-sm font-medium transition-all duration-300 shadow-sm hover:shadow-md">
                                Login to View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button id="scrollRightPets" class="z-10 bg-white rounded-full shadow-md p-3 hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 sm:flex hidden">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Accessories Horizontal Scroll -->
    <div class="relative">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">Pet Accessories</h2>
        <div class="flex items-center">
            <button id="scrollLeftAccessories" class="z-10 bg-white rounded-full shadow-md p-3 hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 sm:flex hidden">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <div id="accessoriesContainer" class="flex space-x-4 sm:space-x-6 overflow-x-auto snap-x snap-mandatory py-4 flex-1 scrollbar-thin scrollbar-thumb-blue-200 scrollbar-track-gray-100 transition-all duration-300">
                @foreach($accessories as $accessory)
                <div class="accessory-card bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 min-w-[180px] sm:min-w-[240px] max-w-[180px] sm:max-w-[240px] snap-center" 
                     data-name="{{ strtolower($accessory->name) }}" 
                     data-category="{{ strtolower($accessory->category) }}">
                    <div class="relative h-36 sm:h-48 w-full">
                        <div class="accessory-image-wrapper w-full h-full overflow-hidden rounded-t-xl">
                            <img src="{{ asset('storage/' . $accessory->image1) }}" 
                                 alt="{{ $accessory->name }}" 
                                 class="accessory-image w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                        </div>
                        <div class="absolute top-3 right-3">
                            <span class="status-badge px-3 py-1 text-xs font-semibold rounded-full 
                                @if($accessory->stock > 0) bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ $accessory->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-base sm:text-lg font-semibold text-gray-900 truncate">{{ $accessory->name }}</h3>
                                <p class="text-base font-medium text-blue-600 mt-2">₱{{ number_format($accessory->price, 2) }}</p>
                                <p class="text-sm text-gray-600 mt-1 truncate">{{ $accessory->category }}</p>
                            </div>
                        </div>
                        <div class="mt-3 grid grid-cols-2 gap-2 text-xs text-gray-600">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                                <span>{{ $accessory->color }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                                <span>{{ $accessory->size }}</span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('login') }}" 
                               class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded-lg text-sm font-medium transition-all duration-300 shadow-sm hover:shadow-md">
                                Login to View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button id="scrollRightAccessories" class="z-10 bg-white rounded-full shadow-md p-3 hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 sm:flex hidden">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="px-6 py-12 bg-gray-50 fade-in">
      <div class="max-w-7xl mx-auto">
          <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">What Our Customers Say</h2>
          <div class="relative overflow-hidden h-[600px] testimonial-container">
              <div class="animate-scroll">
                  <!-- First set of testimonials -->
                  <div class="columns-1 md:columns-3 gap-5">
                      @foreach($testimonials as $testimonial)
                          <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 mb-5 break-inside-avoid hover-scale">
                              <p class="text-gray-600 italic">"{{ $testimonial->comment }}"</p>
                              <div class="flex mt-2">
                                  {{-- Display star rating --}}
                                  <div class="flex text-yellow-400">
                                      @for ($i = 1; $i <= 5; $i++)
                                          @if ($i <= $testimonial->rating)
                                              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.95a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.286 3.95c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.36 2.44c-.784.57-1.838-.197-1.54-1.118l1.286-3.95a1 1 0 00-.364-1.118L3.722 9.377c-.783-.57-.38-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.95z" />
                                              </svg>
                                          @else
                                              <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.95a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.286 3.95c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.36 2.44c-.784.57-1.838-.197-1.54-1.118l1.286-3.95a1 1 0 00-.364-1.118L3.722 9.377c-.783-.57-.38-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.95z" />
                                              </svg>
                                          @endif
                                      @endfor
                                  </div>
                              </div>
                              <div class="flex items-center mt-4">
                                  @if($testimonial->user && $testimonial->user->profile_image)
                                      <img src="{{ asset('storage/' . $testimonial->user->profile_image) }}" alt="{{ $testimonial->user->name }}" class="w-12 h-12 rounded-full mr-4 object-cover border border-gray-300">
                                  @else
                                      <img src="https://via.placeholder.com/48" alt="User Image" class="w-12 h-12 rounded-full mr-4 object-cover border border-gray-300">
                                  @endif
                                  <div>
                                      <h4 class="font-bold text-gray-900">{{ $testimonial->user ? $testimonial->user->name : 'Anonymous' }}</h4>
                                      <p class="text-sm text-gray-500">Pet Owner</p>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
                  <!-- Duplicate set for seamless looping -->
                  <div class="columns-1 md:columns-3 gap-5">
                      @foreach($testimonials as $testimonial)
                          <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 mb-5 break-inside-avoid hover-scale">
                              <p class="text-gray-600 italic">"{{ $testimonial->comment }}"</p>
                              <div class="flex items-center mt-4">
                                  @if($testimonial->user && $testimonial->user->profile_image)
                                      <img src="{{ asset('storage/' . $testimonial->user->profile_image) }}" alt="{{ $testimonial->user->name }}" class="w-12 h-12 rounded-full mr-4 object-cover border border-gray-300">
                                  @else
                                      <img src="https://via.placeholder.com/48" alt="User Image" class="w-12 h-12 rounded-full mr-4 object-cover border border-gray-300">
                                  @endif
                                  <div>
                                      <h4 class="font-bold text-gray-900">{{ $testimonial->user ? $testimonial->user->name : 'Anonymous' }}</h4>
                                      <p class="text-sm text-gray-500">Pet Owner</p>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
    </section>


      <x-footer />

    <!-- Back to Top Button -->
    <button
        x-data="{ hovering: false }"
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        @mouseenter="hovering = true"
        @mouseleave="hovering = false"
        :class="hovering ? 'w-36 px-4' : 'w-12 px-0'"
        class="fixed bottom-8 right-8 bg-blue-300 hover:bg-blue-600 text-white rounded-full shadow-lg h-12 flex items-center justify-center overflow-hidden transition-all duration-300 ease-in-out"
        aria-label="Back to top"
    >
        <!-- Up Arrow Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>

        <!-- Back to Top Text -->
        <span
            class="ml-2 whitespace-nowrap transition-all duration-300 ease-in-out"
            :class="hovering ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-2'"
        >
            Back to top
        </span>
    </button>
>>>>>>> 997eaab (Fixed Registration)
</body>
</html>