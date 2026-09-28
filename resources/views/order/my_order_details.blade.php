<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Details - ShoesStore</title>
    <link href="{{ asset('output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    </head>
    <body class="bg-[#F5F5F0] text-[#090917] min-h-screen flex flex-col">
        <header class="sticky top-0 z-50 glass-nav border-b border-black/5 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 md:px-8 h-20 flex items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <a href="{{ route('front.check_booking') }}" class="p-2 rounded-full hover:bg-black/5 transition-colors">
                        <img src="{{ asset('assets//images/icons/back.svg')}}" class="w-8 h-8" alt="back">
                    </a>
<a href="{{ route('front.index') }}" class="flex shrink-0 items-center gap-2">
                        <img src="{{ asset('assets/images/logos/logo.svg')}}" class="h-10 w-auto" alt="ShoesStore Logo">
                    </a>
                </div>

                <form action="#" class="hidden md:flex flex-1 max-w-md items-center">
                    <div class="relative flex items-center w-full rounded-full bg-white/90 border border-gray-200 px-4 py-2 gap-3 transition-all focus-within:ring-2 focus-within:ring-[#FFC700] focus-within:border-transparent">
                        <img src="{{ asset('assets/images/icons/search-normal.svg')}}" class="w-5 h-5 text-gray-400" alt="search">
                        <input type="text" name="q" class="w-full appearance-none bg-transparent outline-none font-medium placeholder:font-normal placeholder:text-gray-400 text-sm" placeholder="Search iconic sneakers...">
                        <button type="submit" class="rounded-full px-5 py-2 bg-[#C5F277] hover:bg-[#b3eb59] font-bold text-sm transition-colors">
                            Explore
                        </button>
                    </div>
                </form>

                <nav class="hidden md:flex items-center gap-8 font-semibold text-sm">
                    <a href="{{ route('front.index') }}" class="text-gray-600 hover:text-black transition-colors">Home</a>
                    <a href="#category" class="text-gray-600 hover:text-black transition-colors">Categories</a>
                    <a href="{{ route('front.check_booking') }}" class="text-black hover:text-[#090917] flex items-center gap-2 border-b-2 border-[#C5F277] pb-1">
                        <span>My Orders</span>
                    </a>
                </nav>

                <div class="flex items-center gap-4">
                    <a href="#" class="p-2 rounded-full hover:bg-gray-100 transition-colors relative">
                        <img src="{{ asset('assets//images/icons/notification.svg')}}" class="w-6 h-6" alt="notifications">
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-[#FF1943] rounded-full"></span>
                    </a>
                    <a href="{{ route('front.check_booking') }}" class="hidden md:flex items-center gap-2 bg-[#2A2A2A] text-white px-5 py-2.5 rounded-full hover:bg-black transition-colors text-sm font-semibold">
                        <img src="{{ asset('assets//images/icons/bag-2-white.svg')}}" class="w-4 h-4" alt="bag">
                        <span>Check Order</span>
                    </a>
                </div>
            </div>
        </header>

        <main class="w-full max-w-7xl mx-auto px-4 md:px-8 py-8 flex-1 flex flex-col items-center">
            <div class="w-full max-w-2xl flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">

                    <h1 class="font-bold text-2xl md:text-3xl">Booking Details</h1>
                </div>
                <span class="text-xs md:text-sm font-semibold text-gray-500">Order Summary</span>
            </div>

            <div class="w-full max-w-2xl flex flex-col gap-6">
                <section id="your-order" class="accordion flex flex-col rounded-[20px] p-4 pb-5 gap-5 bg-white overflow-hidden transition-all duration-300 has-[:checked]:!h-[66px] shadow-sm">
                    <label class="group flex items-center justify-between cursor-pointer select-none">
                        <h2 class="font-bold text-xl leading-[30px]">Your Order</h2>
                        <img src="{{ asset('assets//images/icons/arrow-up.svg')}}" class="w-7 h-7 transition-all duration-300 group-has-[:checked]:rotate-180" alt="icon">
                        <input type="checkbox" class="hidden">
                    </label>
                    <div class="flex items-center gap-4">
                        <div class="flex shrink-0 w-20 h-20 rounded-[20px] bg-[#D9D9D9] p-1 overflow-hidden items-center justify-center">
                            <img src="{{ Storage::url($orderDetails->shoe->photos()->latest()->first()->photo) }}" class="w-full h-full object-contain" alt="Nike Air Humara Shoes">
                        </div>
                        <h3 class="font-bold text-lg leading-6">{{ $orderDetails->shoe->name }}</h3>
                    </div>
                    <hr class="border-[#EAEAED]">
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-gray-600">Brand</p>
                        <p class="font-bold">{{ $orderDetails->shoe->brand->name }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-gray-600">Price</p>
                        <p class="font-bold">Rp. {{ number_format ($orderDetails->shoe->price) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-gray-600">Quantity</p>
                        <p class="font-bold">{{ $orderDetails->quantity }} Pcs</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-gray-600">Shoe Size</p>
                        <p class="font-bold">{{ $orderDetails->shoeSize->size }} EU</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-gray-600">Grand Total</p>
                        <p class="font-bold text-2xl leading-9 text-[#07B704]">Rp {{ number_format ( $orderDetails->grand_total_amount ) }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-gray-600">Checkout At</p>
                        <p class="font-bold">{{ $orderDetails->created_at }}</p>
                    </div>
                    @if ($orderDetails->is_paid)
                    
                      <div class="flex items-center justify-between">
                          <p class="font-semibold text-gray-600">Status</p>
                          <p class="rounded-full px-3.5 py-1.5 bg-[#07B704] font-bold text-sm leading-[21px] text-white">SUCCESS</p>
                      </div>
                    @else
                      <div class="flex items-center justify-between">
                          <p class="font-semibold text-gray-600">Status</p>
                          <p class="rounded-full px-3.5 py-1.5 bg-[#2A2A2A] font-bold text-sm leading-[21px] text-white">PENDING</p>
                      </div>
                    @endif
                </section>

                <section id="customer" class="accordion flex flex-col rounded-[20px] p-4 pb-5 gap-5 bg-white overflow-hidden transition-all duration-300 has-[:checked]:!h-[66px] mb-10 shadow-sm">
                    <label class="group flex items-center justify-between cursor-pointer select-none">
                        <h2 class="font-bold text-xl leading-[30px]">Customer</h2>
                        <img src="{{ asset('assets//images/icons/arrow-up.svg')}}" class="w-7 h-7 transition-all duration-300 group-has-[:checked]:rotate-180" alt="icon">
                        <input type="checkbox" class="hidden">
                    </label>
                    <div class="flex items-center gap-5">
                        <img src="{{ asset('assets//images/icons/delivery.svg')}}" class="w-6 h-6 flex shrink-0" alt="icon">
                        <div class="flex flex-col gap-[6px]">
                            <p class="font-semibold text-gray-600 text-sm">Booking ID</p>
                            <p class="font-bold">{{ $orderDetails->booking_trx_id }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-5">
                        <img src="{{ asset('assets//images/icons/user.svg')}}" class="w-6 h-6 flex shrink-0" alt="icon">
                        <div class="flex flex-col gap-[6px]">
                            <p class="font-semibold text-gray-600 text-sm">Name</p>
                            <p class="font-bold">{{ $orderDetails->name }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-5">
                        <img src="{{ asset('assets//images/icons/call.svg')}}" class="w-6 h-6 flex shrink-0" alt="icon">
                        <div class="flex flex-col gap-[6px]">
                            <p class="font-semibold text-gray-600 text-sm">Phone No.</p>
                            <p class="font-bold">{{ $orderDetails->phone }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-5">
                        <img src="{{ asset('assets//images/icons/sms.svg')}}" class="w-6 h-6 flex shrink-0" alt="icon">
                        <div class="flex flex-col gap-[6px]">
                            <p class="font-semibold text-gray-600 text-sm">Email</p>
                            <p class="font-bold">{{ $orderDetails->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-5">
                        <img src="{{ asset('assets//images/icons/house-2.svg')}}" class="w-6 h-6 flex shrink-0" alt="icon">
                        <div class="flex flex-col gap-[6px]">
                            <p class="font-semibold text-gray-600 text-sm">Delivery to</p>
                            <p class="font-bold">{{ $orderDetails->address }}</p>
                        </div>
                    </div>
                    <hr class="border-[#EAEAED]">
                    <a href="tel:628198282983" class="rounded-full py-3 px-5 text-center w-full bg-[#C5F277] hover:bg-[#b3eb59] transition-colors font-bold text-black">Call Customer Service</a>

                </section>
            </div>
        </main>

        <script src="{{ asset('js/accordion.js')}}"></script>
    </body>
</html>
