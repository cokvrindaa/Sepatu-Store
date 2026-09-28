<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Results - ShoesStore</title>
        <link href="{{ asset('output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    </head>
    <body class="bg-[#F5F5F0] text-[#090917] pb-24 md:pb-0">
        <header class="sticky top-0 z-50 glass-nav border-b border-black/5 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 md:px-8 h-20 flex items-center justify-between gap-6">
                <a href="{{ route('front.index') }}" class="flex shrink-0 items-center gap-2">
                    <img src="{{ asset('assets/images/logos/logo.svg') }}" class="h-10 w-auto" alt="ShoesStore Logo">
                </a>

                <form action="{{ route('front.search') }}" method="GET" class="hidden md:flex flex-1 max-w-xl items-center">
                    <div class="relative flex items-center w-full rounded-full bg-white/90 border border-gray-200 px-4 py-2 gap-3 transition-all focus-within:ring-2 focus-within:ring-[#FFC700] focus-within:border-transparent">
                        <img src="{{ asset('assets/images/icons/search-normal.svg') }}" class="w-5 h-5 text-gray-400" alt="search">
                        <input type="text" name="keyword" class="w-full appearance-none bg-transparent outline-none font-medium placeholder:font-normal placeholder:text-gray-400 text-sm" placeholder="Search iconic sneakers, brands, categories...">
                        <button type="submit" class="rounded-full px-5 py-2 bg-[#C5F277] hover:bg-[#b3eb59] font-bold text-sm transition-colors">
                            Explore
                        </button>
                    </div>
                </form>

                <nav class="hidden md:flex items-center gap-8 font-semibold text-sm">
                    <a href="{{ route('front.index') }}" class="text-gray-600 hover:text-black transition-colors">Home</a>
                    <a href="#category" class="text-gray-600 hover:text-black transition-colors">Categories</a>
                    <a href="{{ route('front.check_booking') }}" class="text-gray-600 hover:text-black transition-colors flex items-center gap-2">
                        <span>My Orders</span>
                    </a>
                </nav>

                <div class="flex items-center gap-4">
                    <a href="#" class="p-2 rounded-full hover:bg-gray-100 transition-colors relative">
                        <img src="{{ asset('assets/images/icons/notification.svg') }}" class="w-6 h-6" alt="notifications">
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-[#FF1943] rounded-full"></span>
                    </a>
                    <a href="{{ route('front.index') }}" class="flex items-center gap-2 text-sm font-semibold px-4 py-2 rounded-full border border-gray-300 hover:bg-gray-100 transition-colors">
                        <img src="{{ asset('assets/images/icons/back.svg') }}" class="w-5 h-5" alt="back">
                        <span class="hidden md:inline">Back to Shop</span>
                    </a>
                </div>
            </div>

            <div class="md:hidden px-4 pb-4 pt-1">
                <form action="{{ route('front.search') }}" method="GET" class="flex items-center">
                    <div class="relative flex items-center w-full rounded-full bg-white px-4 py-2.5 gap-3 border border-gray-200 focus-within:ring-2 focus-within:ring-[#FFC700]">
                        <img src="{{ asset('assets/images/icons/search-normal.svg') }}" class="w-5 h-5" alt="search">
                        <input type="text" name="keyword" class="w-full appearance-none bg-transparent outline-none font-medium placeholder:text-gray-400 text-sm" placeholder="Search product...">
                        <button type="submit" class="rounded-full px-4 py-1.5 bg-[#C5F277] font-bold text-xs">
                            Find
                        </button>
                    </div>
                </form>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-4 md:px-8 space-y-10 mt-6 md:mt-8">
            <nav class="flex items-center gap-2 text-xs font-semibold text-gray-500">
                <a href="{{ route('front.index') }}" class="hover:text-black">Home</a>
                <span>/</span>
                <span class="text-black font-bold">Search Results</span>
            </nav>

            <section class="flex flex-col gap-6">
                <div class="flex items-end justify-between border-b border-gray-200 pb-4">
                    <div>
                        <span class="text-[#878785] text-xs font-bold uppercase tracking-wider">Showing Results</span>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-[#090917]">Search Results</h2>
                    </div>
                    <span class="text-xs font-semibold text-gray-500">5 products found</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                  @forelse ($shoes as $itemShoe)
                    <a href="{{ route('front.details', $itemShoe->slug) }}" class="group">
                        <div class="flex items-center rounded-3xl p-4 gap-4 bg-white transition-all duration-300 border border-transparent shadow-sm group-hover:shadow-lg group-hover:border-[#FFC700] group-hover:-translate-y-1">
                            <div class="w-20 h-20 md:w-28 md:h-28 flex shrink-0 rounded-2xl bg-[#F5F5F0] overflow-hidden">
                                <img src="{{ Storage::url($itemShoe->photos()->latest()->first()->photo) }} " class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Hello Kity Sandal Lite">
                            </div>
                            <div class="flex w-full items-center justify-between gap-3">
                                <div class="flex flex-col gap-1">
                                    <h3 class="font-bold text-base leading-snug  transition-colors">{{ $itemShoe->name }}</h3>
                                    <p class="text-xs text-[#878785]">{{ $itemShoe->description }}</p>
                                    <div class="flex items-center gap-1 mt-1">
                                        <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-[14px] h-[14px]" alt="star">
                                        <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-[14px] h-[14px]" alt="star">
                                        <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-[14px] h-[14px]" alt="star">
                                        <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-[14px] h-[14px]" alt="star">
                                        <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-[14px] h-[14px]" alt="star">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1 items-end shrink-0">
                                    <span class="font-bold text-sm text-[#090917]">{{ number_format($itemShoe->price) }}</span>
                                    <span class="font-semibold text-xs text-yellow-600 bg-yellow-50 px-2 py-0.5 rounded-full">4.5</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                  @empty
                    <p>Belum ada produk yang sesuai</p>
                  @endforelse

                </div>
            </section>
        </main>

        <footer class="mt-20 border-t border-gray-200 bg-white pt-12 pb-8">
            <div class="max-w-7xl mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div class="flex flex-col gap-4">
                    <img src="{{ asset('assets/images/logos/logo.svg') }}" class="h-10 w-auto self-start" alt="ShoesStore Logo">
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Your #1 destination for authentic premium footwear. Experience style, comfort, and authenticity in every step.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-sm uppercase tracking-wider mb-4 text-[#090917]">Quick Links</h4>
                    <ul class="space-y-2 text-xs font-semibold text-gray-600">
                        <li><a href="{{ route('front.index') }}" class="hover:text-black transition-colors">Home</a></li>
                        <li><a href="#category" class="hover:text-black transition-colors">All Categories</a></li>
                        <li><a href="#" class="hover:text-black transition-colors">Search Shoes</a></li>
                        <li><a href="{{ route('front.check_booking') }}" class="hover:text-black transition-colors">Track Order</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-sm uppercase tracking-wider mb-4 text-[#090917]">Customer Care</h4>
                    <ul class="space-y-2 text-xs font-semibold text-gray-600">
                        <li><a href="#" class="hover:text-black transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-black transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-black transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-black transition-colors">Returns &amp; Exchanges</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-sm uppercase tracking-wider mb-4 text-[#090917]">Newsletter</h4>
                    <p class="text-xs text-gray-500 mb-3">Subscribe for exclusive sneaker drops.</p>
                    <div class="flex items-center rounded-full bg-gray-100 p-1">
                        <input type="email" placeholder="Your email..." class="bg-transparent border-none text-xs px-3 focus:outline-none w-full">
                        <button class="bg-[#C5F277] text-black font-bold text-xs px-4 py-2 rounded-full">Join</button>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 md:px-8 border-t border-gray-100 pt-6 text-center text-xs text-gray-400">
                &copy; 2026 ShoesStore. All rights reserved. Premium Footwear Platform.
            </div>
        </footer>

        <nav class="md:hidden fixed bottom-4 left-4 right-4 z-50">
            <div class="grid grid-cols-4 items-center rounded-full bg-[#2A2A2A] p-2 shadow-2xl">
                <a href="{{ route('front.index') }}" class="flex justify-center py-2">
                    <img src="{{ asset('assets/images/icons/3dcube.svg') }}" class="w-5 h-5 invert" alt="Home">
                </a>
                <a href="#category" class="flex justify-center py-2">
                    <img src="{{ asset('assets/images/icons/global.svg') }}" class="w-5 h-5 invert" alt="Category">
                </a>
                <a href="{{ route('front.check_booking') }}" class="flex justify-center py-2">
                    <img src="{{ asset('assets/images/icons/bag-2-white.svg') }}" class="w-5 h-5" alt="Order">
                </a>
                <a href="#" class="flex items-center justify-center rounded-full py-2.5 px-3 bg-[#C5F277] text-black font-bold text-xs gap-2">
                    <img src="{{ asset('assets/images/icons/search-normal.svg') }}" class="w-5 h-5" alt="Search">
                    <span>Search</span>
                </a>
            </div>
        </nav>
    </body>
</html>
