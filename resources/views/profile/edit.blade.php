<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile | {{ Auth::user()->name }}</title>
    <link rel="icon" type="image/x-icon" href="/images/mobile.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(120deg, #f0f4f8 0%, #e9eafc 100%);
            color: #232946;
        }
        .profile-banner {
            background: linear-gradient(90deg, #6366f1 0%, #60a5fa 100%);
            height: 180px;
            border-radius: 0 0 2rem 2rem;
            position: relative;
        }
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 6px solid #fff;
            object-fit: cover;
            position: absolute;
            left: 50%;
            transform: translateX(-50%) translateY(60px);
            box-shadow: 0 4px 24px rgba(99,102,241,0.15);
            background: #fff;
        }
        .sidebar {
            background: #fff;
            border-radius: 2rem;
            box-shadow: 0 2px 16px rgba(99,102,241,0.07);
            padding: 2rem 1.5rem;
            min-width: 220px;
            min-height: 420px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar .username {
            font-size: 1.25rem;
            font-weight: 600;
            margin-top: 90px;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .sidebar .user-email {
            font-size: 0.95rem;
            color: #6366f1;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .sidebar-nav {
            width: 100%;
            margin-top: 2rem;
        }
        .sidebar-nav button {
            width: 100%;
            background: none;
            border: none;
            padding: 0.75rem 1rem;
            text-align: left;
            font-size: 1rem;
            color: #232946;
            border-radius: 0.75rem;
            margin-bottom: 0.5rem;
            transition: background 0.2s;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .sidebar-nav button.active, .sidebar-nav button:hover {
            background: #e0e7ff;
            color: #3730a3;
        }
        .main-content {
            background: #fff;
            border-radius: 2rem;
            box-shadow: 0 2px 16px rgba(99,102,241,0.07);
            padding: 2.5rem 2rem 2rem 2rem;
            min-height: 420px;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
        }
        .form-input, .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            font-size: 1rem;
            background: #f9fafb;
            transition: border 0.2s;
        }
        .form-input:focus, .form-select:focus {
            border-color: #6366f1;
            outline: none;
        }
        .save-btn {
            background: linear-gradient(90deg, #6366f1 0%, #60a5fa 100%);
            color: #fff;
            font-weight: 600;
            padding: 0.75rem 2.5rem;
            border-radius: 1.5rem;
            font-size: 1.1rem;
            border: none;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(99,102,241,0.10);
        }
        .save-btn:hover {
            background: linear-gradient(90deg, #4f46e5 0%, #2563eb 100%);
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .order-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.5rem;
        }
        .order-table th, .order-table td {
            padding: 0.75rem 1rem;
            background: #f3f4f6;
            border-radius: 0.75rem;
        }
        .order-table th {
            background: #e0e7ff;
            color: #3730a3;
            font-weight: 600;
        }
        .order-table tr {
            transition: box-shadow 0.2s;
        }
        .order-table tr:hover {
            box-shadow: 0 2px 8px rgba(99,102,241,0.10);
        }
        @media (max-width: 900px) {
            .profile-layout {
                flex-direction: column;
                gap: 2rem;
            }
            .sidebar {
                min-width: 100%;
                flex-direction: row;
                justify-content: center;
                min-height: unset;
                padding: 1.5rem 0.5rem;
            }
            .main-content {
                padding: 1.5rem 0.5rem;
            }
        }
    </style>
</head>
<body class="min-h-screen">
<x-header />
<div class="profile-banner">
    <img src="{{ $user->profile_image && $user->profile_image !== 'images/default-profile.png' ? asset('storage/' . $user->profile_image) : asset('images/default-profile.png') }}" class="profile-avatar" alt="Profile Image">
</div>
<main class="max-w-6xl mx-auto px-4 pt-10 pb-16">
    <div class="flex profile-layout gap-8">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="username">{{ $user->name }}</div>
            <div class="user-email">{{ $user->email }}</div>
            <nav class="sidebar-nav">
                <button type="button" class="tab-btn active" data-tab="profile"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" /></svg> Profile</button>
                <button type="button" class="tab-btn" data-tab="orders"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" /></svg> Orders</button>
            </nav>
        </aside>
        <!-- Main Content -->
        <section class="main-content flex-1">
            <!-- Profile Edit Tab -->
            <div class="tab-content active" id="tab-profile">
                <div class="section-title"><svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" /></svg> Edit Profile</div>
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="profile_image" class="form-label">Profile Image</label>
                        <input id="profile_image" name="profile_image" type="file" class="form-input" />
                        @error('profile_image')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" class="form-input" required autofocus />
                        @error('name')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="form-input" required />
                        @error('email')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Shipping Address</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <input id="street_address" name="street_address" type="text" value="{{ old('street_address', $user->street_address) }}" class="form-input" placeholder="Barangay" required />
                                @error('street_address')
                                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input id="city" name="city" type="text" value="{{ old('city', $user->city) }}" class="form-input" placeholder="Municipality" required />
                                @error('city')
                                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input id="province" name="province" type="text" value="{{ old('province', $user->province) }}" class="form-input" placeholder="Province" required />
                                @error('province')
                                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input id="postal_code" name="postal_code" type="text" value="{{ old('postal_code', $user->postal_code) }}" class="form-input" placeholder="Postal Code" required />
                                @error('postal_code')
                                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <input id="country" name="country" type="text" value="{{ old('country', $user->country ?? 'Philippines') }}" class="form-input" placeholder="Country" required />
                                @error('country')
                                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-8">
                        <button type="submit" class="save-btn">Save Changes</button>
                        @if (session('status') === 'profile-updated')
                            <span class="ml-4 text-green-600 font-medium">Saved.</span>
                        @endif
                    </div>
                </form>
            </div>
            <!-- Orders Tab -->
            <div class="tab-content" id="tab-orders">
                <div class="section-title"><svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" /></svg> Order History</div>
                @if($orders->isEmpty())
                    <p class="text-gray-600 text-sm">You have no orders yet.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Total</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <div class="space-y-2">
                                                @foreach($order->orderItems as $item)
                                                    <div class="flex items-center gap-2">
                                                        <img src="{{ $item->item && $item->item_type === 'App\\Models\\Pet' ? asset('storage/' . $item->item->pet_image1) : ($item->item && $item->item->image1 ? asset('storage/' . $item->item->image1) : '/images/placeholder.png') }}" alt="{{ $item->item ? $item->item->name : 'Item' }}" class="w-10 h-10 rounded-full">
                                                        <div>
                                                            <div class="font-medium">{{ $item->item ? $item->item->name : 'Item' }}</div>
                                                            <div class="text-xs text-gray-500">{{ ucfirst(class_basename($item->item_type)) }} x {{ $item->quantity }}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>₱{{ number_format($order->total_amount, 2) }}</td>
                                        <td>{{ ucfirst($order->payment_method) }}</td>
                                        <td>{{ ucfirst($order->payment_status) === 'Paid' ? 'Approve' : ucfirst($order->payment_status) }}</td>
                                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </section>
    </div>
</main>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    // Tab switching logic
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const tab = this.getAttribute('data-tab');
            document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));
            document.getElementById('tab-' + tab).classList.add('active');
        });
    });
</script>
</body>
</html>