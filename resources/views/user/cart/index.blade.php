<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobile Hub | Your Cart</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/mobile.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
<!-- Secondary Navigation (Fixed) -->
<nav id="" class="mt-20 fixed top-0 z-50 bg-white shadow-sm px-4 sm:px-6 py-3 w-full max-w-full mx-auto transition-transform duration-300">
    <div class="flex items-center justify-between max-w-7xl mx-auto">
        <div class="flex items-center space-x-3">
            <a href="{{ route('user.pets.index') }}" class="text-gray-600 hover:text-orange-500 transition p-2 rounded-full hover:bg-orange-50" aria-label="Back to pets">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-xl font-semibold text-gray-900">Your Cart</h1>
        </div>
        <a href="{{ route('user.mobile-phones.index') }}" class="text-sm font-medium text-blue-500 hover:text-blue-600 transition" aria-label="Continue shopping">
            Continue Shopping
        </a>
    </div>
</nav>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-12 bg-gray-50 mt-20">
    <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-4">Shopping Cart</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                {{ session('error') }}
            </div>
        @endif

        @php
            use Illuminate\Support\Facades\DB;

            $cartItems = DB::table('cart_items')
                ->join('pets', 'cart_items.item_id', '=', 'pets.id')
                ->where('cart_items.user_id', auth()->id())
                ->where('cart_items.item_type', 'App\\Models\\Pet')
                ->select('cart_items.*', 'pets.name', 'pets.price', 'pets.pet_image1', 'pets.quantity as pet_quantity')
                ->get();

            $accessoryItems = DB::table('cart_items')
                ->join('accessories', 'cart_items.item_id', '=', 'accessories.id')
                ->where('cart_items.user_id', auth()->id())
                ->where('cart_items.item_type', 'App\\Models\\Accessories')
                ->select('cart_items.*', 'accessories.name', 'accessories.price', 'accessories.image1', 'accessories.stock')
                ->get();

            $foodItems = DB::table('cart_items')
                ->join('food', 'cart_items.item_id', '=', 'food.id')
                ->where('cart_items.user_id', auth()->id())
                ->where('cart_items.item_type', 'App\\Models\\Food')
                ->select('cart_items.*', 'food.name', 'food.price', 'food.image1', 'food.stock')
                ->get();

            $mobilePhoneItems = DB::table('cart_items')
                ->join('mobile_phones', 'cart_items.item_id', '=', 'mobile_phones.id')
                ->where('cart_items.user_id', auth()->id())
                ->where('cart_items.item_type', 'App\\Models\\MobilePhone')
                ->select('cart_items.*', 'mobile_phones.phone_name as name', 'mobile_phones.price', 'mobile_phones.image1', 'mobile_phones.stock_quantity as stock')
                ->get();

            $cartItems = collect()
                ->concat($cartItems)
                ->concat($accessoryItems)
                ->concat($foodItems)
                ->concat($mobilePhoneItems);
        @endphp

        @if($cartItems->isEmpty())
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Your Cart is Empty</h2>
                <p class="text-gray-500 mb-6">Explore our latest mobile phones and accessories!</p>
                <a href="{{ route('user.mobile-phones.index') }}" class="inline-flex items-center px-6 py-2 bg-orange-500 text-white rounded-lg font-medium hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400 transition duration-300" aria-label="Shop Now">
                    Shop Now
                </a>
            </div>
        @else
            <form id="checkout-form">
                <div class="space-y-4">
                    <div class="flex items-center mb-4">
                        <input type="checkbox" id="select-all" class="h-5 w-5 text-orange-500 focus:ring-orange-400 border-gray-300 rounded" onchange="toggleAllItems(this)" aria-label="Select all items">
                        <label for="select-all" class="ml-2 text-sm font-medium text-gray-700">Select All</label>
                    </div>
                    @foreach($cartItems as $item)
                        <div class="cart-item bg-white border border-gray-200 rounded-lg p-4 flex items-start space-x-4 hover:bg-gray-50 transition duration-200">
                            <input type="checkbox" 
                                   name="selected_items[]" 
                                   value="{{ $item->id }}" 
                                   class="item-checkbox h-5 w-5 text-blue-500 focus:ring-blue-400 border-gray-300 rounded mt-2"
                                   onchange="updateTotal()"
                                   aria-label="Select {{ $item->name }}">
                            <img src="{{ $item->item_type === 'App\\Models\\Pet' ? asset('storage/' . $item->pet_image1) : ($item->item_type === 'App\\Models\\MobilePhone' ? asset('storage/' . $item->image1) : ($item->image1 ? asset('storage/' . $item->image1) : asset('images/default-image.png'))) }}" 
                                 alt="{{ $item->name }}" 
                                 class="w-24 h-24 object-contain rounded-lg">
                            <div class="flex-1">
                                <h3 class="text-base font-medium text-gray-900">{{ $item->name }}</h3>
                                <p class="text-sm text-gray-500">
                                    {{ $item->item_type === 'App\\Models\\Pet' ? 'Pet' : ($item->item_type === 'App\\Models\\Accessories' ? 'Accessory' : ($item->item_type === 'App\\Models\\MobilePhone' ? 'Mobile Phone' : 'Food')) }}
                                </p>
                                <div class="flex items-center justify-between mt-2">
                                    <p class="text-lg font-semibold text-blue-500">₱{{ number_format($item->price, 2) }}</p>
                                    <form action="{{ route('user.cart.update', $item->id) }}" method="POST" class="flex items-center">
                                        @csrf
                                        @method('PATCH')
                                        <label for="quantity-{{ $item->id }}" class="sr-only">Quantity for {{ $item->name }}</label>
                                        <input type="number" 
                                               name="quantity" 
                                               id="quantity-{{ $item->id }}" 
                                               value="{{ $item->quantity }}" 
                                               min="1" 
                                               max="{{ $item->item_type === 'App\\Models\\Pet' ? $item->pet_quantity : ($item->item_type === 'App\\Models\\MobilePhone' ? $item->stock : $item->stock) }}"
                                               class="item-quantity w-16 px-2 py-1 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 transition duration-200"
                                               onchange="this.form.submit()">
                                    </form>
                                </div>
                                <form action="{{ route('user.cart.remove', $item->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:text-red-700 font-medium transition duration-200" aria-label="Remove {{ $item->name }}">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 pt-4 border-t border-gray-200 sticky bottom-0 bg-white p-4 -mx-4 sm:-mx-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-medium text-gray-900">Total</span>
                        <span class="text-lg font-semibold text-blue-500" id="selected-total">₱0.00</span>
                    </div>
                    <button type="button" 
                            id="checkout-button"
                            class="w-full flex items-center justify-center px-6 py-3 bg-blue-500 text-white rounded-lg text-base font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-orange-400 transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                            aria-label="Proceed to checkout">
                        Checkout
                    </button>
                </div>
            </form>
        @endif
    </div>
</main>

<x-footer />

   


    <script src="{{ asset('javascript/testimonials.js') }}"></script>
    <script>
        // Scroll-based hide/show for secondary navbar
        let lastScrollTop = 0;
        const secondaryNav = document.getElementById('secondary-nav');
        window.addEventListener('scroll', () => {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            if (currentScroll > lastScrollTop && currentScroll > 50) {
                secondaryNav.style.transform = 'translateY(-100%)';
            } else if (currentScroll < lastScrollTop) {
                secondaryNav.style.transform = 'translateY(0)';
            }
            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        });

        // Fade-in animations
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.fade-in');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            elements.forEach(element => observer.observe(element));
        });

        function toggleAllItems(checkbox) {
            const itemCheckboxes = document.querySelectorAll('.item-checkbox');
            itemCheckboxes.forEach(itemCheckbox => {
                itemCheckbox.checked = checkbox.checked;
            });
            setTimeout(updateTotal, 50);
        }

        function updateTotal() {
            const checkboxes = document.querySelectorAll('.item-checkbox:checked');
            let total = 0;

            checkboxes.forEach(checkbox => {
                const row = checkbox.closest('tr') || checkbox.closest('div.cart-item') || checkbox.closest('div.flex.items-center.space-x-6');
                if (!row) return;
                let priceText = '';
                let quantityInput = null;

                if (row.tagName.toLowerCase() === 'tr') {
                    priceText = row.querySelector('td:nth-child(4)').textContent.replace('₱', '').replace(/,/g, '');
                    quantityInput = row.querySelector('.item-quantity');
                } else {
                    const priceElem = row.querySelector('p.text-lg.font-semibold.text-blue-500') || row.querySelector('p.text-sm.font-semibold.text-gray-900.mt-2') || row.querySelector('.price');
                    priceText = priceElem ? priceElem.textContent.replace('₱', '').replace(/,/g, '') : '';
                    quantityInput = row.querySelector('.item-quantity');
                }

                if (priceText && quantityInput) {
                    const price = parseFloat(priceText);
                    const quantity = parseInt(quantityInput.value);
                    if (!isNaN(price) && !isNaN(quantity)) {
                        total += price * quantity;
                    }
                }
            });

            const totalElement = document.getElementById('selected-total');
            if (totalElement) {
                totalElement.textContent = '₱' + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            }

            const selectAllCheckbox = document.getElementById('select-all');
            const allCheckboxes = document.querySelectorAll('.item-checkbox');
            const checkedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
            if (selectAllCheckbox) {
                selectAllCheckbox.checked = allCheckboxes.length === checkedCheckboxes.length;
            }

            const checkoutButton = document.getElementById('checkout-button');
            if (checkoutButton) {
                checkoutButton.disabled = checkedCheckboxes.length === 0;
                checkoutButton.classList.toggle('opacity-50', checkedCheckboxes.length === 0);
                checkoutButton.classList.toggle('cursor-not-allowed', checkedCheckboxes.length === 0);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('.item-quantity');
            quantityInputs.forEach(input => {
                input.addEventListener('change', updateTotal);
            });

            const checkboxes = document.querySelectorAll('.item-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateTotal);
            });

            const selectAllCheckbox = document.getElementById('select-all');
            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    toggleAllItems(this);
                });
            }

            // Initial call to update total on page load
            updateTotal();

            // Star rating logic for testimonial modal
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

            // Checkout button logic
            const checkoutButton = document.getElementById('checkout-button');
            if (checkoutButton) {
                checkoutButton.addEventListener('click', function(e) {
                    const checked = document.querySelectorAll('.item-checkbox:checked');
                    if (checked.length === 0) {
                        // Should not happen due to disabled state, but just in case
                        return;
                    }
                    const params = Array.from(checked).map(cb => 'selected_items[]=' + encodeURIComponent(cb.value)).join('&');
                    window.location.href = "{{ route('user.cart.checkout') }}" + (params ? ('?' + params) : '');
                });
            }
        });
    </script>
</body>
</html>