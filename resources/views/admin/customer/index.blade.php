<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mobie Hub | Admin Customer List</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/mobile.jpg') }}">
    <script src="{{ asset('javascript/petJS.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/Sidebar.css') }}">
    <script src="{{ asset('javascript/Sidebar.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
  <!-- Sidebar -->
  <div class="sidebar expanded fixed left-4 top-4 h-[calc(100vh-2rem)] glass-effect rounded-2xl p-4 z-50 shadow-xl">
    <!-- Sidebar Header -->
    <div class="sidebar-header flex items-center justify-between mb-6">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/mobile.jpg') }}" alt="Mobile Hub Logo" class="w-8 h-8 rounded-lg">
            <span class="sidebar-title text-xl font-bold text-blue-600">Mobile Hub</span>
        </div>
        <button id="sidebarToggle" class="p-2 rounded-lg hover:bg-blue-50 transition">
            <svg class="w-6 h-6 text-gray-600 toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Navigation Items -->
    <nav class="space-y-2 flex flex-col h-full">
        <div class="space-y-1">
            <a href="{{ route('admin.pets.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 transition {{ request()->routeIs('admin.pets.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="nav-text ml-3 text-sm font-medium">Dashboard</span>
            </a>
            <a href="{{ route('admin.mobile-phones.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 transition {{ request()->routeIs('admin.mobile-phones.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                <span class="nav-text ml-3 text-sm font-medium">Mobile Phones</span>
            </a>
            <a href="{{ route('admin.orders.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 transition {{ request()->routeIs('admin.orders.index') ? 'bg-blue-100 text-blue-600' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <span class="nav-text ml-3 text-sm font-medium">Orders</span>
            </a>
            <a href="{{ route('admin.customers.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 transition {{ request()->routeIs('admin.customers.index') ? 'bg-blue-100 text-blue-600' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span class="nav-text ml-3 text-sm font-medium">Customers</span>
            </a>
        </div>
        
        <hr class="my-4 border-gray-200">

        <!-- Bottom section -->
        <div class="mt-auto">
            <div class="flex flex-col space-y-2">
                <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-blue-50 transition">
                    <img src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('images/default-profile.png') }}" 
                         alt="Admin Profile" 
                         class="w-10 h-10 rounded-full object-cover border-2 border-blue-100">
                    <div>
                        <p class="text-gray-900 font-semibold text-sm">{{ auth()->user()->name }}</p>
                        <p class="text-gray-500 text-xs">Administrator</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="nav-text ml-3 text-sm font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</div>  

        <!-- Main Content -->
        <div class="main-content flex-1 ml-[270px] p-8">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold mb-6">Customer List</h1>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="py-3 px-6 border-b border-gray-200">Profile</th>
                                <th class="py-3 px-6 border-b border-gray-200">Name</th>
                                <th class="py-3 px-6 border-b border-gray-200">Email</th>
                                <th class="py-3 px-6 border-b border-gray-200">Registered At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="py-4 px-6 border-b border-gray-200">
                                    <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/default-profile.png') }}" 
                                         alt="{{ $user->name }}" 
                                         class="w-12 h-12 rounded-full object-cover">
                                </td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $user->name }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $user->email }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $user->created_at->format('M d, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
