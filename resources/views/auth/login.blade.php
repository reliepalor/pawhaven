<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Hub | Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/mobile.jpg') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4 font-[Inter]">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg border border-gray-100">
        <div class="flex justify-center items-center mb-6 space-x-3">
            <img src="{{ asset('images/mobile.jpg') }}" alt="Mobile Hub Logo" class="w-10 h-10">
            <h2 class="text-3xl font-bold text-gray-900">Mobile Hub</h2>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-5">
                <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                <input id="email" name="email" type="email" required autofocus
                       class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900"
                       value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                <div class="relative">
                    <input id="password" name="password" type="password" required
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg id="togglePassword" class="h-5 w-5 text-gray-500 cursor-pointer hover:text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5s8.268 2.943 9.542 7.001c-1.274 4.058-5.064 7.001-9.542 7.001S3.732 16.059 2.458 12z" />
                        </svg>
                    </div>
                </div>
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center mb-5">
                <input id="remember_me" name="remember" type="checkbox"
                       class="bg-gray-50 border-gray-300 text-blue-600 rounded focus:ring-blue-500">
                <label for="remember_me" class="ml-2 text-sm text-gray-700">Remember me</label>
            </div>
            <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md font-medium text-lg hover:bg-blue-700 transition duration-300">
                Log in
            </button>
            @if (Route::has('password.request'))
            <div class="text-center mt-4">
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                    Forgot your password?
                </a>
            </div>
            @endif
        </form>
        <div class="my-6 h-px bg-gray-200"></div>
        <div>
            <a href="{{ route('register') }}" class="block w-full py-3 bg-blue-600 text-white rounded-md font-medium text-lg text-center hover:bg-blue-700 transition duration-300">
                Register
            </a>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            if (!togglePassword || !passwordInput) {
                console.error('Password toggle elements not found. Check IDs: togglePassword, password');
                return;
            }
            togglePassword.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                togglePassword.classList.toggle('text-blue-600');
                console.log(type === 'text' ? 'Password shown' : 'Password hidden');
            });
        });
    </script>
</body>
</html>