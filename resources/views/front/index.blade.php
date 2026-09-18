<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ShoesStore - Official Store</title>
        <link href="{{ asset('output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    </head>
    <body class="bg-[#F5F5F0] text-[#090917] pb-24 md:pb-0">
        <!-- Desktop Header & Navbar -->
        <header class="sticky top-0 z-50 glass-nav border-b border-black/5 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 md:px-8 h-20 flex items-center justify-between gap-6">
                <a href="index.html" class="flex shrink-0 items-center gap-2">
                    <img src="assets/images/logos/logo.svg" class="h-10 w-auto" alt="ShoesStore Logo">
                </a>
                
                <form action="search.html" class="hidden md:flex flex-1 max-w-xl items-center">
                    <div class="relative flex items-center w-full rounded-full bg-white/90 border border-gray-200 px-4 py-2 gap-3 transition-all focus-within:ring-2 focus-within:ring-[#FFC700] focus-within:border-transparent">
                        <img src="assets/images/icons/search-normal.svg" class="w-5 h-5 text-gray-400" alt="search">
                        <input type="text" name="q" class="w-full appearance-none bg-transparent outline-none font-medium placeholder:font-normal placeholder:text-gray-400 text-sm" placeholder="Search iconic sneakers, brands, categories...">
                        <button type="submit" class="rounded-full px-5 py-2 bg-[#C5F277] hover:bg-[#b3eb59] font-bold text-sm transition-colors">
                            Explore
                        </button>
                    </div>
                </form>

                <nav class="hidden md:flex items-center gap-8 font-semibold text-sm">
                    <a href="index.html" class="text-black hover:text-[#090917] flex items-center gap-2 border-b-2 border-[#C5F277] pb-1">
                        <span>Home</span>
                    </a>
                    <a href="category.html" class="text-gray-600 hover:text-black transition-colors">Categories</a>
                    <a href="check-booking.html" class="text-gray-600 hover:text-black transition-colors flex items-center gap-2">
                        <span>My Orders</span>
                    </a>
                </nav>

                <div class="flex items-center gap-4">
                    <a href="#" class="p-2 rounded-full hover:bg-gray-100 transition-colors relative">
                        <img src="assets/images/icons/notification.svg" class="w-6 h-6" alt="notifications">
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-[#FF1943] rounded-full"></span>
                    </a>
                    <a href="check-booking.html" class="hidden md:flex items-center gap-2 bg-[#2A2A2A] text-white px-5 py-2.5 rounded-full hover:bg-black transition-colors text-sm font-semibold">
                        <img src="assets/images/icons/bag-2-white.svg" class="w-4 h-4" alt="bag">
                        <span>Check Order</span>
                    </a>
                </div>
            </div>
            
            <!-- Mobile Search Bar -->
            <div class="md:hidden px-4 pb-4 pt-1">
                <form action="search.html" class="flex items-center">
                    <div class="relative flex items-center w-full rounded-full bg-white px-4 py-2.5 gap-3 border border-gray-200 focus-within:ring-2 focus-within:ring-[#FFC700]">
                        <img src="assets/images/icons/search-normal.svg" class="w-5 h-5" alt="search">
                        <input type="text" name="q" class="w-full appearance-none bg-transparent outline-none font-medium placeholder:text-gray-400 text-sm" placeholder="Search product...">
                        <button type="submit" class="rounded-full px-4 py-1.5 bg-[#C5F277] font-bold text-xs">
                            Find
                        </button>
                    </div>
                </form>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-4 md:px-8 space-y-12 mt-6 md:mt-8">
            <!-- Modern Hero Section -->
            <section class="relative rounded-3xl overflow-hidden bg-[#2A2A2A] text-white shadow-xl">
                <div class="grid md:grid-cols-2 items-center min-h-[420px] p-6 md:p-12 gap-8">
                    <div class="flex flex-col gap-6 z-10">
                        <span class="w-fit inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#C5F277] text-black font-bold text-xs uppercase tracking-wider">
                            ✨ Special Summer Release
                        </span>
                        <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                            Step Into Your <br class="hidden md:block"/><span class="text-[#C5F277]">Ultimate Style</span>
                        </h1>
                        <p class="text-gray-300 text-sm md:text-base leading-relaxed max-w-md">
                            Discover original premium sneakers from top designers worldwide. Guaranteed quality, fast delivery, and unmatched comfort.
                        </p>
                        <div class="flex items-center gap-4 pt-2">
                            <a href="#featured" class="bg-[#C5F277] text-black hover:bg-[#b3eb59] font-bold px-8 py-3.5 rounded-full transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg text-sm md:text-base">
                                Shop Collection
                            </a>
                            <a href="category.html" class="bg-white/10 hover:bg-white/20 text-white font-semibold px-6 py-3.5 rounded-full border border-white/20 transition-all text-sm md:text-base">
                                Explore Categories
                            </a>
                        </div>
                    </div>
                    <div class="relative flex justify-center items-center h-full">
                        <div class="absolute w-72 h-72 md:w-96 md:h-96 bg-[#C5F277]/20 rounded-full blur-3xl"></div>
                        <img src="assets/images/thumbnails/Nike Air Humara Shoes (2).png" class="relative z-10 w-full max-w-md object-contain transform hover:scale-105 transition-transform duration-500 drop-shadow-2xl" alt="Featured Sneaker">
                    </div>
                </div>
            </section>

            <!-- Featured Categories -->
            <section id="category" class="flex flex-col gap-6">
                <div class="flex items-end justify-between border-b border-gray-200 pb-4">
                    <div>
                        <span class="text-[#878785] text-xs font-bold uppercase tracking-wider">Curated Styles</span>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-[#090917]">Featured Categories</h2>
                    </div>
                    <a href="category.html" class="rounded-full px-5 py-2 border border-[#2A2A2A] text-xs font-semibold hover:bg-[#2A2A2A] hover:text-white transition-all">
                        View All Categories &rarr;
                    </a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                  {{-- Mengambil data $categories dari FrontService melalui FrontController --}}
                  @forelse ( $categories as $itemCategory )
                    <a href="{{ route('front.category', $itemCategory->slug) }}" class="group">
                        <div class="flex items-center justify-between w-full rounded-2xl overflow-hidden bg-white p-4 transition-all duration-300 border border-transparent shadow-sm group-hover:shadow-md group-hover:border-[#FFC700] group-hover:-translate-y-1">
                            <div class="flex flex-col gap-1">
                                <h3 class="font-bold text-base md:text-lg">{{ $itemCategory->name }}</h3>
                                {{-- menghitung bedsarakan relasi --}}
                                <p class="text-xs text-[#878785]">{{ $itemCategory->shoes->count() }}</p>
                            </div>
                            <div class="w-16 h-16 md:w-20 md:h-20 rounded-xl overflow-hidden shrink-0 bg-gray-50">
                                <img src="{{ Storage::url($itemCategory->icon) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" alt="Lifestyle">
                            </div>
                        </div>
                    </a>
                  @empty
                    <p>Data kosong!</p>
                  @endforelse
                </div>
            </section>

            <!-- Featured Products Grid / Swiper -->
            <section id="featured" class="flex flex-col gap-6">
                <div class="flex items-end justify-between border-b border-gray-200 pb-4">
                    <div>
                        <span class="text-[#878785] text-xs font-bold uppercase tracking-wider">Top Picks</span>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-[#090917]">Explore Our Featured</h2>
                    </div>
                    <a href="search.html" class="rounded-full px-5 py-2 border border-[#2A2A2A] text-xs font-semibold hover:bg-[#2A2A2A] hover:text-white transition-all">
                        View All &rarr;
                    </a>
                </div>
                
                <!-- Desktop Grid Layout -->
                <div class="hidden md:grid grid-cols-4 gap-6">
                  @forelse ( $popularShoes as $itemPopularShoesDesktop )
                    <a href="{{ route('front.details', $itemPopularShoesDesktop->slug) }}" class="group">
                        <div class="flex flex-col h-full rounded-3xl gap-4 p-4 bg-white transition-all duration-300 border border-transparent shadow-sm group-hover:shadow-xl group-hover:border-[#FFC700] group-hover:-translate-y-1.5">
                            <div class="w-full h-64 rounded-2xl bg-[#F5F5F0] overflow-hidden relative">
                                <img src="{{ Storage::url($itemPopularShoesDesktop->thumbnail) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $itemPopularShoesDesktop->name }}">
                            </div>
                            <div class="flex flex-col gap-2 flex-grow justify-between">
                                <div>
                                    <h3 class="font-bold text-lg leading-tight   transition-colors">{{ $itemPopularShoesDesktop->name}}</h3>
                                    <p class="text-xs text-[#878785] mt-1">{{ $itemPopularShoesDesktop->description }}</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                    <p class="font-bold text-base text-[#090917]">Rp. {{number_format($itemPopularShoesDesktop->price)}}</p>
                                    <div class="flex items-center gap-1 bg-yellow-50 px-2.5 py-1 rounded-full">
                                        <img src="assets/images/icons/Star 1.svg" class="w-4 h-4" alt="star">
                                        <span class="font-bold text-xs text-yellow-700">4.5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                  @empty
                      <p>Data masih kosong!</p>
                  @endforelse 
                    
                </div>

                <!-- Mobile Swiper Layout -->
                <div class="swiper w-full overflow-hidden md:!hidden">
                    <div class="swiper-wrapper">
                      @forelse ( $popularShoes as $itemPopularShoesMobile )
                        <div class="swiper-slide !w-fit py-2">
                            <a href="{{ route('front.details', $itemPopularShoesMobile->slug) }}">
                                <div class="flex flex-col shrink-0 w-[240px] rounded-3xl gap-3 p-3 bg-white shadow-sm border border-gray-100">
                                    <div class="w-full h-[220px] rounded-2xl bg-[#F5F5F0] overflow-hidden">
                                        <img src="{{ Storage::url($itemPopularShoesMobile->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <h3 class="font-bold text-sm leading-snug">{{ $itemPopularShoesMobile->name }}</h3>
                                        <div class="flex items-center justify-between">
                                            <p class="font-bold text-sm">Rp. {{number_format($itemPopularShoesMobile->price)}}</p>
                                            <div class="flex items-center gap-1">
                                                <img src="assets/images/icons/Star 1.svg" class="w-4 h-4" alt="star">
                                                <span class="font-semibold text-xs">4.5</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                      @empty
                        <p>Datanya kosong mas</p>
                      @endforelse
                    </div>
                </div>
            </section>

            <!-- Fresh From Designers -->
            <section id="fresh" class="flex flex-col gap-6">
                <div class="flex items-end justify-between border-b border-gray-200 pb-4">
                    <div>
                        <span class="text-[#878785] text-xs font-bold uppercase tracking-wider">New Arrivals</span>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-[#090917]">Fresh From Great Designers</h2>
                    </div>
                    <a href="search.html" class="rounded-full px-5 py-2 border border-[#2A2A2A] text-xs font-semibold hover:bg-[#2A2A2A] hover:text-white transition-all">
                        View All &rarr;
                    </a>
                </div>
                <div class="grid md:grid-cols-3 gap-4 md:gap-6">
                    @forelse ( $newShoes as $itemNewShoes )
                        <a href="{{ route('front.details', $itemNewShoes->slug) }}" class="group">
                            <div class="flex items-center rounded-3xl p-4 gap-4 bg-white transition-all duration-300 border border-transparent shadow-sm group-hover:shadow-lg group-hover:border-[#FFC700] group-hover:-translate-y-1">
                                <div class="w-24 h-24 flex shrink-0 rounded-2xl bg-[#F5F5F0] overflow-hidden">
                                    <img src="{{ Storage::url($itemNewShoes->thumbnail) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Hello Kity Sandal Lite">
                                </div>
                                <div class="flex w-full items-center justify-between gap-3">
                                    <div class="flex flex-col gap-1">
                                        <h3 class="font-bold text-base   transition-colors">{{ $itemNewShoes->name }}</h3>
                                        <p class="text-xs text-[#878785]">{{ $itemNewShoes->description }}</p>
                                        <p class="font-extrabold text-sm text-[#090917] mt-1">Rp. {{ number_format($itemNewShoes->price) }}</p>
                                    </div>
                                    <div class="flex flex-col gap-1 items-end shrink-0">
                                        <div class="flex">
                                            <img src="assets/images/icons/Star 1.svg" class="w-4 h-4" alt="star">
                                        </div>
                                        <p class="font-semibold text-xs">4.5</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p>Data kosong</p>
                    @endforelse
                </div>
            </section>
        </main>

        <!-- Desktop Footer -->
        <footer class="mt-20 border-t border-gray-200 bg-white pt-12 pb-8">
            <div class="max-w-7xl mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div class="flex flex-col gap-4">
                    <img src="assets/images/logos/logo.svg" class="h-10 w-auto self-start" alt="ShoesStore Logo">
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Your #1 destination for authentic premium footwear. Experience style, comfort, and authenticity in every step.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-sm uppercase tracking-wider mb-4 text-[#090917]">Quick Links</h4>
                    <ul class="space-y-2 text-xs font-semibold text-gray-600">
                        <li><a href="index.html" class="hover:text-black transition-colors">Home</a></li>
                        <li><a href="category.html" class="hover:text-black transition-colors">All Categories</a></li>
                        <li><a href="search.html" class="hover:text-black transition-colors">Search Shoes</a></li>
                        <li><a href="check-booking.html" class="hover:text-black transition-colors">Track Order</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-sm uppercase tracking-wider mb-4 text-[#090917]">Customer Care</h4>
                    <ul class="space-y-2 text-xs font-semibold text-gray-600">
                        <li><a href="#" class="hover:text-black transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-black transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-black transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-black transition-colors">Returns & Exchanges</a></li>
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

        <!-- Mobile Bottom Fixed Nav -->
        <nav class="md:hidden fixed bottom-4 left-4 right-4 z-50">
            <div class="grid grid-cols-4 items-center rounded-full bg-[#2A2A2A] p-2 shadow-2xl">
                <a href="index.html" class="flex items-center justify-center rounded-full py-2.5 px-3 bg-[#C5F277] text-black font-bold text-xs gap-2">
                    <img src="assets/images/icons/3dcube.svg" class="w-5 h-5" alt="Home">
                    <span>Home</span>
                </a>
                <a href="category.html" class="flex justify-center py-2">
                    <img src="assets/images/icons/global.svg" class="w-5 h-5 invert" alt="Category">
                </a>
                <a href="check-booking.html" class="flex justify-center py-2">
                    <img src="assets/images/icons/bag-2-white.svg" class="w-5 h-5" alt="Order">
                </a>
                <a href="search.html" class="flex justify-center py-2">
                    <img src="assets/images/icons/search-normal.svg" class="w-5 h-5 invert" alt="Search">
                </a>
            </div>
        </nav>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="{{ asset('js/index.js') }}"></script>



    </body>
</html>