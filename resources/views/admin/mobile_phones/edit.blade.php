<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mobile Phone - Mobile Hub Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/mobile-hub-logo.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/Sidebar.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen font-[Inter]">
    <div class="flex">
        <!-- Sidebar -->
        <div class="sidebar expanded fixed left-4 top-4 h-[calc(100vh-2rem)] bg-white rounded-2xl p-4 z-50 shadow-lg">
            <!-- Sidebar Header -->
            <div class="sidebar-header flex items-center justify-between">
                <span class="sidebar-title text-xl font-bold text-blue-600">Mobile Hub</span>
                <button id="sidebarToggle" class="p-2 rounded-lg hover:bg-blue-50 transition">
                    <svg class="w-6 h-6 text-gray-600 toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navigation Items -->
            <nav class="space-y-2 flex flex-col h-full">
                <div>
                    <a href="{{ route('admin.pets.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 transition {{ request()->routeIs('admin.pets.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="nav-text ml-3">Phones</span>
                    </a>
                    <a href="{{ route('admin.mobile-phones.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 transition {{ request()->routeIs('admin.mobile-phones.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 3h18v18H3V3z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"/>
                            <path d="M7 7h10v10H7V7z" />
                        </svg>
                        <span class="nav-text ml-3">Mobile Phones</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 transition {{ request()->routeIs('admin.orders.index') ? 'bg-blue-100 text-blue-600' : '' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="nav-text ml-3">Orders</span>
                    </a>
                    <a href="{{ route('admin.customers.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 transition {{ request()->routeIs('admin.customers.index') ? 'bg-blue-100 text-blue-600' : '' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="nav-text ml-3">Customer List</span>
                    </a>
                </div>
                <hr class="my-4 border-gray-200">

                <!-- Bottom section - positioned at the bottom of the nav -->
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <div class="flex flex-col space-y-2">
                        <a href="" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-blue-50 transition">
                            <img src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('images/default-profile.png') }}" 
                                 alt="Admin Profile" 
                                 class="w-10 h-10 rounded-full object-cover">
                            <div>
                                <p class="text-gray-900 font-semibold">{{ auth()->user()->name }}</p>
                                <p class="text-gray-500 text-sm">Administrator</p>
                            </div>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="nav-text ml-3">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 main-content ml-[270px] p-8">
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Edit Mobile Phone</h1>
                            <p class="mt-2 text-gray-600">Update the details for {{ $mobilePhone->phone_name }}</p>
                        </div>
                        <a href="{{ route('admin.mobile-phones.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to List
                        </a>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <form action="{{ route('admin.mobile-phones.update', $mobilePhone->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Current Images Preview -->
                        <div class="p-6 border-b border-gray-200 bg-gray-50">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Current Images</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @for($i = 1; $i <= 3; $i++)
                                    @php $imageField = 'image' . $i; @endphp
                                    @if($mobilePhone->$imageField)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $mobilePhone->$imageField) }}" 
                                                 alt="Image {{ $i }}" 
                                                 class="w-full h-32 object-cover rounded-lg">
                                            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                                <span class="text-white text-sm font-medium">Image {{ $i }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-full h-32 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <span class="text-gray-500 text-sm">No Image {{ $i }}</span>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="p-6 space-y-6">
                            <!-- Basic Information -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Brand -->
                                    <div>
                                        <label for="brand" class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
                                        <select name="brand" id="brand" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                            <option value="">Select Brand</option>
                                            <option value="Apple" {{ old('brand', $mobilePhone->brand) == 'Apple' ? 'selected' : '' }}>Apple</option>
                                            <option value="Samsung" {{ old('brand', $mobilePhone->brand) == 'Samsung' ? 'selected' : '' }}>Samsung</option>
                                            <option value="Xiaomi" {{ old('brand', $mobilePhone->brand) == 'Xiaomi' ? 'selected' : '' }}>Xiaomi</option>
                                            <option value="Vivo" {{ old('brand', $mobilePhone->brand) == 'Vivo' ? 'selected' : '' }}>Vivo</option>
                                            <option value="Realme" {{ old('brand', $mobilePhone->brand) == 'Realme' ? 'selected' : '' }}>Realme</option>
                                            <option value="Other" {{ old('brand', $mobilePhone->brand) == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('brand')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Phone Name -->
                                    <div>
                                        <label for="phone_name" class="block text-sm font-medium text-gray-700 mb-2">Phone Name</label>
                                        <input type="text" name="phone_name" id="phone_name" 
                                               value="{{ old('phone_name', $mobilePhone->phone_name) }}" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                        @error('phone_name')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Price -->
                                    <div>
                                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price (₱)</label>
                                        <input type="number" step="0.01" name="price" id="price" 
                                               value="{{ old('price', $mobilePhone->price) }}" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                        @error('price')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Stock Quantity -->
                                    <div>
                                        <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity</label>
                                        <input type="number" name="stock_quantity" id="stock_quantity" 
                                               value="{{ old('stock_quantity', $mobilePhone->stock_quantity) }}" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                        @error('stock_quantity')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                        <select name="status" id="status" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                            <option value="In Stock" {{ old('status', $mobilePhone->status) == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                                            <option value="Out of Stock" {{ old('status', $mobilePhone->status) == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                                        </select>
                                        @error('status')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                <textarea name="description" id="description" rows="4" 
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ old('description', $mobilePhone->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- New Images -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Images (Optional)</h3>
                                <p class="text-sm text-gray-600 mb-4">Upload new images to replace the existing ones. Leave empty to keep current images.</p>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    @for($i = 1; $i <= 3; $i++)
                                        <div>
                                            <label for="image{{ $i }}" class="block text-sm font-medium text-gray-700 mb-2">Image {{ $i }}</label>
                                            <input type="file" name="image{{ $i }}" id="image{{ $i }}" accept="image/*" 
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
                                            @error('image' . $i)
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-4">
                            <a href="{{ route('admin.mobile-phones.index') }}" 
                               class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition font-medium">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                                Update Phone
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('javascript/Sidebar.js') }}"></script>
</body>
</html> 