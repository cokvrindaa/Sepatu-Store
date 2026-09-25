<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review & Payment - ShoesStore</title>
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
                <a href="{{ route('front.customer_data') }}" class="flex items-center gap-2 text-sm font-semibold px-4 py-2 rounded-full border border-gray-300 hover:bg-gray-100 transition-colors">
                    <img src="{{ asset('assets/images/icons/back.svg') }}" class="w-5 h-5" alt="back">
                    <span class="hidden md:inline">Back</span>
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 md:px-8 mt-6 md:mt-8 flex justify-center">
        <div class="w-full max-w-2xl space-y-6">
            <!-- Your Order - Accordion -->
            <section class="accordion flex flex-col rounded-3xl p-5 gap-5 bg-white shadow border overflow-hidden transition-all duration-300 has-[:checked]:!h-[66px]">
                <label class="group flex items-center justify-between cursor-pointer">
                    <h2 class="font-bold text-xl">Your Order</h2>
                    <img src="{{ asset('assets/images/icons/arrow-up.svg') }}" class="w-7 h-7 transition-all duration-300 group-has-[:checked]:rotate-180" alt="icon">
                    <input type="checkbox" class="hidden">
                </label>
                <div class="flex items-center gap-4 border-b border-gray-200 pb-4">
                    <img src="{{ Storage::url($shoe->photos()->latest()->first()->photo) }}" class="w-20 h-20 object-contain bg-gray-100 rounded-2xl" alt="">
                    <h3 class="font-bold text-lg">{{ $shoe->name }}</h3>
                </div>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between"><p class="text-gray-500">Brand</p><p class="font-bold">{{ $shoe->brand->name }}</p></div>
                    <div class="flex justify-between"><p class="text-gray-500">Price</p><p class="font-bold">Rp. {{ number_format($shoe->price) }}</p></div>
                    <div class="flex justify-between"><p class="text-gray-500">Quantity</p><p class="font-bold">{{ $orderData['quantity'] }} Pcs</p></div>
                    <div class="flex justify-between"><p class="text-gray-500">Shoe Size</p><p class="font-bold">{{ $orderData['shoe_size'] }}</p></div>
                </div>
            </section>

            <!-- Customer Details - Accordion -->
            <section class="accordion flex flex-col rounded-3xl p-5 gap-5 bg-white shadow border overflow-hidden transition-all duration-300 has-[:checked]:!h-[66px]">
                <label class="group flex items-center justify-between cursor-pointer">
                    <h2 class="font-bold text-xl">Customer Details</h2>
                    <img src="{{ asset('assets/images/icons/arrow-up.svg') }}" class="w-7 h-7 transition-all duration-300 group-has-[:checked]:rotate-180" alt="icon">
                    <input type="checkbox" class="hidden">
                </label>
                <div class="space-y-4 text-sm">
                    <div class="flex items-center gap-4"><img src="{{ asset('assets/images/icons/user.svg') }}" class="w-6 h-6"><div class="flex-1"><p class="text-gray-500">Name</p><p class="font-bold">{{ $orderData['name']}}</p></div></div>
                    <div class="flex items-center gap-4"><img src="{{ asset('assets/images/icons/call.svg') }}" class="w-6 h-6"><div class="flex-1"><p class="text-gray-500">Phone</p><p class="font-bold">{{ $orderData['phone']}}</p></div></div>
                    <div class="flex items-center gap-4"><img src="{{ asset('assets/images/icons/sms.svg') }}" class="w-6 h-6"><div class="flex-1"><p class="text-gray-500">Email</p><p class="font-bold">{{ $orderData['email'] }}</p></div></div>
                    <div class="flex items-center gap-4"><img src="{{ asset('assets/images/icons/house-2.svg') }}" class="w-6 h-6"><div class="flex-1"><p class="text-gray-500">Delivery to</p><p class="font-bold">{{ $orderData['address'] }}, {{$orderData['post_code']}}</p></div></div>
                </div>
            </section>

            <!-- Payment Details - Accordion -->
            <section class="accordion flex flex-col rounded-3xl p-5 gap-5 bg-white shadow border overflow-hidden transition-all duration-300 has-[:checked]:!h-[66px]">
                <label class="group flex items-center justify-between cursor-pointer">
                    <h2 class="font-bold text-xl">Payment Details</h2>
                    <img src="{{ asset('assets/images/icons/arrow-up.svg') }}" class="w-7 h-7 transition-all duration-300 group-has-[:checked]:rotate-180" alt="icon">
                    <input type="checkbox" class="hidden">
                </label>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between"><p class="text-gray-500">Sub Total</p><p class="font-bold">Rp {{ number_format($orderData['sub_total_amount']) }}</p></div>
                    <div class="flex justify-between"><p class="text-gray-500">Promo Code</p><p class="font-bold">{{ $orderData['promo_code'] }}</p></div>
                    <div class="flex justify-between"><p class="text-gray-500">Discount</p><p class="font-bold text-red-500">- Rp {{ number_format($orderData['discount']) }}</p></div>

                    
                    <div class="flex justify-between"><p class="text-gray-500">PPN 11%</p><p class="font-bold">Rp {{ number_format($orderData['total_tax']) }}</p></div>
                    <div class="flex justify-between mb-4"><p class="text-gray-500">Delivery</p><p class="font-bold">Rp 0</p></div>
                    <div class="flex justify-between items-center mt-4 pt-2 border-t border-gray-200"><p class="font-bold ">Grand Total</p><p class="font-bold text-xl  text-green-500">Rp {{ number_format($orderData['grand_total_amount']) }}</p></div>
                </div>
            </section>

            <!-- Send Payment to - Accordion -->
            <section class="accordion flex flex-col rounded-3xl p-5 gap-5 bg-white shadow border overflow-hidden transition-all duration-300 has-[:checked]:!h-[66px]">
                <label class="group flex items-center justify-between cursor-pointer">
                    <h2 class="font-bold text-xl">Send Payment to</h2>
                    <img src="{{ asset('assets/images/icons/arrow-up.svg') }}" class="w-7 h-7 transition-all duration-300 group-has-[:checked]:rotate-180" alt="icon">
                    <input type="checkbox" class="hidden">
                </label>
                <div class="flex items-center gap-4 border-b border-gray-200 pb-4">
                    <img src="{{ asset('assets/images/logos/bca-bank-central-asia 1.svg') }}" class="w-16 object-contain" alt="BCA">
                    <div>
                        <p class="font-bold flex items-center">JuaraTiket Indonesia <img src="{{ asset('assets/images/icons/verify.svg') }}" class="ml-1 w-4" alt="verify"></p>
                        <p class="text-sm">8008129839</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 border-b border-gray-200 pb-4">
                    <img src="{{ asset('assets/images/logos/bank-mandiri 1.svg') }}" class="w-16 object-contain" alt="Mandiri">
                    <div>
                        <p class="font-bold flex items-center">JuaraTiket Indonesia <img src="{{ asset('assets/images/icons/verify.svg') }}" class="ml-1 w-4" alt="verify"></p>
                        <p class="text-sm">12379834983281</p>
                    </div>
                </div>
                <div class="pt-2">
                    <p class="font-bold text-sm mb-2">Bukti Transfer</p>
                    <div class="flex items-center ring-1 ring-[#090917] bg-white rounded-full border border-gray-200 px-4 py-2 gap-2 focus-within:ring-2 focus-within:ring-[#FFC700] relative">
                        <img src="{{ asset('assets/images/icons/security-card.svg') }}" class="w-5 h-5 shrink-0" alt="card">
                        <button type="button" class="w-full text-left text-sm text-gray-500 outline-none" onclick="document.getElementById('proof').click()">Add an attachment</button>
                        <input type="file" name="proof" id="proof" class="absolute -z-10 opacity-0" required>
                    </div>
                </div>
                <hr class="border-[#EAEAED]">
                <div class="flex items-center gap-[10px]">
                    <img src="{{ asset('assets/images/icons/shield-tick.svg') }}" class="w-8 h-8 flex shrink-0" alt="icon">
                    <p class="leading-[26px]">Kami melindungi data privasi anda dengan baik bantuan Angga X.</p>
                </div>
            </section>

            <div class="fixed bottom-4 left-4 right-4 z-50 md:static">
                <div class="flex items-center justify-between rounded-full bg-[#2A2A2A] p-2.5 pl-6 shadow-2xl">
                    <div class="flex flex-col">
                        <p class="text-sm text-white font-medium">Apakah anda sudah benar membayar?</p>
                    </div>
                    <button type="submit" class="rounded-full px-6 py-3 bg-[#C5F277] font-extrabold text-sm text-black">
                        Confirm Now
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/accordion.js') }}"></script>
</body>
</html>