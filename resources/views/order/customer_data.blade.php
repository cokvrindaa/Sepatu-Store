<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data - ShoesStore</title>
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
            <a href="{{ route('front.index') }}" class="text-gray-600 hover:text-black transition-colors">Home</a>
            <a href="{{ route('front.index') }}" class="text-gray-600 hover:text-black transition-colors">Categories</a>
            <a href="{{ route('front.index') }}" class="text-gray-600 hover:text-black transition-colors">My Orders</a>
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
    <div class="w-full max-w-2xl space-y-6">
        <div class="bg-white rounded-3xl shadow border p-5 flex items-center gap-4">
            <img src="{{ Storage::url($shoe->photos()->latest()->first()->photo) }}" class="w-20 h-20 object-contain rounded-2xl" alt="Nike Air Humara Shoes">
            <div class="flex-1">
                <h2 class="font-bold text-base">{{ $shoe->name }}</h2>
                <p class="text-gray-500 text-sm">{{ $orderData['shoe_size'] }} • {{ $orderData['quantity'] }} Pcs</p>
                <div class="flex items-center text-yellow-400 text-sm"><span>★★★★☆</span></div>
            </div>
        </div>
        <form action="{{ route('front.save_customer_data') }}" method="POST" class="bg-white rounded-3xl shadow border p-6 space-y-4" id="customer-form">
            @csrf
            <h2 class="text-xl font-bold">Shipping Address</h2>
            <div class="flex items-start ring-1 ring-[#090917] bg-white rounded-2xl border border-gray-200 px-4 py-2 gap-2 focus-within:ring-2 focus-within:ring-[#FFC700]">
                <img src="{{ asset('assets/images/icons/house-2.svg') }}" class="w-5 h-5 mt-1 shrink-0" alt="address">
                <textarea name="address" placeholder="Full Address" rows="3" class="w-full outline-none resize-none" required></textarea>
            </div>
            <div class="flex items-center ring-1 ring-[#090917] bg-white rounded-full border border-gray-200 px-4 py-2 gap-2 focus-within:ring-2 focus-within:ring-[#FFC700]">
                <img src="{{ asset('assets/images/icons/call.svg') }}" class="w-5 h-5" alt="phone">
                <input type="tel" name="phone" placeholder="Phone Number" class="w-full outline-none" required>
            </div>
            <div class="flex items-center ring-1 ring-[#090917] bg-white rounded-full border border-gray-200 px-4 py-2 gap-2 focus-within:ring-2 focus-within:ring-[#FFC700]">
                <img src="{{ asset('assets/images/icons/global.svg') }}" class="w-5 h-5" alt="city">
                <input type="text" name="city" placeholder="City" class="w-full outline-none" required>
            </div>
            <div class="flex items-center ring-1 ring-[#090917] bg-white rounded-full border border-gray-200 px-4 py-2 gap-2 focus-within:ring-2 focus-within:ring-[#FFC700]">
                <img src="{{ asset('assets/images/icons/location.svg') }}" class="w-5 h-5" alt="postcode">
                <input type="text" name="post_code" placeholder="Post Code" class="w-full outline-none" required>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <img src="{{ asset('assets/images/icons/shield-tick.svg') }}" class="w-5 h-5 shrink-0" alt="privacy">
                <span>Your data is safe. We never share your personal information.</span>
            </div>
        </form>
        <div class="fixed bottom-4 left-4 right-4 z-50 md:static">
            <div class="flex items-center justify-between rounded-full bg-[#2A2A2A] p-2.5 pl-6 shadow-2xl">
                <div class="flex flex-col">
                    <p class="font-extrabold text-lg text-white">Rp. {{ number_format($orderData['grand_total_amount']) }}</p>
                    <p class="text-[10px] text-gray-400">Grand total</p>
                </div>
                <button type="submit" form="customer-form" class="rounded-full px-6 py-3 bg-[#C5F277] font-extrabold text-sm text-black">
                    Continue
                </button>
            </div>
        </div>
    </div>
</main>
</body>
</html>