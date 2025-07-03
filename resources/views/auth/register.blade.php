<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Hub | Register</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/mobile.jpg') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<<<<<<< HEAD
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen flex items-center justify-center p-4 font-[Inter]">
    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="flex justify-center items-center mb-8 space-x-3">
            <img src="{{ asset('images/mobile.jpg') }}" alt="Mobile Hub Logo" class="w-12 h-12 rounded-lg">
            <h2 class="text-3xl font-bold text-gray-900">Mobile Hub</h2>
        </div>
        
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Create your account</h3>
            <p class="text-gray-600 text-sm">Join Mobile Hub to start shopping for mobile phones</p>
=======
<body class="min-h-screen overflow-hidden">

  <!-- Background Video -->
  <div class="fixed inset-0 z-0">
    <video autoplay muted loop playsinline class="w-full h-full object-cover">
      <source src="/videos/dogvideo.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
  </div>

  <!-- Register Form -->
  <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md p-10 bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20">

      <!-- Header -->
      <div class="flex justify-center items-center mb-6 space-x-3">
        <h2 class="text-4xl font-extrabold text-white text-center">Paw Haven</h2>
        <img src="/images/paw.png" alt="Paw Icon" width="50" height="50" />
      </div>

      <!-- Form -->
      <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <!-- Name -->
        <div class="mb-5">
          <label for="name" class="block text-white mb-1">Name</label>
          <input id="name" name="name" type="text" required
            class="w-full px-4 py-3 bg-white/10 text-white border border-white/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
>>>>>>> 997eaab (Fixed Registration)
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="space-y-5">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                    <input id="name" name="name" type="text" required
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 transition"
                           value="{{ old('name') }}" placeholder="Enter your full name">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                    <input id="email" name="email" type="email" required
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 transition"
                           value="{{ old('email') }}" placeholder="Enter your email address">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role Selection -->
                <div>
                    <label for="role" class="block text-gray-700 font-medium mb-2">Account Type</label>
                    <select id="role" name="role" required
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 transition">
                        <option value="">Select account type</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Customer</option>
                    </select>
                    @error('role')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 transition"
                               placeholder="Create a strong password">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg id="togglePassword" class="h-5 w-5 text-gray-500 cursor-pointer hover:text-blue-600 transition" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5s8.268 2.943 9.542 7.001c-1.274 4.058-5.064 7.001-9.542 7.001S3.732 16.059 2.458 12z" />
                            </svg>
                        </div>
                    </div>
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 transition"
                               placeholder="Confirm your password">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg id="toggleConfirm" class="h-5 w-5 text-gray-500 cursor-pointer hover:text-blue-600 transition" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5s8.268 2.943 9.542 7.001c-1.274 4.058-5.064 7.001-9.542 7.001S3.732 16.059 2.458 12z" />
                            </svg>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full py-3 bg-blue-400 text-white rounded-lg font-semibold text-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Create Account
                    </button>
                </div>
            </div>

            <!-- Link to Login -->
            <div class="text-center mt-6">
                <p class="text-gray-600 text-sm">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-medium hover:underline transition">
                        Sign in here
                    </a>
                </p>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const toggleConfirm = document.getElementById('toggleConfirm');
            const confirmInput = document.getElementById('password_confirmation');

            if (!togglePassword || !passwordInput || !toggleConfirm || !confirmInput) {
                console.error('Password toggle elements not found. Check IDs: togglePassword, password, toggleConfirm, password_confirmation');
                return;
            }

            togglePassword.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                togglePassword.classList.toggle('text-blue-600');
                console.log(type === 'text' ? 'Password shown' : 'Password hidden');
            });

            toggleConfirm.addEventListener('click', () => {
                const type = confirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmInput.setAttribute('type', type);
                toggleConfirm.classList.toggle('text-blue-600');
                console.log(type === 'text' ? 'Confirm password shown' : 'Confirm password hidden');
            });
        });
    </script>
</body>
</html>