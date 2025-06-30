<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mobile Hub | Footer</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/mobile-hub-logo.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
<body class="font-[Inter]">
    <!-- Footer -->
    <footer class="px-6 py-12 bg-blue-900 text-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-4">Shop</h3>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">All Products</a>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">Categories</a>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">Wishlist</a>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4">Information</h3>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">Shipping Policy</a>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">Returns & Refunds</a>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">FAQs</a>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4">Company</h3>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">About Us</a>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">Privacy Policy</a>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">Terms & Conditions</a>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4">Connect</h3>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">Contact Us</a>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">Support</a>
                <a href="#" class="block text-gray-300 hover:text-blue-200 transition fade-in">Newsletter</a>
            </div>
        </div>
        <p class="text-center mt-8 text-gray-300">© Mobile Hub 2025</p>
    </footer>

    <!-- Testimonial Modal -->
    <div id="testimonialModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 overflow-y-auto max-h-[90vh] transition-all duration-300">
            <button id="closeTestimonialModal" class="absolute top-3 right-3 text-gray-600 hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Leave a Testimonial</h3>
            <form method="POST" action="{{ route('testimonials.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="rating" class="block text-gray-700 font-medium mb-2">Rating</label>
                    <div class="flex space-x-1">
                        <input type="radio" id="star1" name="rating" value="1" required class="hidden" />
                        <label for="star1" class="cursor-pointer text-2xl text-gray-300 hover:text-yellow-400" aria-label="1 star">★</label>
                        <input type="radio" id="star2" name="rating" value="2" class="hidden" />
                        <label for="star2" class="cursor-pointer text-2xl text-gray-300 hover:text-yellow-400" aria-label="2 stars">★</label>
                        <input type="radio" id="star3" name="rating" value="3" class="hidden" />
                        <label for="star3" class="cursor-pointer text-2xl text-gray-300 hover:text-yellow-400" aria-label="3 stars">★</label>
                        <input type="radio" id="star4" name="rating" value="4" class="hidden" />
                        <label for="star4" class="cursor-pointer text-2xl text-gray-300 hover:text-yellow-400" aria-label="4 stars">★</label>
                        <input type="radio" id="star5" name="rating" value="5" class="hidden" />
                        <label for="star5" class="cursor-pointer text-2xl text-gray-300 hover:text-yellow-400" aria-label="5 stars">★</label>
                    </div>
                    @error('rating')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="comment" class="block text-gray-700 font-medium mb-2">Comment</label>
                    <textarea id="comment" name="comment" rows="4" required
                              class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900 placeholder-gray-500"></textarea>
                    @error('comment')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">Submit</button>
            </form>
        </div>
    </div>

   <!-- Back to Top Button -->
<button
    x-data="{ hovering: false }"
    @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
    @mouseenter="hovering = true"
    @mouseleave="hovering = false"
    class="fixed bottom-6 right-6 text-black bg-white hover:bg-gray-400 text-white rounded-lg shadow-md h-12 w-12 flex items-center justify-center transition-all duration-300 ease-in-out"
    aria-label="Back to top"
>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="black" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
    </svg>
</button>

    <script src="{{ asset('javascript/testimonials.js') }}"></script>

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

            // Initial state based on existing selection (if any)
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