<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking - ShoesStore</title>
        <link href="{{ asset('output.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
</head>
<body class="bg-[#F5F5F0] text-[#090917] pb-24 md:pb-12 font-poppins">
        <header class="sticky top-0 z-50 glass-nav border-b border-black/5 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 md:px-8 h-20 flex items-center justify-between gap-6">
                <a href="{{ route('front.index') }}" class="flex shrink-0 items-center gap-2">
                    <img src="{{ asset('assets/images/logos/logo.svg') }}" class="h-10 w-auto" alt="ShoesStore Logo">
                </a>

                <nav class="hidden md:flex items-center gap-8 font-semibold text-sm">
                    <a href="/index.html" class="text-gray-600 hover:text-black transition-colors">Home</a>
                    <a href="category.html" class="text-gray-600 hover:text-black transition-colors">Categories</a>
                    <a href="check-booking.html" class="text-gray-600 hover:text-black transition-colors">My Orders</a>
                </nav>

                <div class="flex items-center gap-4">
                    <a href="{{ route('front.index') }}" class="flex items-center gap-2 text-sm font-semibold px-4 py-2 rounded-full border border-gray-300 hover:bg-gray-100 transition-colors">
                        <img src="{{ asset('assets/images/icons/back.svg') }}" class="w-5 h-5" alt="back">
                        <span class="hidden md:inline">Back to Shop</span>
                    </a>
                </div>
            </div>
        </header>
<main class="max-w-7xl mx-auto px-4 md:px-8 mt-6 md:mt-8 flex justify-center">
  {{-- membawa data shoe dan orderData dari kontroller ke order-form --}}
  @livewire('order-form', ['shoe' => $shoe, 'orderData' => $orderData])
</main>
{{-- <script src="{{ asset('js/booking.js') }}"></script> --}}
</body>
</html>