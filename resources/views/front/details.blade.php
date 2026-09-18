<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Details - ShoesStore</title>
        <link href="{{ asset('output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    </head>
    <body class="bg-[#F5F5F0] text-[#090917] pb-24 md:pb-12">
        <!-- Desktop Header & Navbar -->
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

        <!-- Main Product Container -->
        <main class="max-w-7xl mx-auto px-4 md:px-8 mt-6 md:mt-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs font-semibold text-gray-500 mb-6">
                <a href="{{ route('front.index') }}" class="hover:text-black">Home</a>
                <span>/</span>
                <a href="{{ route('front.index') }}" class="hover:text-black">{{ $shoe->category->name }}</a>
                <span>/</span>
                <span class="text-black font-bold">{{ $shoe->name }}</span>
            </nav>

            {{-- ketika kita pencet kirim maka :  --}}
            {{-- Dialihkan ke web.php yang memanggil OrderController lalu menjalankan method saveOrder lalu memanggil method beginOrder di OrderService yang nyimpan menggunakan method saveToSession di Repository  --}}
            <form action="{{ route('front.save_order', $shoe->slug) }}" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
              @csrf
                <!-- Left Column: Gallery -->
                <div class="lg:col-span-7 flex flex-col gap-4">
                    <div class="w-full h-[320px] md:h-[480px] rounded-3xl bg-white p-8 flex items-center justify-center shadow-sm border border-gray-100 relative group overflow-hidden">
                        <img id="main-thumbnail" src="{{ Storage::url($shoe->photos()->latest()->first()->photo) }}" class="w-full h-full object-contain object-center group-hover:scale-105 transition-transform duration-500" alt="Nike Air Humara">
                        <span class="absolute top-4 left-4 bg-[#C5F277] text-black font-extrabold text-xs px-3 py-1.5 rounded-full uppercase tracking-wider">
                            Verified Authentic
                        </span>
                    </div>

                    <!-- Thumbnails Swiper -->
                    <div class="swiper w-full overflow-hidden">
                        <div class="swiper-wrapper">
                          {{-- Mengambil data dari controller FrontController dengan method shoe.. --}}
                          @foreach ( $shoe->photos as $itemPhoto)
                              
                            <div class="swiper-slide !w-fit py-1">
                                <label class="thumbnail-selector flex flex-col shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-2xl p-2 bg-white cursor-pointer border-2 border-transparent transition-all hover:border-[#FFC700] has-[:checked]:border-[#FFC700] shadow-sm">
                                    <input type="radio" name="image" class="hidden" checked>
                                    <img src="{{ Storage::url($itemPhoto->photo) }}" class="w-full h-full object-contain" alt="thumbnail">
                                </label>
                            </div>
                            
                          @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column: Product Info & Order Form -->
                <div class="lg:col-span-5 flex flex-col gap-6 bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="space-y-2">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">{{ $shoe->description }}</span>
                        <div class="flex items-baseline justify-between">
                            <h1 id="title" class="font-black text-2xl md:text-3xl leading-tight text-[#090917]">{{ $shoe->name }}</h1>
                            <div class="flex flex-col items-end shrink-0 bg-yellow-50 px-3 py-1.5 rounded-2xl">
                                <div class="flex items-center gap-1">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 h-5" alt="star">
                                    <span class="font-extrabold text-base text-yellow-800">4.5</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-baseline gap-3">
                        <span class="text-3xl md:text-4xl font-black text-[#090917]"> Rp.{{ number_format($shoe->price) }}</span>

                    </div>

                    <p id="desc" class="text-sm md:text-base text-gray-600 leading-relaxed">
                        {{ $shoe->about }}
                    </p>

                    <!-- Official Brand Card -->
                    <div id="brand" class="flex items-center justify-between p-3.5 rounded-2xl bg-gray-50 border border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-white p-2 shadow-xs overflow-hidden flex items-center justify-center">
                                <img src="{{ Storage::url($shoe->brand->logo) }} "class="w-full h-full object-contain" >
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[11px] font-bold text-gray-400 uppercase">Official Partner</span>
                                <h3 class="font-bold text-sm text-[#090917]">{{ $shoe->brand->name }}</h3>
                            </div>
                        </div>

                    </div>

                    <!-- Shoe Size Selection -->
                    <div class="flex flex-col gap-3 pt-2">
                        <div class="flex items-center justify-between">
                            <h2 class="font-bold text-sm text-[#090917]">Select Size (EU)</h2>
    
                        </div>
                        <div class="grid grid-cols-3 md:grid-cols-6 gap-2.5">
                          @foreach ( $shoe->sizes as $itemSize )
                            <label class="relative flex justify-center items-center rounded-2xl border border-gray-300 py-3.5 cursor-pointer font-bold text-sm transition-all duration-200 hover:border-black has-[:checked]:bg-[#2A2A2A] has-[:checked]:text-white has-[:checked]:border-[#2A2A2A]">
                                <input type="radio" name="shoe_size" value="EU {{ $itemSize->size }}" data-size-id="{{ $itemSize->id }}" class="absolute opacity-0" required>
                                <span>EU {{ $itemSize->size }}</span>
                            </label>
                          @endforeach
                          <input type="hidden" name="size_id" id="size_id" value="">
                        </div>
                    </div>

                    <!-- Desktop Actions -->
                    <div class="hidden md:flex flex-col gap-3 pt-4 border-t border-gray-100">
                        <button type="submit" class="w-full rounded-2xl py-4 bg-[#C5F277] hover:bg-[#b3eb59] font-extrabold text-base text-black transition-all shadow-md transform hover:-translate-y-0.5">
                            Buy Now &bull; Rp {{ number_format($shoe->price) }}
                        </button>
                        <p class="text-center text-xs text-gray-400">Free shipping & 30-day money-back guarantee</p>
                    </div>
                </div>

                <!-- Mobile Floating Bottom CTA -->
                <div class="md:hidden fixed bottom-4 left-4 right-4 z-50">
                    <div class="flex items-center justify-between rounded-full bg-[#2A2A2A] p-2.5 pl-6 shadow-2xl">
                        <div class="flex flex-col">
                            <p class="font-extrabold text-lg text-white">Rp. {{ number_format($shoe->price) }}</p>
                            <p class="text-[10px] text-gray-400">1 Pasang </p>
                        </div>
                        <button type="submit" class="rounded-full px-6 py-3 bg-[#C5F277] font-extrabold text-sm text-black">
                            Buy Now
                        </button>
                    </div>
                </div>
            </form>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="{{ asset('js/details.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            const sizeRadios = document.querySelectorAll('input[name="shoe_size"]');
            const sizeInput = document.getElementById('size_id');
            

            sizeRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                // mengisi dari data-size-id yang di dapatkan dari $shoe->size 
                const selectedSizeId = this.getAttribute('data-size-id');
                sizeInput.value = selectedSizeId;
            });
            });
        });
        </script>

    </body>
</html>